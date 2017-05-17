<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Stack\Loan;
use Illuminate\Http\Request;

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
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return $this->queryModel(new Loan(), $request);
    }

    /**
     * @author EB
     *
     * @param int $id
     * @param Request $request
     */
    public function show($id, Request $request)
    {
        return $this->getModelById(new Loan(), $id);
    }
}
