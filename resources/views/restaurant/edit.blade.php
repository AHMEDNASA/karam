
@extends('layouts.dash')
@section('content')
<form method="POST" action="{{ route('restaurant.update', $restaurant->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $restaurant->title }}" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $restaurant->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $restaurant->phone }}" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $restaurant->email }}" required>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $restaurant->address }}" required>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $restaurant->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $restaurant->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        </div>
        <div class="col-md-6">
          <div class="card" style="width: 18rem;">
            <img src="{{ asset($restaurant->image) }}" class="card-img-top" alt="{{ $restaurant->title }}">
            <div class="card-body">
              <p class="card-text">{{ $restaurant->title }}</p>
            </div>
          </div>
        </div>
      </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection


