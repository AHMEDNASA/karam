@extends('layouts.public_view')

@section('content')
    <center><h1>{{$menu->title}}</h1></center>
    @foreach ($menu->sections as $section)
    <h2>{{$section->title}}</h2>
    <div class="row">
        @foreach ($section->items as $item)
        <div class="col-3 mb-3">
            <div class="card" >
                <img src="{{asset($item->image)}}" style="object-fit: contain"  alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    <center> {{$qr}}</center>
@endsection
