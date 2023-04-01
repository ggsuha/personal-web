<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Show project list.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects = Project::query()->select([
            'id',
            'title',
            'slug',
            'description',
        ])->orderByDesc('id')->simplePaginate(4);

        return Inertia::render('Project/Index', compact('projects'));
    }

    /**
     * Show project detail.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        $project->load([
            'technologies',
            'images',
        ]);

        return Inertia::render('Project/Show', compact('project'));
    }
}
