@extends('dashboard')

@section('title', 'add')
@section('content')


    <div class="container" style="width: 100%;">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class = "mb-2">
                        <button type="button" class="btn btn-secondary">
                            <i style="color:white" class="fas fa-arrow-circle-left"></i> Back
                        </button>
                    </div>
                    <div class="card">
                        <p class="card-header text-left">Add Product</h4>
                        <div class="card-body">
                            <form action="..." method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="caategory" class="form-label">Category</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select a Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Detail</label>
                                    <textarea class="form-control" id="detail" rows="7"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Photo</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <button type="button" class="btn btn-outline-secondary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection