<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Pagineable
{
    public function scopePagineable(bool $paginate = true, Builder $query)
    {
        if($paginate){
            $request = request();
            $page = $request->query('page', 1);
            $perpage = $request->query('per_page', 15);
            return $query->paginate($perpage, ['*'], 'page', $page);
        }

        return $query;
    }

}
