<?php

namespace App\repositories;
use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository{

    public function __construct(User $model) {
        parent::__construct($model);
    }
    
    // Métodos personalizados para User
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}