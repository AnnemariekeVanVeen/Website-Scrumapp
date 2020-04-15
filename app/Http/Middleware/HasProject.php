<?php

namespace App\Http\Middleware;

use App\Project;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Testing\Fakes\PendingMailFake;

class HasProject
{
    /**
     * Handle an incoming request.
     *
     * Check if the current user exists as member of the project.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $project = $request->route()->parameter('project');
//        $project = Project::find($project_id)->first();

      //  dd($project->users);

        if(!$project->users->contains(Auth::user())):
            session()->flash('warning', 'No access rights');
            return redirect()->back();
        endif;
        return $next($request);
    }
}
