<?php

namespace App\Http\Controllers;


use App\Models\Personas;
use App\Models\User;
use App\Repositories\PersonasRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    // protected $users_repository;
    protected $persons_repository;

    public function __construct(UsersRepository $_users, PersonasRepository $_persons)
    {
        $this->users_repository = $_users;
        $this->persons_repository = $_persons;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
     
        $users = JWTAuth::user();
      
        if ($users->validation != '') {
            return response()->json('Porfavor valide su usuario para logearse');
        }

        return response()->json(compact('token', 'users'));
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'email' => 'required|string|unique:users|max:50',
            'password' => 'required|min:6',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $person = $this->persons_repository->create(
                $request->get('nombre'),
                $request->get('apellidoPaterno'),
                $request->get('apellidoMaterno'),
                $request->get('email'),//
                $request->get('password')//
            );

            $user = $this->users_repository->create(
                $request->get('nombre'),
                $request->get('apellidoPaterno'),
                $request->get('apellidoMaterno'),
                $request->get('email'),
                Hash::make($request->get('password')),
                $person->id,
            );

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user', 'token', 'person'), 201);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }
    function list()
    {
        return response()->json($this->persons_repository->list());
    }
}