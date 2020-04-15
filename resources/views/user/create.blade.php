{{-- Create a profile for a user --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container mt-5">
        <h1>Create your Profile</h1>
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-block">
                    <form class="form-group" action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Date of birth</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="date" name="date_of_birth" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">When did you start programming?</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="date" name="programming_experience" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">When did you start using Scrum?</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="date" name="scrum_experience"
                                       placeholder="Scrum Experience" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4"></div>
                            <div class="col-8 text-center">
                                <input type="submit" value="Create" class="prim-btn col-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
