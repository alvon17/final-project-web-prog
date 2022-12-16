@extends('dashboard')

@section('title', 'detail')
@section('content')

    <div class="fluid-container bg-white p-3 rounded-1 shadow" style="width: 75%">

        <div class="card flex-row mx-auto align-items-center justify-content-center shadow-none" style="border: none;">
            <div class="image-container">
                <img class="image-left" src="{{ asset('image/Gerry.jpg') }}" width="400px" height="300px">
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <h5 class="card-title detail-card-title">Gerry Guinardi</h5>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Detail</label>
                        <div class="col-sm-10">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis
                                imperdiet tincidunt. Etiam mattis, ante id pretium rutrum, felis felis ultrices diam, nec
                                tincidunt leo neque sit amet urna. Sed volutpat ornare sapien ac semper. Vivamus egestas
                                nisl sed varius ornare. Fusce et finibus libero, vitae laoreet erat. Praesent dolor mi,
                                posuere ut ornare maximus, tristique a sem. Mauris elementum nisi ut est lobortis, finibus
                                blandit lectus ullamcorper. Proin libero ipsum, varius ut faucibus ac, euismod eu purus.</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <p class="card-text">Rp 2.000,00</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputQty">
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-outline-secondary">Purchase</button>

                </form>
            </div>
        </div>

    </div>



@endsection
