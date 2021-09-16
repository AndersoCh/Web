<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClienteController extends BaseController
{
    public function index(Request $request){

       $edad = $request->get('edad');
       $clientes = DB::table('clientes');
       
       if(isset($edad)){
           $clientes = $clientes->where('edad','>',$edad);
       }
       
       $clientes= $clientes->get();
       return $clientes;
    }

    public function store(Request $request){
        $this->validate($request, array(
            'nombre'=> 'required',
            'email'=>'required|email'
        ));

        $cliente = new Cliente();
        $cliente->nombre = $request->get('nombre');
        $cliente->email = $request->get('email');
        $cliente->save();

        return response()->json($cliente, 201);
    }

    public function update(Request $request, $id){
        $this->validate($request, array(
            'nombre'=> 'required',
            'email'=>'required|email'
        ));
        $cliente = Cliente::findOrFail($id);
        $cliente->fill($request->toArray());
        $cliente->save();
        return response()->json($cliente, 200);
    }

    public function destroy($id){
        $cliente = Cliente::findOrFail($id)->delete();
        return response()->json($cliente, 200);
    }

}
