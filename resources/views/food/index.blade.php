@extends('layouts.app')

@section('content')

<style>

</style>

<body>
    <div class="container mt-5 bg-white">
        <div class="pt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Food</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('food-type.index')}}" class="nav-link">Food Type</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3">
                <div class="mb-2">
                    <a class="btn btn-success" href="{{route('food.create')}}"> Create food</a>
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
                <th>food Name</th>
                <th>food Email</th>
                <th>food Address</th>
                <th width="280px">Action</th>
            </tr>

            <tr>
                <td>1</td>
                <td>name</td>
                <td>email</td>
                <td>food</td>
                <td>
                    <form action="" method="Post">
                        <a class="btn btn-primary" href="">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    @endsection
