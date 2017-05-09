<?php

namespace App\Http\Controllers;

use App\Stack\Consumers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
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
        /** @var Builder $query */
        $query = Consumers::query();

//        if ($request->has('first_name')) {
//            $query->where('first_name', 'like', '%' . $request->get('first_name') . '%');
//        }

        $filters = $request->only($query->getModel()->getFillable());

        foreach ($filters as $k => $v) {
            $query->where($k, 'like', '%' . $v . '%');
        }

        $data = $query->paginate($request->get('per_page', 5));

        return $data;
    }
}
