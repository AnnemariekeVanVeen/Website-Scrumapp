{{-- Show Blade for backlog items--}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5 mb-5 path-menu">
            <div class="col-8">
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white shadow-nav">
                        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projecten</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('backlogItem.index', ['project' => $project]) }}">Backlog Items</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('retrospective.index', ['project' => $project]) }}">Retrospectives</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('sprint.index', ['project' => $project]) }}">Sprints</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <h1 class="my-4 d-inline-block font-weight-bold">{{ $backlogItem->title }}
                </h1>
                <h4 class="d-inline-block ml-3">{{ $backlogItem->assigned_to }}</h4>
            </div>
            <div class="col-3">
                <a class="prim-btn float-right my-4 col-8" href="{{ route('backlogItem.index', ['project' => $project]) }}">Go Back</a>
            </div>
            <div class="col-3">
                <a class="ter-btn float-right my-4 col-8" href="{{ route('backlogItem.edit', ['project' => $project, 'backlogItem' => $backlogItem]) }}">Edit</a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="bg-block mb-5">
                    <h3 class="my-3">Description</h3>
                    <p>{{ $backlogItem->description }}</p>
                </div>
                <div class="bg-block">
                    <h3 class="my-3">Acceptation Criteria</h3>
                    <p>{{ $backlogItem->acceptation_criteria }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-block">
                    <h3 class="my-3">Project Details</h3>
                    <ul>
                        {{-- Check if the backlog item has a sprint --}}
                        @if(!is_null($backlogItem->sprint))
                            <li>Iteration: {{ $backlogItem->sprint->iteration }}</li>
                        @else
                            <li>Iteration: </li>
                        @endif
                        <li>Story Points: {{ $backlogItem->story_points }}</li>
                        <li>State: {{ $backlogItem->state }}</li>
                    </ul>
                    <h3>User Story</h3>
                    <p>As {{ $backlogItem->role }}, I want to {{ $backlogItem->activity }}</p>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>

@endsection
