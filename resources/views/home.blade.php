@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3 class="">Backlog Items</h3>
            </div>
        </div>
        <div class="row">
            @foreach($backlog_items as $backlog_item)
                <div class="col-4">
                    <div class="card my-2">
                        <div class="card-header">
                            As {{ $backlog_item->role }} I want to {{ $backlog_item->activity }}
                        </div>
                        <div class="card-body">
                            Story points: {{ $backlog_item->story_points }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <form action="{{ route('AddBacklogItem') }}" method="post">
                        @csrf
                        <div class="card-header">
                            As <input class="text-center" type="text" name="role" placeholder="Role" required> I want to
                            <input class="text-center" type="text" name="activity" placeholder="Activity" required>
                        </div>
                        <div class="card-body">
                            Story points: <input type="number" name="story_points" min="0" required>
                            <input class="btn btn-info" type="submit" value="Add Backlog Item">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
