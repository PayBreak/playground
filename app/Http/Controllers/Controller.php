<?php

namespace App\Http\Controllers;

use App\Http\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, FilterTrait;

    const DEFAULT_PAGINATION_COUNT = 15;

    /**
     * Default function for querying models
     *
     * @author EB
     * @param Model $model
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function queryModel(Model $model, Request $request)
    {
        $query = $model->newQuery();
        $filters = $request->only($query->getModel()->getVisible());

        foreach ($filters as $k => $v) {
            $query->where($k, 'like', '%' . $v . '%');
        }

        return $query->paginate($request->get('per_page', $this->getDefaultPaginationCount()));
    }

    /**
     * Returns the pagination count
     *
     * @author EB
     * @return int
     */
    protected function getDefaultPaginationCount()
    {
        return self::DEFAULT_PAGINATION_COUNT;
    }
}
