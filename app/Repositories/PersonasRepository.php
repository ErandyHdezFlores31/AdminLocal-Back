<?php

namespace App\Repositories;

use App\Models\Personas;
use App\Models\User;

class PersonasRepository
{

    public function create($nombre, $apellidoPaterno, $apellidoMaterno)//
    {
        $person['nombre'] = $nombre;
        $person['apellidoPaterno'] = $apellidoPaterno;
        $person['apellidoMaterno'] = $apellidoMaterno;
       


        return Personas::create($person);
    }

    public function update($id, $nombre, $apellidoPaterno, $apellidoMaterno)//
    {
        $person = $this->find($id);
        $person->nombre = $nombre;
        $person->apellidoPaterno = $apellidoPaterno;
        $person->apellidoMaterno = $apellidoMaterno;
        $person->save();
        return $person;
    }
    public function find($id)
    {
        return Personas::where('id', '=', $id)->first();
    }

    function list()
    {
        $persons = User::with('personas')->get();
        return $persons->toArray();
    }


 
}
