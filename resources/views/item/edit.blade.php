@extends('layouts.dash')

@section('content')
@if (session('msg'))
<div class="alert alert-success" role="alert">
    {{session('msg')}}
  </div>
@endif

<form method="POST" action="{{ route('item.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $item->title }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ $item->description }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $item->price }}" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image URL</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ $item->image }}" required>
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="section_id">Section</label>
        <select class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}" {{ $item->section_id == $section->id ? 'selected' : '' }}>{{$section->menu->title}} - {{ $section->title }}</option>
            @endforeach
        </select>
        @error('section_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update item</button>
</form>

@endsection

