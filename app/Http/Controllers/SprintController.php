<?php

namespace App\Http\Controllers;

use App\Http\Requests\SprintRequest;
use App\Project;
use App\Sprint;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SprintController extends Controller
{
    /**
     * SprintController constructor with specified middleware.
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
        // Get the sprints that belong to the project given as parameter
        $sprints = $project->sprints;

        return view('sprint.index', compact('sprints', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function create(Project $project)
    {
        return view('sprint.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SprintRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project, SprintRequest $request)
    {
        $sprint = new Sprint;

        $sprint->iteration = $request->iteration;
        $sprint->sprint_start = $request->sprint_start;
        $sprint->sprint_end = $request->sprint_end;
        $sprint->project_id = $project->id;

        $sprint->save();

        return redirect()->route('sprint.index', compact('project'));
    }

    /**
     * Display the specified resource.
     *
     * @param Sprint $sprint
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project, Sprint $sprint)
    {
        return view('sprint.show', compact('sprint', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sprint $sprint
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project, Sprint $sprint)
    {
        return view('sprint.edit', compact('sprint', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param SprintRequest $request
     * @param Sprint $sprint
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, SprintRequest $request, Sprint $sprint)
    {
        $sprint->iteration = $request->iteration;
        $sprint->sprint_start = $request->sprint_start;
        $sprint->sprint_end = $request->sprint_end;

        $sprint->save();

        return redirect()->route('sprint.show', ['sprint' => $sprint, 'project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sprint $sprint
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Project $project, Sprint $sprint)
    {
        $sprint->delete();
        return redirect()->back();
    }
}
