
@extends('layouts.dash')
@section('content')
<div class="container">
    <h2>Edit Menu Item</h2>
    <form method="POST" action="{{ route('menu.update', $menu->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $menu->title }}">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $menu->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$menu->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="restaurant_id">Restaurant:</label>
            <select class="form-control" id="restaurant_id" name="restaurant_id">
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" {{ $menu->restaurant_id == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection


