<?php

namespace App\Http\Controllers;

use App\Models\Heroe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class HeroeController extends BaseController
{
    public function index(Request $request){
      
        $heroes = DB::table('heroes');
        $campoBusqueda = $request->get('campo_busqueda');
        if(isset($campoBusqueda)){
            $heroes = $heroes->where('poderes','like','%'.$campoBusqueda."%");
        }
       return $heroes->get();
    }

    public function store(Request $request){
        $this->validate($request, array(
            'nombre'=> 'required',
            'poderes'=>'required',
            'url'=>'required'
        ));

        $heroe = new Heroe();
        $heroe->nombre = $request->get('nombre');
        $heroe->poderes = $request->get('poderes');
        $heroe->url = $request->get('url');
        $heroe->save();
        return response()->json($heroe, 201);
    }

    public function destroy($id){
        $cliente = Heroe::findOrFail($id)->delete();
        return response()->json($cliente, 200);
    }


}
