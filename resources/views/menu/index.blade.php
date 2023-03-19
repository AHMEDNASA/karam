
@extends('layouts.dash')
@section('content')
<br>
    <a name="" id="" class="btn btn-primary" href="/menu/create" role="button">Add</a>
<table class="table">
    <thead>
      <tr>

        <th scope="col">Title</th>
        <th scope="col">restaurant</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
        <tr>

            <td>{{$menu->title}}</td>
            <td>{{$menu->restaurant->title}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a  href="/menu/{{$menu->id}}/edit" class="btn btn-primary">Edit</a>
                    <a name="" id="" class="btn btn-success" href="/item/create/{{$menu->id}}" role="button">Add Items</a>
                    <a name="" id="" class="btn btn-success" href="/section/create" role="button">Add Section</a>
                    <a name="" id="" class="btn btn-warning" href="/section/create" role="button">All Sections</a>
                    <form action="/menu/{{$menu->id}}" method="post" >
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>


                  </div>
            </td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection


