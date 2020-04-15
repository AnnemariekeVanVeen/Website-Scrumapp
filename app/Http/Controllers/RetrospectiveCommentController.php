<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRetrospectiveCommentRequest;
use App\Project;
use App\RetrospectiveComment;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RetrospectiveCommentController extends Controller
{
    /**
     * RetrospectiveCommentController constructor with specified middleware.
     */
    public function __construct()
    {
        $this->middleware('has.project');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Project $project
     * @param CreateRetrospectiveCommentRequest $request
     * @return RedirectResponse
     */
    public function store(Project $project, CreateRetrospectiveCommentRequest $request)
    {
        /*
         * Type = boolean for positive or negative feedback
         * 0 = negative
         * 1 = positive
         * */

        $comment = new RetrospectiveComment();
        $comment->comment = $request->comment;
        $comment->type = $request->type;
        $comment->retrospective_id = $request->retrospective_id;
        $comment->user_id = $request->user_id;

        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $comment
     * @return void
     */
    public function show(RetrospectiveComment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RetrospectiveComment $comment
     * @return void
     */
    public function edit(RetrospectiveComment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $comment
     * @return void
     */
    public function update(Request $request, RetrospectiveComment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param RetrospectiveComment $retrospectiveComment
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Project $project, RetrospectiveComment $retrospectiveComment)
    {
        $retrospectiveComment->delete();
        return redirect()->back();
    }
}
