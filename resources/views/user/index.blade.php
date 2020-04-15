{{-- Show the profile page of a user --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="mb-5 font-weight-bold">{{ $user->name }}</h1>
            </div>
        </div>
        {{-- Check if the user has a profile --}}
        @if(!empty($user->profile))
            <div class="bg-block">
                <h2>Personal information</h2>
                <div class="separator"></div>
                <div class="row">
                    <label class="col-sm-4 col-form-label">Date of Birth: </label>
                    <div class="col-sm-8">
                        <input class="form-control my-1" disabled
                               value="{{ $user->profile->date_of_birth->format("d/m/Y") }}">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label">Programming Experience Since: </label>
                    <div class="col-sm-8">
                        <input class="form-control my-1" disabled
                               value="{{ $user->profile->programming_experience->format("d/m/Y") }}">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label">Scrum Experience Since: </label>
                    <div class="col-sm-8">
                        <input disabled class="form-control my-1"
                               value="{{ $user->profile->scrum_experience->format("d/m/Y") }}">
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 py-2 text-center alert alert-danger border-danger mt-5">
                    <h4 class="my-auto">Your profile is empty. <a class="alert-danger"
                                                                  href="{{ route('user.create') }}">Click here to fill
                            in your details please.</a></h4>
                </div>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col-12">
                @if(session()->has('msg'))
                    <div class="my-2">
                        <h6 class="alert alert-success text-center"> {{ session('msg') }}</h6>
                    </div>
                @elseif(session()->has('alert'))
                    <div class="my-2">
                        <h6 class="alert alert-danger text-center"> {{ session('alert') }}</h6>
                    </div>
                @endif
                <div class="bg-block">
                    <h2>Change Profile Settings</h2>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-12">
                            <form class="form-group" action="{{ route('user.update', ['user' => $user]) }}"
                                  method="post">
                                @csrf
                                {{-- Change the method to PUT --}}
                                @method('PUT')
                                {{-- Change the value if the user is an admin --}}
                                <input type="hidden" name="is_admin"
                                       value="@php echo($user->is_admin ? '1' : '0'); @endphp">

                                <div class="row my-2">
                                    <div class="col-12 mt-2">
                                        <label for="first_name">
                                            <h5>Change Name</h5>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-control" type="text" id="name" name="name"
                                               value="{{ $user->name }}">
                                    </div>
                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <label for="password">
                                            <h5>Change Password</h5>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input class="form-control" id="password" type="password" name="password"
                                               placeholder="New Password">
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="password" name="password_confirmation"
                                               placeholder="Repeat New Password">
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-12 mt-4">
                                        <a>
                                            <input class="prim-btn" type="submit" value="Save">
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-12">
                        <h3>Delete Account</h3>
                        <p>Your account will be completely deleted, all your data will be lost.</p>
                        <form action="{{ route('user.destroy', ['user' => $user]) }}" method="post" class="form-group">
                            @csrf
                            {{-- Change the method to delete --}}
                            @method('DELETE')
                            <input class="danger-btn my-2" type="submit" value="Delete"
                                   onclick="return confirm ('Are you sure you want to delete your account?')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
