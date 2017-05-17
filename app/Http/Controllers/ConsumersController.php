<?php

namespace App\Http\Controllers;

use App\Stack\Consumer;
use Illuminate\Http\Request;

/**
 * Class ConsumersController
 *
 * @author EB
 * @package App\Http\Controllers
 */
class ConsumersController extends Controller
{
    /**
     * @author EB
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return $this->queryModel(new Consumer(), $request);
    }
}
