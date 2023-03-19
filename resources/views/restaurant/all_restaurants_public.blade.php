@extends('layouts.app')

@section('content')

    <div class="row mt-3">
        @foreach ($restaurants as $restaurant)
        <div class="col-3 mb-3">
            <div class="card" >
                <img src="{{asset($restaurant->image)}}" style="object-fit: contain"  alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$restaurant->title}}</h5>
                    {{-- <p class="card-text"></p> --}}
                    <a href="/restaurant/{{$restaurant->id}}/menus" class="btn btn-primary">Menus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
