{{-- Show Blade for projects --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container">
        <div class="row mt-5 mb-5 path-menu">
            <div class="col-8">
                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white shadow-nav">
                        <li class="breadcrumb-item active"><a href="{{ route('project.index') }}">Projecten</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backlogItem.index', ['project' => $project]) }}">Backlog Items</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('retrospective.index', ['project' => $project]) }}">Retrospectives</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('sprint.index', ['project' => $project]) }}">Sprints</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-8">
                <h1 class="font-weight-bold">{{ $project->title }}</h1>
            </div>
            <div class="col-4">
                <h2 class="float-right text-danger">Finish on {{ date_format($project->deadline, "d/m/Y") }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bg-block">
                    <label for="description"><h2>Description</h2></label>
                    <textarea class="form-control" id="description" rows="10"
                              disabled>{{ $project->description }}</textarea>
                </div>
            </div>
        </div>
        <h2 class="mt-5">Members</h2>
        {{-- Check if there are users in the project --}}
        @if(!is_null($users))
            <div class="row">
                @foreach($users as $user)
                    <div class="col-4 mb-4">
                        <div class="card bg-block">
                            <div class="card-header">
                                <h4 class="mt-1">{{ $user->name }}</h4>
                            </div>
                            {{-- Check if the user has a profile --}}
                            @if(!is_null($user->profile))
                                <div class="card-body">

                                    <p class="font-weight-bold">Date of
                                        Birth: {{ $user->profile->date_of_birth->format("d/m/Y") }}</p>
                                    <p class="font-weight-bold">Scrum
                                        Experience: {{ $user->profile->scrum_experience->format("d/m/Y") }}</p>
                                    <p class="font-weight-bold">Programming
                                        Experience: {{ $user->profile->programming_experience->format("d/m/Y") }}</p>
                                </div>
                            @else
                                <div class="card-body">
                                    <p class="font-weight-bold">Date of Birth: </p>
                                    <p class="font-weight-bold">Scrum Experience: </p>
                                    <p class="font-weight-bold">Programming Experience</p>
                                </div>
                            @endif
                            <div class="card-footer">
                                <form action="{{ route('detach', ['project' => $project]) }}" method="get">
                                    @csrf
                                    <input type="hidden" value="{{ $user->id }}"
                                           name="user_id">
                                    {{-- Check if the displayed user is the same as the logged in user --}}
                                    @if(\Illuminate\Support\Facades\Auth::id() != $user->id)
                                        <input type="submit" value="Remove Member" class="danger-btn">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a class="prim-btn my-2" href="{{ route('addMember', ['project' => $project]) }}">Add Member</a>

        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-block">
                    <h2>Sprints</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Iteration</th>
                            <th scope="col">Starting Date</th>
                            <th scope="col">Ending Date</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sprints as $sprint)
                            <tr>
                                <td>{{ $sprint->iteration }}</td>
                                <td>{{ $sprint->sprint_start->format("d/m/Y") }}</td>
                                <td>{{ $sprint->sprint_end->format("d/m/Y") }}</td>
                                <td><a href="{{ route('sprint.show', ['sprint' => $sprint, 'project' => $project]) }}"
                                       class="prim-btn">View</a></td>
                                <td>
                                    <form
                                        action="{{ route('sprint.destroy', ['sprint' => $sprint, 'project' => $project]) }}"
                                        method="post">
                                        @csrf
                                        {{-- Change method to DELETE --}}
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="danger-btn">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="prim-btn col-3 my-4" href="{{ route('sprint.create', ['project' => $project]) }}">Add
                    Sprint</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-block">
                    <h2>Retrospectives</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Type</th>
                            <th scope="col">Created At</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Create a counter --}}
                        @php
                            $i = 1
                        @endphp
                        {{-- Load in all the retrospectives --}}
                        @foreach($retrospectives as $retrospective)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Retrospective</td>
                                <td>{{ date_format($retrospective->created_at, "d/m/Y") }}</td>
                                <td>
                                    <a href="{{ route('retrospective.show', ['retrospective' => $retrospective, 'project' => $project]) }}"
                                       class="prim-btn">View</a></td>
                                <td>
                                    <form
                                        action="{{ route('retrospective.destroy', ['retrospective' => $retrospective, 'project' => $project]) }}"
                                        method="post">
                                        @csrf
                                        {{-- Change method to DELETE --}}
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="danger-btn">
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <form method="post" action="{{ route('retrospective.store', ['project' => $project]) }}">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <input class="prim-btn col-3 my-4" type="submit" value="Add Retrospective">
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-block">
                    <h2>Backlog Items</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Title</th>
                            <th scope="col">State</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Iteration</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Create a counter --}}
                        @php
                            $j = 1
                        @endphp
                        {{-- Load in all the backlog items --}}
                        @foreach($backlog_items as $backlog_item)
                            @if($j == 10)
                                @php die() @endphp
                            @endif
                            <tr>
                                <td>{{ $j }}</td>
                                <td>{{ $backlog_item->title }}</td>
                                <td>{{ $backlog_item->state }}</td>
                                <td>{{ $backlog_item->priority }}</td>
                                {{-- Check if the backlog item has a sprint --}}
                                @if(!is_null($backlog_item->sprint))
                                    <td>{{ $backlog_item->sprint->iteration }}</td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $backlog_item->assigned_to }}</td>
                                <td>
                                    <a href="{{ route('backlogItem.show', ['backlogItem' => $backlog_item, 'project' => $project]) }}"
                                       class="prim-btn">View</a></td>
                                <td>
                                    <form
                                        action="{{ route('backlogItem.destroy', ['backlogItem' => $backlog_item, 'project' => $project]) }}"
                                        method="post">
                                        @csrf
                                        {{-- Change method to DELETE --}}
                                        @method('DELETE')
                                        <input class="danger-btn d-inline-block float-right" type="submit"
                                               value="Delete"
                                               onclick="return confirm ('Are you sure you want to delete {{ $backlog_item->title }}?')">
                                    </form>
                                </td>
                            </tr>
                            @php
                                $j++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="prim-btn col-3 my-4"
                   href="{{ route('backlogItem.create', ['project' => $project]) }}">Add Backlog Item</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="bg-block w-100 margin-grid">
                <div class="col-12">
                    <h2>Github Link</h2>
                </div>
                <div class="col-12 my-2">
                    <a href="{{ $project->git_link }}" target="_blank"><textarea class="form-control" rows="1"
                                                                                 disabled>{{ $project->git_link }}</textarea></a>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-6">
                <a class="prim-btn col-6"
                   href="{{ route('project.edit', ['project' => $project]) }}">Edit Project</a>
            </div>
            <div class="col-6">
                <form action="{{ route('project.destroy', ['project' => $project]) }}" method="post">
                    @csrf
                    {{-- Change method to DELETE --}}
                    @method('DELETE')
                    <input class="danger-btn col-6 d-inline-block float-right" type="submit" value="Delete Project"
                           onclick="return confirm ('Are you sure you want to delete {{ $project->title }}?')">
                </form>
            </div>
        </div>
    </div>

@endsection
