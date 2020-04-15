{{-- Add Blade to add members to a project --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <h1 class="font-weight-bold margin-grid mb-4">Add Members to Project</h1>
            <div class="col-12">
                <div class="bg-block">
                    <form class="form-group" method="post" action="{{ route('attach', ['project' => $project]) }}">
                        <div class="col-12">
                            @csrf
                            {{-- Load in all the users --}}
                            @foreach($users as $user)
                                <div class="col-5 d-inline-block">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="users[{{$user->id}}]"
                                               value="{{ $user->id }}" id="users{{ $user->id }}">
                                        <label class="custom-control-label"
                                               for="users{{ $user->id }}">{{ $user->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12">
                                <input type="submit" value="Add Member(s)" class="ter-btn my-4 col-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
