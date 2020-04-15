{{-- Edit Blade for sprints --}}

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
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card bg-block card-signin flex-row my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sprint Edit</h5>
                        <form class="form-signin" method="post" action="{{ route('sprint.update', ['sprint' => $sprint, 'project' => $project]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-label-group">
                                <input id="iteration" type="number" min="1" class="text-center form-control"
                                       name="iteration" value="{{ $sprint->iteration }}" placeholder="Iteration">
                                <label for="iteration">Iteration</label>
                            </div>

                            <div class="form-label-group">
                                <input id="sprint_start" type="date"
                                       class="text-center form-control" name="sprint_start"
                                       placeholder="Starting Date">

                                <label for="sprint_start">Starting Date</label>
                            </div>

                            <div class="form-label-group">
                                <input id="sprint_end" type="date"
                                       class="text-center form-control" name="sprint_end"
                                       placeholder="Ending Date">

                                <label for="sprint_end">Ending Date</label>
                            </div>

                            <hr>

                            <input type="submit" class="prim-btn mt-3"
                                   value="Create">
                        </form>

@endsection
