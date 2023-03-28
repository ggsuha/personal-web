<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Show dashboard.
     */
    public function __invoke()
    {
        return Inertia::render('Dashboard');
    }
}
