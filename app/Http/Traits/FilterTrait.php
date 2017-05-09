<?php

namespace App\Http\Traits;

/**
 * Class FilterTrait
 *
 * @author EB
 * @package App\Http\Traits
 */
trait FilterTrait
{

    /**
     * Returns the default pagination count
     *
     * @author EB
     * @return int
     */
    abstract protected function getDefaultPaginationCount();
}
