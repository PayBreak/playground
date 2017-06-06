<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Stack\Item;
use Illuminate\Http\Request;

/**
 * Class LoanController
 *
 * @author EB
 * @package App\Http\Controllers
 */
class ItemController extends Controller
{
    /**
     * @author EB
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return $this->queryModel(new Item(), $request);
    }

    /**
     * @author EB
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function show($id, Request $request)
    {
        return $this->getModelById(new Item(), $id);
    }
}
