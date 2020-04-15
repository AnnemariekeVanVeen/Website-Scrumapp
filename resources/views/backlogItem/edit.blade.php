{{-- Edit Blade for backlog items --}}

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
            <div class="col-12">
                <div class="bg-block mb-xl-5">
                    <form class="form-group"
                          action="{{ route('backlogItem.update', ['project' => $project, 'backlogItem' => $backlogItem]) }}"
                          method="post" id="bli_form">
                        @csrf
                        {{-- Change method to PUT --}}
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="title">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" id="title" type="text"
                                       value="{{ $backlogItem->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="iteration">Iteration</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="iteration" name="sprint_id">
                                    {{-- Check if $sprints is not empty --}}
                                    @if(!is_null($sprints))
                                        {{-- Load in all the sprints --}}
                                        @foreach($sprints as $sprint)
                                            <option value="{{ $sprint->id }}">{{ $sprint->iteration }}</option>
                                        @endforeach
                                    @else
                                        <option value=""></option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="state">State</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="state" id="state">
                                    <option value="New">New</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Done">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="priority">Priority</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="priority" id="priority">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="assigned_to">Assigned To</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="assigned_to" id="assigned_to">
                                    {{-- Load in all the users of a project --}}
                                    @foreach($project->users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="description">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" name="description" id="description"
                                          form="bli_form">{{ $backlogItem->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="acceptation_criteria">Acceptation
                                Criteria</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" name="acceptation_criteria"
                                          id="acceptation_criteria"
                                          form="bli_form">{{ $backlogItem->acceptation_criteria }}</textarea>
                            </div>
                        </div>
                        <h6>User Story:</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="role">As</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="role" placeholder="Role" name="role"
                                       value="{{ $backlogItem->role }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="activity">I want to</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="activity" placeholder="Activity"
                                       name="activity" value="{{ $backlogItem->activity }}"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="story_points">Story Points</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="story_points" name="story_points"
                                       value="{{ $backlogItem->story_points }}" min="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2"></div>
                            <div class="col-10 text-center">
                                <input type="submit" value="Edit" class="prim-btn col-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
