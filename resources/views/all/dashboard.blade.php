@extends('layout.layout')

@section('title', 'home')
@section('content')

    @if (session()->has('message'))
        @foreach (explode('-', session('message')) as $message)
            <script>
                Swal.fire('{{ $message }}')
            </script>
        @endforeach
    @endif

    <form class="input-group justify-content-center pb-4" action="{{ route('search') }}" method="GET">
        <div class="form-outline search-form-outline">
            <input type="text" id="form1" name="search" class="form-control search-form-control" />
        </div>
        <button type="submit" class="btn btn-primary search-icon">
            <i class="fas fa-search"></i>
        </button>
    </form>

    @foreach ($categories as $cat)
        <div class="fluid-container card-container mt-3">
            <div class="row container-title d-flex align-items-center">
                <h5>{{ $cat->name }}</h5>
                <a href="{{ url('category', ['name' => $cat->name]) }}">View All</a>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
                @foreach ($products as $product)
                    @if ($cat->id == $product->category_id)
                        <div class="col">
                            <a class="card-link" href="{{ url('detail', ['id' => $product->id]) }}">
                                <div class="card h-100">
                                    <img src="{{ asset('image/' . $product->photo) }}" class="img-fluid card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">IDR {{ $product->price }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach

@endsection
