<?php

namespace App\Repositories;

use App\Traits\Filterable;
use App\Traits\Pagineable;
use App\Traits\Relationable;
use Illuminate\Database\Eloquent\Model;
use App\repositories\interfaces\IBaseRepository;
use App\Traits\Sorteable;

class BaseRepository implements IBaseRepository{

    use Filterable;
    use Pagineable;
    use Relationable;
    use Sorteable;

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll(array $filters, array $relations = [], bool $paginated = true) {
        // listamos
        $query = $this->model->query();
        // Aplicar los filtros
        $query = $this->scopeApplyFilters($filters, $query);
        // Aplicar sort de columnas
        $query = $this->scopeSorteable($query);
        // Cargar relaciones dinámicamente
        $query = $this->scopeWithRelations($relations, $query);
        //paginar
        $query = $this->scopePagineable($paginated, $query);
        // devolvemos el listado
        return $query;
    }

    public function getById($id, array $relations = [])
    {
        // Obtiene el registro por ID utilizando una consulta directa
        $query = $this->model->where('id', $id);
        $query = $this->scopeWithRelations($relations, $query);
        return $query->first();
    }
    

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update($id, array $data) {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete($id) {
        $record = $this->model->findOrFail($id);
        return $record->delete();
    }
}