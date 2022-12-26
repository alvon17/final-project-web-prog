@extends('layout.layout')

@section('title', 'manage')
@section('content')

    @if (session()->has('message'))
        @foreach (explode('-', session('message')) as $message)
            <script>
                Swal.fire('{{ $message }}')
            </script>
        @endforeach
    @endif

    <div class="container manage-container" style="width: 60%;">
        <div class="row justify-content-between pb-3 row-manage">
            <div class="col-5 input-group-header">
                <form class="input-group" action="{{ route('manageSearch') }}" method="GET">
                    <div class="form-outline search-form-outline">
                        <input type="search" placeholder="Product Name" id="form1"
                            class="form-control search-form-control" name="search" />
                    </div>
                    <button type="submit" class="btn btn-primary search-icon ">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="col-4 input-group-header">
                <div class="input-group add-product">
                    <a href="{{ url('add') }}" style="text-decoration: none;">

                        <button type="button" class="btn btn-secondary ms-auto search-icon add-button">Add Product
                            <i style="color:white" class="fas fa-plus"></i>
                        </button>

                    </a>
                </div>
            </div>
        </div>

        @foreach ($products as $product)
            <div class="card flex-lg-row mx-auto mb-3">
                <div class="image-container">
                    <img class="img-fluid image-left" src="{{ asset('image/' . $product->photo) }}" width="300px"
                        height="200px">
                </div>
                <div class="card-body manage-card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                </div>
                <div class="card-body d-flex justify-content-end">
                    <div class="me-2">
                        <a href="manage/update/ {{ $product->id }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pen" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                    <div class="ms-2">
                        <a href="manage/delete/ {{ $product->id }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        {!! $products->render() !!}
    </div>





@endsection
