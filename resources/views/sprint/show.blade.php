{{-- Show Blade for sprints --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5 mb-5 path-menu">
            <div class="col-8">
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white shadow-nav">
                        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projecten</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backlogItem.index', ['project' => $project]) }}">Backlog Items</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('retrospective.index', ['project' => $project]) }}">Retrospectives</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('sprint.index', ['project' => $project]) }}">Sprints</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <h1 class="font-weight-bold">Iteration {{ $sprint->iteration }}</h1>
            </div>
            <div class="col-6">
                <h3 class="float-right">{{ $sprint->sprint_start->format("d/m/Y") }}
                    till {{ $sprint->sprint_end->format("d/m/Y") }}</h3>
            </div>
        </div>
        <div class="row board mt-5">
            <div class="col-4 board-row border-right box" data-state="New">
                <h3 class="mb-5">New</h3>
                {{-- Show all the backlog items of a sprint --}}
                @foreach($sprint->backlog_items as $backlog_item)
                    {{-- Check if the state of a backlog item equals New --}}
                    @if($backlog_item->state == "New")
                        <div id="{{ $backlog_item->id }}" data-id="{{ $backlog_item->id }}"
                             class="card bg-block task mb-4"
                             draggable="true">
                            <div class="card-body d-flex flex-row">
                                <div>
                                    <h4 class="d-inline-block card-title font-weight-bold mb-2">{{ $backlog_item->title }}</h4>
                                    <p class="d-inline-block ml-3 card-text">{{ $backlog_item->assigned_to }}</p>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="card-body">
                                <div class="card-text collapse" id="collapseContent{{ $backlog_item->id }}">
                                    <h6>Created At: {{ date_format($backlog_item->created_at, "d/m/Y") }}</h6>
                                    <h6>Updated At: {{ date_format($backlog_item->updated_at, "d/m/Y")}}</h6>
                                    <h6>Story Points: {{ $backlog_item->story_points }}</h6>
                                </div>

                                <a class="btn btn-flat p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse"
                                   href="#collapseContent{{ $backlog_item->id }}" aria-expanded="false" aria-controls="collapseContent">Show
                                    more..</a>
                                <a class="btn btn-flat text-primary float-right"
                                   href="{{ route('backlogItem.show', ['backlogItem' => $backlog_item, 'project' => $project])}}">View</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-4 board-row border-right box" data-state="In Progress">
                <h3 class="mb-5">In Progress</h3>
                {{-- Show all the backlog items of a sprint --}}
                @foreach($sprint->backlog_items as $backlog_item)
                    {{-- Check if the state of a backlog item equals In Progress --}}
                    @if($backlog_item->state == "In Progress")
                        <div id="{{ $backlog_item->id }}" data-id="{{ $backlog_item->id }}"
                             class="card bg-block task mb-4"
                             draggable="true">
                            <div class="card-body d-flex flex-row">
                                <div>
                                    <h4 class="d-inline-block card-title font-weight-bold mb-2">{{ $backlog_item->title }}</h4>
                                    <p class="d-inline-block ml-3 card-text">{{ $backlog_item->assigned_to }}</p>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="card-body">
                                <div class="card-text collapse" id="collapseContent{{ $backlog_item->id }}">
                                    <h6>Created At: {{ date_format($backlog_item->created_at, "d/m/Y") }}</h6>
                                    <h6>Updated At: {{ date_format($backlog_item->updated_at, "d/m/Y")}}</h6>
                                    <h6>Story Points: {{ $backlog_item->story_points }}</h6>
                                </div>

                                <a class="btn btn-flat p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse"
                                   href="#collapseContent{{ $backlog_item->id }}" aria-expanded="false" aria-controls="collapseContent">Show
                                    more..</a>
                                <a class="btn btn-flat text-primary float-right"
                                   href="{{ route('backlogItem.show', ['backlogItem' => $backlog_item, 'project' => $project])}}">View</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-4 board-row box" data-state="Done">
                <h3 class="mb-5">Done</h3>
                {{-- Show all the backlog items of a sprint --}}
                @foreach($sprint->backlog_items as $backlog_item)
                    {{-- Check if the state of a backlog item equals Done --}}
                    @if($backlog_item->state == "Done")
                        <div id="{{ $backlog_item->id }}" data-id="{{ $backlog_item->id }}"
                             class="card bg-block task mb-4"
                             draggable="true">
                            <div class="card-body d-flex flex-row">
                                <div>
                                    <h4 class="d-inline-block card-title font-weight-bold mb-2">{{ $backlog_item->title }}</h4>
                                    <p class="d-inline-block ml-3 card-text">{{ $backlog_item->assigned_to }}</p>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="card-body">
                                <div class="card-text collapse" id="collapseContent{{ $backlog_item->id }}">
                                    <h6>Created At: {{ date_format($backlog_item->created_at, "d/m/Y") }}</h6>
                                    <h6>Updated At: {{ date_format($backlog_item->updated_at, "d/m/Y")}}</h6>
                                    <h6>Story Points: {{ $backlog_item->story_points }}</h6>
                                </div>

                                <a class="btn btn-flat p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse"
                                   href="#collapseContent{{ $backlog_item->id }}" aria-expanded="false" aria-controls="collapseContent">Show
                                    more..</a>
                                <a class="btn btn-flat text-primary float-right"
                                   href="{{ route('backlogItem.show', ['backlogItem' => $backlog_item, 'project' => $project])}}">View</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="ter-btn col-8 mt-5" href="{{ route('backlogItem.create', ['project' => $project]) }}">Add
                    Backlog Item</a>
            </div>
            <div class="col-6">
                <a class="float-right prim-btn col-8 mt-5"
                   href="{{ route('sprint.edit', ['sprint' => $sprint, 'project' => $project]) }}">Edit Sprint</a>
            </div>
        </div>

    </div>

@endsection
