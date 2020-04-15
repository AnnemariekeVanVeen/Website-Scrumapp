{{-- Register Blade --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="POST" action="{{ route('register') }}">
                            @csrf

                            <input type="hidden" name="is_admin" value="0">

                            <div class="form-label-group">
                                <input id="name" placeholder="Name" type="text"
                                       class="text-center form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="name">Name</label>
                            </div>

                            <div class="form-label-group">
                                <input id="email" type="email" placeholder="E-Mail"
                                       class="text-center form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email">Email Address</label>
                            </div>

                            <hr>

                            <div class="form-label-group">
                                <input id="password" type="password" placeholder="Password"
                                       class="text-center form-control @error('password') is-invalid @enderror"
                                       name="password" required
                                       autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input id="password-confirm" placeholder="Repeat Password" type="password"
                                       class="text-center form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">Confirm password</label>
                            </div>

                            <button type="submit" class="prim-btn btn-lg btn-block w-100">
                                {{ __('Register') }}
                            </button>
                            <a class="d-block text-center mt-2 small" href="{{ route('login') }}">Sign In</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
