@extends('dashboard')

@section('title', 'category')
@section('content')

    <div class="input-group justify-content-center pb-4">
        <div class="form-outline search-form-outline">
            <input type="search" id="form1" class="form-control search-form-control" />
        </div>
        <button type="button" class="btn btn-primary search-icon">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <div class="fluid-container card-container mt-3">
        <div class="row container-title d-flex align-items-center">
            <h5>{{$category->name}}</h5>
        </div>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 container-body">
            @foreach($category->product as $i)
            <?php
                // dd($i->photo)
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('/image/'.$i->photo) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$i->name}}</h5>
                            <b><p class="card-text">IDR {{$i->price}}</p></b>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection