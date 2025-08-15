<?php
namespace App\Services;
use App\Models\User;
use App\Helpers\Responses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class UserService
{
    public function create ($data)
    {
        if (empty($data))
        {
          return Responses::error('Mensagem de erro');
        }
        return User::create($data);
    }

    public function login ($data)
    {
      if (empty($data) || empty($data['email']) || empty($data['password']))
      {
        return Responses::error('Login ou senha errado');
      }
    $user = User::where('email', $data['email'])->first();

 
      if (!$user || !Hash::check($data['password'], $user->password)) {
        return Responses::error('Email ou senha inválidos');
    }

    $token = $user->createToken($data['device_name'] ?? 'default-token')->plainTextToken;
    $user->toArray();
    $user['token'] = $token;

        return Responses::success("Criado com Sucesso!", $user);
    }
}
