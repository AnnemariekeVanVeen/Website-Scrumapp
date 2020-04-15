{{-- Index Blade for backlog items --}}

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
        <div class="row mt-5 mb-4 w-100">
            <div class="col-6">
                <h1 class="font-weight-bold">Backlog Items</h1>
            </div>
            <div class="col-6">
                <a href="{{ route('backlogItem.create', ['project' => $project]) }}"
                   class="prim-btn float-right">Add Backlog Item</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div class="bg-block">
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
                            $i = 1;
                        @endphp
                        {{-- Load in all the backlog_items --}}
                        @foreach($backlog_items as $backlog_item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $backlog_item->title }}</td>
                                <td>{{ $backlog_item->state }}</td>
                                <td>{{ $backlog_item->priority }}</td>
                                @if(!is_null($backlog_item->sprint))
                                    <td>Iteration: {{ $backlog_item->sprint->iteration }}</td>
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
                                        @method('DELETE')
                                        <input class="danger-btn d-inline-block float-right" type="submit"
                                               value="Delete"
                                               onclick="return confirm ('Are you sure you want to delete {{ $backlog_item->title }}?')">
                                    </form>
                                </td>
                            </tr>
                            {{-- Counter + 1 --}}
                            @php $i++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
