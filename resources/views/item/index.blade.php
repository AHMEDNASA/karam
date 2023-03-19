@extends('layouts.dash')
@section('content')


    <table class="table">
        <thead>
            <tr>

                <th scope="col">image</th>
                <th scope="col">Title</th>
                <th scope="col">price</th>
                <th scope="col">menu</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                @foreach ($menu->items as $item)
                    <tr>
                        <td><img src="{{ asset($item->image) }}" width="100px" alt=""></td>

                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $menu->title }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/item/{{$item->id}}/edit" class="btn btn-primary">View</a>
                                <form action="/item/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
