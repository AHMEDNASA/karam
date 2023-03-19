@extends('layouts.app')

@section('content')
@if (session('msg'))
<div class="alert alert-success" role="alert">
    {{session('msg')}}
  </div>
@endif

<form method="post" action="{{route('restaurant.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3 ">
        <label for="phone" class="form-label">phone</label>
        <input type="text" name="phone" class="form-control" id="phone">
    </div>
    <div class="mb-3 ">
        <label for="address" class="form-label">address</label>
        <input type="text" name="address"  class="form-control" id="address">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" name="image" type="file" id="image">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

