<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Show list.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $projects = Project::select('id', 'title', 'slug')
            ->orderByDesc('id')
            ->paginate(10)
            ->onEachSide(1)
            ->withQueryString();

        return Inertia::render('Project/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show create form.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $technologies = Technology::select('id', 'name')->get();

        return Inertia::render('Project/Form', [
            'action' => 'post',
            'technologies' => $technologies
        ]);
    }

    /**
     * Store data.
     *
     * @param \App\Http\Requests\ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        DB::transaction(function () use ($request) {
            $project = Project::create($request->except('images', 'technologies'));

            $project->technologies()->sync($request->technologies);
            $project->createManyImages('images');
        });

        return redirect('/admin/project');
    }

    /**
     * Show edit form.
     *
     * @param \App\Models\Project $project
     * @return \Inertia\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::select('id', 'name')->get();
        $action = 'patch';
        $project->load([
            'technologies',
            'images'
        ]);

        return Inertia::render('Project/Form', compact('project', 'technologies', 'action'));
    }

    /**
     * Store data.
     *
     * @param \App\Models\Project $project
     * @param \App\Http\Requests\ProjectRequest $request
     * @return \Inertia\Response
     */
    public function update(Project $project, ProjectRequest $request)
    {
        DB::transaction(function () use ($request, $project) {
            $project->update($request->except(['images', 'removed_images']));

            $project->technologies()->sync($request->technologies);
            $project->createManyImages('images');
            $project->deleteManyImages('removed_images');
        });

        return redirect()->back();
    }
}
