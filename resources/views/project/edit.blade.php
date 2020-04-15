{{-- Edit Blade for projects --}}

@extends('layouts.app')

@include('includes._error')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1>{{ $project->title }}</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form id="editProject" action="{{ route('project.update', ['project' => $project->id]) }}" method="post">
                    @csrf
                    {{-- Change method to PUT --}}
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" value="{{ $project->title }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="description" form="editProject" required>{{ $project->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deadline</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" name="deadline" value="{{ $project->deadline }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Link to Git</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="git_link" value="{{ $project->git_link }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-info col-4" value="Edit Project" type="submit" name="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
