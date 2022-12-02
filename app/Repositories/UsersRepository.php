<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public function create($nombre, $apellidoPaterno, $apellidoMaterno, $email, $password, $personas_id)
    {
        $user['nombre'] = $nombre . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno;
        $user['email'] = $email;
        $user['password'] = $password;
        $user['personas_id'] = $personas_id;

        return User::create($user);
    }
    public function update($id, $nombre, $apellidoPaterno, $apellidoMaterno)
    {
        $user = $this->find($id);
        $user->nombre = $nombre . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno;
        $user->save();
        return $user;
    }

    public function find($id)
    {
        return User::where('id', '=', $id)->first();
    }
}