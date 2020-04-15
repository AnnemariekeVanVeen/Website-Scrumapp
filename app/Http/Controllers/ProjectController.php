<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Project;
use App\ProjectUser;
use App\Sprint;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * ProjectController constructor with specified middleware.
     */
    public function __construct()
    {
        $this->middleware('has.project')->except('index', 'create', 'store');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        $user = User::find($user->id);

        return view('project.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project();

        $project->title = $request->title;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->git_link = $request->git_link;

        $project->save();


        $project->users()->attach(Auth::id());


        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return View
     */
    public function show(Project $project)
    {
        // Get the sprints that belong to the project given as parameter
        $sprints = $project->sprints;

        // Get the users that belong to the project given as parameter
        $users = $project->users;

        // Get the backlog items that belong to the project given as parameter
        $backlog_items = $project->backlog_items;

        // Get the retrospectives that belong to the project given as parameter
        $retrospectives = $project->retrospectives;

        return view('project.show', compact('project', 'users', 'backlog_items', 'retrospectives', 'sprints'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return View
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->title = $request->title;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->git_link = $request->git_link;

        $project->save();

        return redirect()->route('project.show', ['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }

    /**
     * Show the form to add users/memebers to a project.
     *
     * @param Project $project
     * @return View
     */
    public function add(Project $project)
    {
        $users = User::all();
        return view('project.add', compact('users', 'project'));
    }

    /**
     * Attach users as members of a project.
     *
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function attach(Request $request, Project $project)
    {
        $project->users()->sync($request->users);

        return redirect()->route('project.show', ['project' => $project]);
    }

    /**
     * Detach users/members from a project.
     *
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function detach(Request $request, Project $project)
    {
        $user_id = $request->user_id;

        $user = User::find($user_id);

        $user->projects()->detach();

        return redirect()->back();
    }
}
