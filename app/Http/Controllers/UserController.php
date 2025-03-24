<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {

        // definir filtros
        $filters = [
            'where' => ['id'],
            'custom' => [
                [
                    'callback' => function ($query) {
                        $query->where('created_at', '<=', '2025-03-23 22:06:23');
                    }
                ]
            ],
            'like' => ['name', 'email'],
        ];

        // consultar 
        $users = $this->userService->list(
            filters: $filters,
            relations: [],
            paginated: true
        );

        // responder
        return UserResource::collection($users);
    }
}
