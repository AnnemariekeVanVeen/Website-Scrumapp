{{-- Index Blade for sprints --}}

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
            <div class="col-8">
                <h1 class="font-weight-bold">Sprints</h1>
            </div>
            <div class="col-4">
                <a class="float-right prim-btn" href="{{ route('sprint.create', ['project' => $project]) }}">Add Sprint</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-block">
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
                                    <form action="{{ route('sprint.destroy', ['sprint' => $sprint, 'project' => $project]) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="danger-btn">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
