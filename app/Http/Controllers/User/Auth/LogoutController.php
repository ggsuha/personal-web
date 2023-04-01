<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Logout user process.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $this->guard()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
