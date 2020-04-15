{{-- Show Blade for retrospectives --}}

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
            <div class="col-sm-8">
                <h1 class="font-weight-bold">Retrospective</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-6 border-right">
                <h4 class="text-center">What did go well</h4>
                <hr>
                <div id="commentDivPos" class="row">
                    {{-- Load in all the comments of a retrospective --}}
                    @foreach($comments as $comment)
                        {{-- Check if the type of the comment is negative or positive --}}
                        @if($comment->type == 1)
                            <div class="col-12">
                                <h5 class="d-inline-block">{{ $comment->comment }}</h5>
                                <p class="d-inline-block float-right small"><small>Posted
                                        by {{ $comment->user->name }}
                                        at {{ date_format($comment->created_at, "d/m/Y H:i") }}</small></p>
                                <form
                                    action="{{ route('retrospectiveComment.destroy', ['retrospectiveComment' => $comment, 'project' => $project]) }}"
                                    method="post">
                                    @csrf
                                    {{-- Change the method to DELETE --}}
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="danger-btn">
                                </form>
                                <hr class="mt-4">
                            </div>
                        @endif
                    @endforeach
                </div>

                <form id="commentFormPos" method="post"
                      action="{{ route('retrospectiveComment.store', ['project' => $project]) }}">
                    @csrf
                    <input type="hidden" value="1" name="type">
                    <input type="hidden" value="{{ $retrospective->id }}" name="retrospective_id">
                    <input type="hidden" value="{{ auth()->id() }}" name="user_id">
                    <textarea form="commentFormPos" rows="4" class="form-control" name="comment" id="comment_pos"
                              required></textarea>
                    <input id="sendBtnPos" type="submit" value="Send" class="prim-btn mt-1 mb-5 float-right">
                </form>

            </div>

            <div class="col-6 border-left">
                <h4 class="text-center">What didn't go well</h4>
                <hr>
                <div id="commentDivNeg" class="row">
                    {{-- Load in all the comments of a retrospective --}}
                    @foreach($comments as $comment)
                        {{-- Check if the type of the comment is negative or positive --}}
                        @if($comment->type == 0)
                            <div class="col-12">
                                <h5 class="d-inline-block">{{ $comment->comment }}</h5>
                                <p class="d-inline-block float-right small"><small>Posted
                                        by {{ $comment->user->name }}
                                        at {{ date_format($comment->created_at, "d/m/Y H:i") }}</small></p>
                                <form
                                    action="{{ route('retrospectiveComment.update', ['project' => $project, 'retrospectiveComment' => $comment] ) }}"
                                    method="post">
                                    @csrf
                                    {{-- Change the method to DELETE --}}
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="danger-btn">
                                </form>
                                <hr class="mt-4">
                            </div>
                        @endif
                    @endforeach
                </div>
                <form id="commentFormNeg" method="post"
                      action="{{ route('retrospectiveComment.store', ['project' => $project]) }}">
                    @csrf
                    <input type="hidden" value="0" name="type">
                    <input type="hidden" value="{{ $retrospective->id }}" name="retrospective_id">
                    <input type="hidden" value="{{ auth()->id() }}" name="user_id">
                    <textarea form="commentFormNeg" rows="4" class="form-control" name="comment" id="comment_neg"
                              required></textarea>
                    <input type="submit" id="sendBtnNeg" value="Send" class="prim-btn mt-1 mb-5 float-right">
                </form>
            </div>
        </div>
    </div>

@endsection
