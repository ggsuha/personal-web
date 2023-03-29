<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Inertia\Inertia;

class ProjectController extends Controller
{
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
