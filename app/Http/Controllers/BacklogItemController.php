<?php

namespace App\Http\Controllers;

use App\BacklogItem;
use App\Http\Requests\BacklogItemRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BacklogItemController extends Controller
{
    /**
     * BacklogItemController constructor with specified middleware.
     */
    public function __construct()
    {
        $this->middleware('has.project')->except('updateState');
        $this->middleware('auth')->except('updateState');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function index(Project $project)
    {
        // Get all the backlog items that belong to the project given as parameter.
        $backlog_items = $project->backlog_items;

        return view('backlogItem.index', compact('backlog_items', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function create(Project $project)
    {
        // Get the sprints that belong to the project given as parameter
        $sprints = $project->sprints;

        return view('backlogItem.create', compact('project', 'sprints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BacklogItemRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project, BacklogItemRequest $request)
    {
        $bli = new BacklogItem();

        $bli->title = $request->title;
        $bli->sprint_id = $request->sprint_id;
        $bli->assigned_to = $request->assigned_to;
        $bli->state = $request->state;
        $bli->priority = $request->priority;
        $bli->role = $request->role;
        $bli->activity = $request->activity;
        $bli->story_points = $request->story_points;
        $bli->description = $request->description;
        $bli->acceptation_criteria = $request->acceptation_criteria;
        $bli->project_id = $project->id;

        $bli->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param BacklogItem $backlogItem
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project, BacklogItem $backlogItem)
    {
        return view('backlogItem.show', compact('backlogItem', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BacklogItem $backlogItem
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project, BacklogItem $backlogItem)
    {
        // Get the sprints that belong to the project given as parameter
        $sprints = $project->sprints;

        return view('backlogItem.edit', compact('project', 'sprints', 'backlogItem'));
    }

    /**
     * Update the specified resource in storage through the edit form.
     *
     * @param Project $project
     * @param BacklogItemRequest $request
     * @param BacklogItem $backlogItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, BacklogItemRequest $request, BacklogItem $backlogItem)
    {
        $backlogItem->title = $request->title;
        $backlogItem->sprint_id = $request->sprint_id;
        $backlogItem->assigned_to = $request->assigned_to;
        $backlogItem->state = $request->state;
        $backlogItem->priority = $request->priority;
        $backlogItem->role = $request->role;
        $backlogItem->activity = $request->activity;
        $backlogItem->story_points = $request->story_points;
        $backlogItem->description = $request->description;
        $backlogItem->acceptation_criteria = $request->acceptation_criteria;
        $backlogItem->project_id = $project->id;

        $backlogItem->save();

        return redirect()->back();
    }

    /**
     * Update only the state of a backlog item through the JavaScript Drag&Drop system on sprint.show.
     *
     * @param Request $request
     * @return void
     */
    public function updateState(Request $request)
    {
        if ($request->get('action') == 'move'):
            $id = $request->get('backlogId');
            $bli = BacklogItem::find($id);
            $bli->state = $request->get('state');

            $bli->save();

            print('OK');

            return;
        endif;

        print('NOK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BacklogItem $backlogItem
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project, BacklogItem $backlogItem)
    {
        $backlogItem->delete();
        return redirect()->route('backlogItem.index', 'project');
    }
}
