<?php

namespace App\Repositories;

use App\Models\Clientes;

class ClientesRepository
{

    public function create($nombre, $apellidos, $telefono, $correo, $fechainiciorenta, $fechasalida, $diasrentados, $totalrenta, $locales_id)//
    {
        $cliente['nombre'] = $nombre;
        $cliente['apellidos'] = $apellidos;
        $cliente['telefono'] = $telefono;
        $cliente['correo'] = $correo;
        $cliente['fechainiciorenta'] = $fechainiciorenta;
        $cliente['fechasalida'] = $fechasalida;
        $cliente['diasrentados'] = $diasrentados;
        $cliente['totalrenta'] = $totalrenta;
        $cliente['locales_id'] = $locales_id;
        
        return Clientes::create($cliente);
    }

    public function update($id, $nombre, $apellidos, $telefono, $correo, $fechainiciorenta, $fechasalida, $diasrentados, $totalrenta, $locales_id)//
    {
        $cliente = $this->find($id);
        $cliente->nombre = $nombre;
        $cliente->apellidos = $apellidos;
        $cliente->telefono = $telefono;
        $cliente->correo = $correo;
        $cliente->fechainiciorenta = $fechainiciorenta;
        $cliente->fechasalida = $fechasalida;
        $cliente->diasrentados = $diasrentados;
        $cliente->totalrenta = $totalrenta;
        $cliente->locales_id = $locales_id;
        $cliente->save();
        return $cliente;
    }

    public function delete($id){
        $cliente = $this->find($id);
        return $cliente->delete();
    }
    public function list(){
        $cliente = Clientes::with('locales')->get();
        return $cliente->toArray();
    }

    public function find($id)
    {
        return Clientes::where('id', '=', $id)->first();
    }

 
}
