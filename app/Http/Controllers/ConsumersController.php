<?php

namespace App\Http\Controllers;

use App\Stack\Consumers;
use Illuminate\Database\Eloquent\Collection;
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
     * @return Collection
     */
    public function index(Request $request)
    {
        return Consumers::all();
    }
}
