@extends('layouts.dash')

@section('content')
@if (session('msg'))
<div class="alert alert-success" role="alert">
    {{session('msg')}}
  </div>
@endif

<form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
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
        <label for="price" class="form-label">price</label>
        <input type="number" name="price" class="form-control" id="price">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Section</label>
        <select class="form-select" name="section_id">
            <option selected>Select</option>
            @foreach ($sections as $section)
               <option value="{{$section->id}}">{{$section->title}}</option>
            @endforeach

          </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" name="image" type="file" id="image">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

