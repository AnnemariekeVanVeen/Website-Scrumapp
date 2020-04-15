{{-- Index Blade for projects --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-8">
                <h1 class="font-weight-bold">My Projects</h1>
            </div>
            <div class="col-sm-4">
                <a class="col-4" href=" {{ route('project.create') }}">
                    <button class="prim-btn float-right">Add New Project</button>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            {{-- Load in all the projects of a user --}}
            @foreach($user->projects as $project)
                <div class="col-sm-4">

                    <div class="card bg-block mb-xl-5">

                        <!-- Card content -->
                        <div class="card-body d-flex flex-row">

                            <!-- Avatar -->
                            <img src="{{ asset('storage/img/CodeSign_mirror.jpeg') }}"
                                 class="rounded-circle mr-3"
                                 height="50px" width="50px" alt="avatar">
                            
                            <div>

                                <h3 class="card-title font-weight-bold mb-2">{{ $project->title }}</h3>

                                <p class="card-text">{{date_format($project->created_at, "d/m/Y")}}</p>

                            </div>

                        </div>
                        <hr class="mt-0">

                        <div class="card-body">
                            <p class="card-text collapse"
                               id="collapseContent{{ $project->id }}">{{ $project->description }}</p>
                            <a class="btn btn-flat p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse"
                               href="#collapseContent{{ $project->id }}" aria-expanded="false"
                               aria-controls="collapseContent">Show
                                more..</a>
                            <a class="btn btn-flat text-primary float-right"
                               href="{{ route('project.show', ['project' => $project])}}">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
