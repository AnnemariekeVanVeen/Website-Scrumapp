<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRetrospectiveCommentRequest;
use App\Project;
use App\Retrospective;
use App\RetrospectiveComment;
use App\RetrospectiveUser;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class RetrospectiveController extends Controller
{
    /**
     * RetrospectiveController constructor with specified middleware.
     */
    public function __construct()
    {
        $this->middleware('has.project');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function index(Project $project)
    {
        // Get the retrospectives that belong to the project given as parameter
        $retrospectives = $project->retrospectives;

        return view('retrospective.index', compact('retrospectives', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project, Request $request)
    {
        $retrospective = new Retrospective();

        $retrospective->project_id = $project->id;

        $retrospective->save();

        /*
         * Loop over all the users/members of a project to add them to the pivot table RetrospectiveUser
         * to guarantee them access to the retrospective
         */
        foreach ($project->users as $user):
            $retrospective_user = new RetrospectiveUser();

            $retrospective_user->retrospective_id = $retrospective->id;
            $retrospective_user->user_id = $user->id;

            $retrospective_user->save();
        endforeach;

        return redirect()->route('retrospective.show', ['retrospective' => $retrospective, 'project' => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param Retrospective $retrospective
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project, Retrospective $retrospective)
    {
        // Get the comments that belong to the retrospective
        $comments = RetrospectiveComment::where('retrospective_id', $retrospective->id)->get();

        return view('retrospective.show', ['retrospective' => $retrospective], compact('comments', 'retrospective', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Retrospective $retrospective
     * @return void
     */
    public function edit(Retrospective $retrospective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Retrospective $retrospective
     * @return void
     */
    public function update(Request $request, Retrospective $retrospective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Retrospective $retrospective
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Project $project, Retrospective $retrospective)
    {
        $retrospective->delete();
        return redirect()->back();
    }
}
