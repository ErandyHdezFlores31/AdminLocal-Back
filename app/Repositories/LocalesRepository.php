<?php

namespace App\Repositories;

use App\Models\Locales;

class LocalesRepository
{

    public function create($nombrelocal, $descripcion, $preciodia)//
    {
        $local['nombrelocal'] = $nombrelocal;
        $local['descripcion'] = $descripcion;
        $local['preciodia'] = $preciodia;
        return Locales::create($local);
    }

    public function update($id, $nombrelocal, $descripcion, $preciodia)//
    {
        $local = $this->find($id);
        $local->nombrelocal = $nombrelocal;
        $local->descripcion = $descripcion;
        $local->preciodia = $preciodia;
        $local->save();
        return $local;
    }

    public function delete($id){
        $local = $this->find($id);
        return $local->delete();
    }
    public function list(){
        return Locales::all();
    }

    public function find($id)
    {
        return Locales::where('id', '=', $id)->first();
    }

 
}
