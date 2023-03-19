
@extends('layouts.app')
@section('content')
@foreach ($menus as $menu)
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$menu->title}}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="/menu/{{$menu->id}}/public" class="btn btn-primary">Details</a>
    </div>
  </div>
@endforeach

@endsection


