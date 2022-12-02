<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locales;
use App\Repositories\LocalesRepository;

class LocalesController extends Controller
{
    protected $locales_repository;

    public function __construct(LocalesRepository $_locales)
    {
        $this->locales_repository = $_locales;
    }

    public function create(Request $request){
        $id = $request->input('id');
        $nombrelocal = $request->input('nombrelocal');
        $descripcion =$request->input('descripcion');
        $preciodia =$request->input('preciodia');
        return response()->json($this->locales_repository->create($nombrelocal, $descripcion, $preciodia)); //
    }

    public function updated(Request $request, $id)
    {

        $nombrelocal = $request->input('nombrelocal');
        $descripcion =$request->input('descripcion');
        $preciodia =$request->input('preciodia');
       return response()->json($this->locales_repository->update($id, $nombrelocal, $descripcion, $preciodia)); //
    }

    public function delete($id){
        return response()->json($this->locales_repository->delete($id));
    }
    public function list(){
        return response()->json($this->locales_repository->list());
    }
    public function editar($id)
    {
        return response()->json($this->locales_repository->find($id));
    }

}
