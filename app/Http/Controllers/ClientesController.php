<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Repositories\ClientesRepository;

class ClientesController extends Controller
{
    protected $clientes_repository;

    public function __construct(ClientesRepository $_clientes)
    {
        $this->clientes_repository = $_clientes;
    }

    public function create(Request $request){
        $id = $request->input('id');
        $nombre =$request->input('nombre');
        $apellidos =$request->input('apellidos');
        $telefono =$request->input('telefono');
        $correo =$request->input('correo');
        $fechainiciorenta =$request->input('fechainiciorenta');
        $fechasalida =$request->input('fechasalida');
        $diasrentados =$request->input('diasrentados');
        $totalrenta =$request->input('totalrenta');
        $locales_id =$request->input('locales_id');
        return response()->json($this->clientes_repository->create($nombre, $apellidos, $telefono, $correo, $fechainiciorenta, $fechasalida, $diasrentados, $totalrenta, $locales_id)); //
    }

    public function updated(Request $request, $id)
    {

        $nombre =$request->input('nombre');
        $apellidos =$request->input('apellidos');
        $telefono =$request->input('telefono');
        $correo =$request->input('correo');
        $fechainiciorenta =$request->input('fechainiciorenta');
        $fechasalida =$request->input('fechasalida');
        $diasrentados =$request->input('diasrentados');
        $totalrenta =$request->input('totalrenta');
        $locales_id =$request->input('locales_id');
       return response()->json($this->clientes_repository->update($id, $nombre, $apellidos, $telefono, $correo, $fechainiciorenta, $fechasalida, $diasrentados, $totalrenta, $locales_id)); //
    }

    public function delete($id){
        return response()->json($this->clientes_repository->delete($id));
    }
    public function list(){
        return response()->json($this->clientes_repository->list());
    }
    public function editar($id)
    {
        return response()->json($this->clientes_repository->find($id));
    }

}