
@extends('layouts.dash')
@section('content')
<br>
    <a name="" id="" class="btn btn-primary" href="/restaurant/create" role="button">Add</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td><img src="{{ asset($restaurant->image) }}" width="100px" alt=""></td>
            <td>{{$restaurant->title}}</td>
            <td>{{$restaurant->phone}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/restaurant/{{$restaurant->id}}/edit" class="btn btn-primary">Edit</a>
                    <a href="/restaurant/{{$restaurant->id}}/menus" class="btn btn-success">Menus</a>
                    {{-- <form action="/restaurant/{{$restaurant->id}}" method="post">
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form> --}}

                  </div>
            </td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection


