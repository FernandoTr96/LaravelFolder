<?php

// para  que funcione los parametros en el front deben ser asi:
// http://localhost/users?sort[]=name&sort[]=email&sortBy[]=desc&sortBy[]=asc

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Sorteable
{
    public function scopeSorteable(Builder $query)
    {
        $request = request();
        $sort = $request->query('sort');
        $sortBy = $request->query('sortBy');

        isset($sort) && isset($sortBy) ? 
        $query->orderBy($sort, $sortBy) : 
        $query->orderBy('id', 'desc');

        return $query;
    }
}
