<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = auth()->user()->menus()->with('items')->get();
        return view('item.index',['menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menu)
    {
        $sections = $menu->sections;
        return view('item.create', ['sections' => $sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->section_id = $request->input('section_id');

        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('images/items', 'public');
            $item->image = 'storage/' . $path;
        } else {
            $item->image = '';
        }
        $item->save();
        return back()->with('msg', "Item Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $sections = Section::all();

        return view('item.edit', compact('item', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'status' => 'required|boolean',
            'section_id' => 'required|exists:sections,id',
        ]);

        $item->title = $request->title;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $request->image;
        $item->status = $request->status;
        $item->section_id = $request->section_id;
        $item->save();

        return redirect()->route('item.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $imagePath = $item->image;
        unlink(public_path($imagePath));
       $item->delete();
       return back();
    }
}
