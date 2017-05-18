<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

/**
 * Class LoanController
 *
 * @author EB
 * @package App\Http\Controllers
 */
class LoanController extends Controller
{
    /**
     * @author EB
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('loan.index');
    }

    /**
     * @author EB
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('loan.show');
    }
}
