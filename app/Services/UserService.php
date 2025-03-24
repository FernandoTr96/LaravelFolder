<?php

namespace App\Services;
use App\repositories\UserRepository;

class UserService{

    protected $userRepository;
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function list(array $filters, array $relations = [], bool $paginated = true){
        return $this->userRepository->getAll(
            filters: $filters,
            relations: $relations,
            paginated: $paginated
        );
    } 
}
