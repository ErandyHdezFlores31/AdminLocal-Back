<?php

namespace App\Repositories;

use App\Models\Apartados;

class ApartadosRepository
{

    public function create($nombre, $fechapartado, $fechainicio, $fechasalida, $diasrentados, $totalrenta, $adelanto, $resto, $fechavencimiento, $locales_id)//
    {
        $apartado['nombre'] = $nombre;
        $apartado['fechapartado'] = $fechapartado;
        $apartado['fechainicio'] = $fechainicio;
        $apartado['fechasalida'] = $fechasalida;
        $apartado['diasrentados'] = $diasrentados;
        $apartado['totalrenta'] = $totalrenta;
        $apartado['adelanto'] = $adelanto;
        $apartado['resto'] = $resto;
        $apartado['fechavencimiento'] = $fechavencimiento;
        $apartado['locales_id'] = $locales_id;

        return Apartados::create($apartado);
    }

    public function update($id, $nombre, $fechapartado, $fechainicio, $fechasalida, $diasrentados, $totalrenta, $adelanto, $resto, $fechavencimiento, $locales_id)//
    {
        $apartado = $this->find($id);
        $apartado->nombre = $nombre;
        $apartado->fechapartado = $fechapartado;
        $apartado->fechainicio = $fechainicio;
        $apartado->fechasalida = $fechasalida;
        $apartado->diasrentados = $diasrentados;
        $apartado->totalrenta = $totalrenta;
        $apartado->adelanto = $adelanto;
        $apartado->resto = $resto;
        $apartado->fechavencimiento = $fechavencimiento;
        $apartado->locales_id = $locales_id;
        $apartado->save();
        return $apartado;
    }

    public function delete($id){
        $apartado = $this->find($id);
        return $apartado->delete();
    }
    public function list(){
        $apartado = Apartados::with('locales')->get();
        return $apartado->toArray();
    }

    public function find($id)
    {
        return Apartados::where('id', '=', $id)->first();
    }

    public function listVencimiento($fechavencimiento){
        $apartado = Apartados::where('fechavencimiento', '>', $fechavencimiento)->get();
        return $apartado->toArray();
    }
 
}
