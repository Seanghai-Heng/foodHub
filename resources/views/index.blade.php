@extends('layouts.app')

@section('content')

<style>
    .pagination {
        justify-content: center
    }

</style>

<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Search For Food, Make an Checkout</h1>
                <p>Discover the best foods nearest to you.</p>
            </div>

            <!-- Search -->
            <div class="search-box">
                <form action="" style="justify-content:center; text-align:center">
                    <div class="form-group search-info">
                        <input type="text" class="form-control" placeholder="Search Foods, ">
                        <span class="form-text">Ex : Pad Thai or Bok Lhong etc</span>
                    </div>
                    <button type="submit" class="btn btn-primary search-btn">
                        <i class="fas fa-search"></i>
                        <span>Search</span>
                    </button>
                </form>
            </div>
            <!-- /Search -->

        </div>
    </div>
</section>
<!-- /Home Banner -->

<div class="container bg-white pt-2">
    <h2>Latest Products</h2>
    <div class="row">
        @foreach($foods as $food)
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="{{url('/uploads/foods')}}/{{$food->food_image}}" alt="{{$food->name}}">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-green">New</div>
            <div class="title pt-4 pb-1">{{$food->name}}</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ {{$food->price}}</div>
        </div>
        @endforeach
    </div>
    <div class="text-center p-3">
        {!! $foods->links() !!}
    </div>
</div>

@endsection
