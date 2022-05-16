@extends('../layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h4>Create Food Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Food Name</label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="type">Choose Food Type</label>
                            <select id="type" name="type" class="form-control">
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" name="price" id="price" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" id="image" required class="course form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
