<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /*
     @extends('layouts.app')

@section('content')
    <div class="container">
Holis
    </div>
@endsection
     */
    public function index(Request  $request)
    {
        $texto = $request->get('filtro');

        $proveedors = DB::table('proveedors')
        ->where('nombre_proveedor','LIKE', '%'.$texto.'%')
        ->orwhere('correo','LIKE', '%'.$texto.'%')
        ->orwhere('telefono','LIKE', '%'.$texto.'%')
        ->orwhere('nombre_contacto_proveedor','LIKE', '%'.$texto.'%')
        ->paginate(10);

        return view('proveedorIndex')->with('proveedors', $proveedors)->with('texto', $texto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nuevoProveedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion 
        $request->validate([
            'nombreP' =>'required|alpha',
            'correoP' =>'required|email',
            'telefono' =>'required|alpha_dash',
            'nombreCP'=>'required|alpha',
           
        ]);

        $nuevoProveedor = new Proveedor();

        // Formulario
        $nuevoProveedor->nombre_proveedor = $request->input('nombreP');
        $nuevoProveedor->correo = $request->input('correoP');
        $nuevoProveedor->telefono = $request->input('telefono');
        $nuevoProveedor->nombre_contacto_proveedor = $request->input('nombreCP');
       
        $creadoPV = $nuevoProveedor->save();

        if ($creadoPV) {
            return redirect()->route('proveedor.index')
            ->with('mensaje', 'El proveedor fue creado exitosamente');
        }
        else{
            // TODO Retornar con un msj de error.
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id); 
        return view('proveedorShow')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedor = Proveedor::findOrFail($id); 
        return view('editarProveedor')->with('proveedor', $proveedor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombreP' =>'required|',
            'correoP' =>'required|email',
            'telefono' =>'required|alpha_dash',
            'nombreCP'=>'required|',
           
        ]);

        $proveedor = new Proveedor();

        // Formulario
        $proveedor->nombre_proveedor = $request->input('nombreP');
        $proveedor->correo = $request->input('correoP');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->nombre_contacto_proveedor = $request->input('nombreCP');
       
        $creadoPV = $proveedor->save();

        if ($creadoPV) {
            return redirect()->route('proveedor.index')
            ->with('mensaje', 'El proveedor fue modificado exitosamente');
        }
        else{
            // TODO Retornar con un msj de error.
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Proveedor::destroy($id);

        // REDIRIGIR
        return redirect('proveedor/')
        ->with('mensaje', 'Proveedor borrado completamente');
    }
}
