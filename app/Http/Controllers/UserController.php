<?php

namespace App\Http\Controllers;
use App\repositories\UserRepository;

class UserController extends Controller
{
    /* inyeccion de dependencias */
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index(){
        $users = $this->userRepository->getAll();
        return $users;
    }
}
