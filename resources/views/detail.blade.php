@extends('dashboard')

@section('title', 'detail')
@section('content')

    <div class="fluid-container bg-white p-3 rounded-1 shadow" style="width: 75%">

        <div class="card flex-lg-row mx-auto align-items-center justify-content-center shadow-none" style="border: none;">
            <div class="image-container">
                <img class="img-fluid image-left" src="{{ asset('image/' . $products->photo) }}" width="400px" height="300px">
            </div>
            <div class="card-body detail-card-body">
                <form>
                    <div class="row mb-3">
                        <h5 class="card-title detail-card-title">{{ $products->name }}</h5>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Detail</label>
                        <div class="col-sm-10">
                            <p class="card-text">{{ $products->description }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <p class="card-text">{{ $products->price }}</p>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'user')
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputQty">
                            </div>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-outline-secondary">Purchase</button>
                    @endif

                </form>
            </div>
        </div>

    </div>



@endsection
