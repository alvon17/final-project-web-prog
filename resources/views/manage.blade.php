@extends('dashboard')

@section('title', 'manage')
@section('content')

    <div class="container" style="width: 60%;">
        <div class="row justify-content-between pb-3">
            <div class="col-5">
                <div class="input-group">
                    <div class="form-outline search-form-outline">
                        <input type="search" placeholder="Product Name" id="form1"
                            class="form-control search-form-control" />
                    </div>
                    <button type="button" class="btn btn-primary search-icon ">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <button type="button" class="btn btn-secondary ms-auto search-icon ">Add Product
                        <i style="color:white" class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="card flex-row mx-auto">
            <div class="image-container">
                <img class="image-left" src="{{ asset('/image/gerry.jpg') }}" width="300px" height="200px">
            </div>
            <div class="card-body">
                <h5 class="card-title">Gerry Guinardi</h5>
            </div>
            <div class="card-body d-flex justify-content-end">
                <div class="me-2">
                    <button type="button" class="btn btn-outline-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pen" viewBox="0 0 16 16">
                            <path
                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg>
                    </button>
                </div>
                <div class="ms-2">
                    <button type="button" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd"
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>





@endsection
