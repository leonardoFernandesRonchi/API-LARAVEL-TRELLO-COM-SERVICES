<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create(UserRegisterRequest $user)
    {
        $data = $user->validated();
       return $this->userService->create($data);
    }

    public function login (UserLoginRequest $user)
    {
        $data = $user->validated();
        return $this->userService->login($data);
    }
}
