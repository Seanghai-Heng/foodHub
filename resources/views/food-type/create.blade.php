@extends('../layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h4>Food Type Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('food-type.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Food Type Name</label>
                            <input type="text" name="name" required class="form-control">
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
