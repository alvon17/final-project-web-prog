@extends('dashboard')

@section('title', 'home')
@section('content')

    <div class="input-group justify-content-center pb-4">
        <div class="form-outline search-form-outline">
            <input type="search" id="form1" class="form-control search-form-control" />
        </div>
        <button type="button" class="btn btn-primary search-icon">
            <i class="fas fa-search"></i>
        </button>
    </div>

    @foreach ($categories as $cat)
    <div class="fluid-container card-container mt-3">
        <div class="row container-title d-flex align-items-center">
            <h5>{{$cat->name}}</h5>
            <a href="#">View All</a>
        </div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
            @foreach ($products as $product)
                @foreach ($product->category as $category)
                    @if ($category->name == $cat->name)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('image/' . $product->photo) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">IDR {{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    @endforeach

    <!-- <div class="fluid-container card-container mt-3">
        <div class="row container-title d-flex align-items-center">
            <h5>Camera</h5>
            <a href="#">View All</a>
        </div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
            @foreach ($products as $product)
                @foreach ($product->category as $category)
                    @if ($category->name == 'Camera')
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('image/' . $product->photo) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">IDR {{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div> -->


@endsection
