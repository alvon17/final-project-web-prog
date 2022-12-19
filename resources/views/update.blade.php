@extends('dashboard')

@section('title', 'update')
@section('content')


    <div class="container" style="width: 100%;">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class = "mb-2">
                        <a href="{{ url('manage') }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-secondary">
                                <i style="color:white" class="fas fa-arrow-circle-left"></i> Back
                            </button>
                        </a>
                    </div>
                    <div class="card">
                        <p class="card-header text-left">Update Product</h4>
                        <div class="card-body">
                            <form action="/manage/edit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{old('name', $products->name)}}" name="name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category">
                                        <option selected hidden disabled value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            @if(old('category') != "")
                                                @if (old('category') == $category->id)
                                                    <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                                                @else
                                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endif
                                            @else
                                                @if ($products->category_id == $category->id)
                                                    <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                                                @else
                                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endif
                                            @endif                                         
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Detail</label>
                                    <textarea class="form-control" id="detail" rows="7" name="description">{{old('description', $products->description)}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" value="{{old('price', $products->price)}}" name="price">
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Photo</label>
                                    <input class="form-control" type="file" id="formFile" name = "file">
                                    @if ($errors->has('file'))
                                        <span class="text-danger">{{ $errors->first('file') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-outline-secondary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection