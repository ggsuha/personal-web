<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Show create form.
     */
    public function create()
    {
        return Inertia::render('Project/Form', [
            'action' => 'post'
        ]);
    }
}
