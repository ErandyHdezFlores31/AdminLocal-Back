<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartados;
use App\Repositories\ApartadosRepository;

class ApartadosController extends Controller
{
    protected $apartados_repository;

    public function __construct(ApartadosRepository $_apartados)
    {
        $this->apartados_repository = $_apartados;
    }

    public function create(Request $request){
        $id = $request->input('id');
        $nombre =$request->input('nombre');
        $fechapartado = $request->input('fechapartado');
        $fechainicio = $request->input('fechainicio');
        $fechasalida = $request->input('fechasalida');
        $diasrentados = $request->input('diasrentados');
        $totalrenta = $request->input('totalrenta');
        $adelanto =$request->input('adelanto');
        $resto =$request->input('resto');
        $fechavencimiento =$request->input('fechavencimiento');
        $locales_id =$request->input('locales_id');
        return response()->json($this->apartados_repository->create($nombre, $fechapartado, $fechainicio, $fechasalida, $diasrentados, $totalrenta, $adelanto, $resto, $fechavencimiento, $locales_id)); //
    }

    public function updated(Request $request, $id)
    {
        $nombre =$request->input('nombre');
        $fechapartado = $request->input('fechapartado');
        $fechainicio = $request->input('fechainicio');
        $fechasalida = $request->input('fechasalida');
        $diasrentados = $request->input('diasrentados');
        $totalrenta = $request->input('totalrenta');
        $adelanto =$request->input('adelanto');
        $resto =$request->input('resto');
        $fechavencimiento =$request->input('fechavencimiento');
        $locales_id =$request->input('locales_id');
       return response()->json($this->apartados_repository->update($id, $nombre, $fechapartado, $fechainicio, $fechasalida, $diasrentados, $totalrenta, $adelanto, $resto, $fechavencimiento, $locales_id)); //
    }

    public function delete($id){
        return response()->json($this->apartados_repository->delete($id));
    }
    public function list(){
        return response()->json($this->apartados_repository->list());
    }
    public function editar($id)
    {
        return response()->json($this->apartados_repository->find($id));
    }

    public function vencimiento($fechavencimiento)
    {
        return response()->json($this->apartados_repository->list());
    }
}
