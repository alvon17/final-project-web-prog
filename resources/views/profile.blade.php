@extends('dashboard')

@section('title', 'profile')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header text-center">Profile</h4>
                    <div class="card-body">

                        @csrf
                        <div class="form-group mb-3">
                            <label class="mb-2"> Name </label>
                            <div class="value-col">
                                {{ Auth::user()->name }}
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2"> Email </label>
                            <div class="value-col">
                                {{ Auth::user()->email }}
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2"> Gender </label>
                            <div class="value-col">
                                {{ Auth::user()->gender }}
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2"> Date of Birth </label>
                            <div class="value-col">
                                {{ Auth::user()->date_of_birth }}
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2"> Country </label>
                            <div class="value-col">
                                {{ Auth::user()->country['country'] }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
