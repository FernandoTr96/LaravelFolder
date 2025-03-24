<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Aplica los filtros sobre la consulta basados en los parámetros de la request.
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeApplyFilters(array $filters, Builder $query)
    {
        // Obtener los parámetros de la query
        $request = request();
        $queryKeyForSearch = 'search';
        $queryParams = $request->query();

        if (empty($filters)) {
            return $query;
        }

        // Aplicar los filtros 'where'
        if (isset($filters['where'])) {
            foreach ($filters['where'] as $filter) {
                if (isset($queryParams[$filter])) {
                    $query->where($filter, $queryParams[$filter]);
                }
            }
        }

        // Aplicar los filtros 'like'
        if (isset($filters['like'])) {
            foreach ($filters['like'] as $filter) {
                if (isset($queryParams[$filter])) {
                    $query->where($filter, 'like', '%' . $queryParams[$queryKeyForSearch] . '%');
                }
            }
        }

        // Aplicar los filtros 'custom'
        if (isset($filters['custom'])) {
            foreach ($filters['custom'] as $customProperty) {
                if (isset($customProperty['callback']) && is_callable($customProperty['callback'])) {
                    // Ejecutar la función de callback personalizada
                    $customProperty['callback']($query);
                }
            }
        }

        return $query;
    }
}
