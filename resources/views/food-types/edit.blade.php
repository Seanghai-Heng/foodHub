@extends('layouts/app')

@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex">
            <a class="btn btn-primary" href="{{ route('food-types.index') }}" enctype="multipart/form-data"> Back</a>
            <h2 style="text-align:center; width:inherit">Edit Food Type</h2>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('food-types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Food Type Name:</strong>
                    <input type="text" name="name" value="{{ $type->name }}" class="form-control" placeholder="type name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection
