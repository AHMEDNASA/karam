@extends('layouts.dash')

@section('content')

@if (session('msg'))
<div class="alert alert-success" role="alert">
    {{session('msg')}}
  </div>
@endif

<form method="post" action="{{route('menu.store')}}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Restaurants</label>
        <select class="form-select" name="restaurant_id">
            <option selected>Select</option>
            @foreach ($restaurants as $restaurant)
               <option value="{{$restaurant->id}}">{{$restaurant->title}}</option>
            @endforeach

          </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

