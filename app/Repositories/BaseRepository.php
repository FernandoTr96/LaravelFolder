<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\repositories\interfaces\IBaseRepository;

class BaseRepository implements IBaseRepository{

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getById($id) {
        return $this->model->findOrFail($id);
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