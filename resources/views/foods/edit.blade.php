@extends('layouts/app')

@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex">
            <a class="btn btn-primary" href="{{ route('foods.index') }}" enctype="multipart/form-data"> Back</a>
            <h2 style="text-align:center; width:inherit">Edit Food</h2>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Food Name:</strong>
                    <input type="text" name="name" value="{{ $food->name }}" class="form-control" placeholder="type name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong><label for="type">Food Type</label></strong>
                    <select id="type" name="type" class="form-control">
                        @foreach($types as $type)
                        <option value="{{$type->id}}" {{ $food->typeId == $type->id ? 'selected' : ''  }}>{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong><label for="price">Food Price</label></strong>
                    <input type="number" value="{{ $food->price }}" step="0.01" name="price" id="price" required class="form-control">
                </div>
                <div class="form-group">
                    <strong><label for="image">Food Image</label></strong>
                    <input type="file" name="image" id="image" class="course form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection
