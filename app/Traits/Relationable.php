<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Relationable
{
    public function scopeWithRelations(array $relations, Builder $query)
    {
        if (!empty($relations)) {
            foreach ($relations as $relation) {
                $query->with($relation);
            }
        }

        return $query;
    }

}
