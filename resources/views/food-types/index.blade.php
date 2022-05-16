@extends('layouts.app')

@section('content')

<style>

</style>

<body>
    <div class="container mt-5 bg-white">
        <div class="pt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{route('foods.index')}}" class="nav-link ">Food</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">Food Type</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="mb-2">
                    <a class="btn btn-success" href="{{route('food-types.create')}}"> Create Food Type</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Type</th>
                <th width="280px">Action</th>
            </tr>
            @foreach($foodTypes as $key => $foodType)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $foodType->name}}</td>
                <td>
                    <form action="{{ route('food-types.destroy',$foodType->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('food-types.edit',$foodType->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $foodTypes->links() !!}
    </div>

    @endsection
