{{-- Create Blade for projects --}}

@extends('layouts.app')

@include('includes._error')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 bg-block">
                <h1>Add a New Project</h1>
                <div class="separator"></div>
                <form id="createProject" action="{{ route('project.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <labek class="col-sm-2 col-form-label">Title</labek>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" placeholder="Description" name="description" form="createProject" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deadline</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" name="deadline" placeholder="Deadline" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Link to Git</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="git_link" placeholder="Link to Git" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-2"></div>
                        <div class="col-sm-10">
                            <input class="prim-btn" value="Add New Project" type="submit" name="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
