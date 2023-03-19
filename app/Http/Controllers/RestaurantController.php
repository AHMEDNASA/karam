<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = auth()->user()->restaurants;
        return view('restaurant.index',["restaurants"=>$restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->title = $request->input('title');
        $restaurant->description = $request->input('description');
        $restaurant->email = $request->input('email');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('images/restaurants', 'public');
            $restaurant->image = 'storage/' . $path;
        } else {
            $restaurant->image = '';
        }
        $restaurant->user_id = 1;
        $restaurant->save();
        return back()->with('msg',"Restaurant Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {

        return view('restaurant.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->input('title');
    $restaurant->description = $request->input('description');
    $restaurant->phone = $request->input('phone');
    $restaurant->email = $request->input('email');
    $restaurant->address = $request->input('address');
    $restaurant->status = $request->has('status') ? 1 : 0;
    $restaurant->user_id = Auth::user()->id; // Assuming the user is authenticated

    // Handle image upload
    if ($request->hasfile('image')) {
        $path = $request->file('image')->store('images/restaurants', 'public');
        $restaurant->image = 'storage/' . $path;
    } else {
        $restaurant->image = '';
    }

    $restaurant->save();

    return redirect()->route('restaurant.index')->with('success', 'Restaurant updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    public function all_restaurants_public()
    {
        return view("restaurant.all_restaurants_public",["restaurants"=>Restaurant::all()]);
    }

    public function menus(Restaurant $restaurant)
    {
        $menus = $restaurant->menus;
        return view('restaurant.menus', compact('menus'));
    }


}
