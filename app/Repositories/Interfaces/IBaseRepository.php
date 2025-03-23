<?php

namespace App\repositories\interfaces;

interface IBaseRepository{
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}