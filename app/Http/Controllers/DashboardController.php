<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * @author EB
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @author EB
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
