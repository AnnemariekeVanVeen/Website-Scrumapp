{{-- Index Blade for retrospectives --}}

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
                        <li class="breadcrumb-item active"><a href="{{ route('retrospective.index', ['project' => $project]) }}">Retrospectives</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('sprint.index', ['project' => $project]) }}">Sprints</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-8">
                <h1 class="font-weight-bold">Retrospectives</h1>
            </div>
            <div class="col-4">
                <form method="post" action="{{ route('retrospective.create', ['project' => $project]) }}">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <input class="prim-btn float-right my-2" type="submit" value="Add Retrospective">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="bg-block w-100">
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
                        $i = 1;
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
                                    {{-- Change the method to delete --}}
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="danger-btn">
                                </form>
                            </td>
                        </tr>
                        {{-- Counter + 1 --}}
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection



