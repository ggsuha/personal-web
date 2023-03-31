<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Show list.
     */
    public function index()
    {
        $projects = Project::select('id', 'title', 'slug')->paginate(10)->onEachSide(1)->withQueryString();

        return Inertia::render('Project/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $technologies = Technology::select('id', 'name')->get();

        return Inertia::render('Project/Form', [
            'action' => 'post',
            'technologies' => $technologies
        ]);
    }
}
