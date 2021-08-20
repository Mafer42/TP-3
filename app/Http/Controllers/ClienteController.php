<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $texto = $request->get('filtro');

        $clientes = DB::table('clientes')
        ->where('numeroIdentidad','LIKE', '%'.$texto.'%')
        ->orwhere('nombre','LIKE', '%'.$texto.'%')
        ->orwhere('telefono','LIKE', '%'.$texto.'%')
        ->paginate(10);

        return view('clienteIndex')->with('clientes', $clientes)->with('texto', $texto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nuevoCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'numeroIC'=>'required|unique:clientes,numeroIdentidad|alpha_dash',
            'nombreC'=>'required|alpha',
            'telefonoC'=>'required|numeric',
           
        ]);

        $nuevoCliente = new Cliente();

        // Formulario
        $nuevoCliente->numeroIdentidad = $request->input('numeroIC');
        $nuevoCliente->nombre = $request->input('nombreC');
        $nuevoCliente->telefono= $request->input('telefonoC');

       
        $creadoC = $nuevoCliente->save();

        if ($creadoC) {
            return redirect()->route('cliente.index')
            ->with('mensaje', 'El Cliente fue creado exitosamente');
        }
        else{
            // TODO Retornar con un msj de error.
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        return view('clienteShow')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        return view('editarCLiente')->with('cliente', $cliente);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'numeroIC'=>'required',
            'nombreC'=>'required',
            'telefonoC'=>'required|numeric',
           
        ]);

        $cliente = new Cliente();

        // Formulario
        $cliente->numeroIdentidad = $request->input('numeroIC');
        $cliente->nombre = $request->input('nombreC');
        $cliente->telefono= $request->input('telefonoC');

       
        $creadoC = $cliente->save();

        if ($creadoC) {
            return redirect()->route('cliente.index')
            ->with('mensaje', 'El Cliente fue modificado exitosamente');
        }
        else{
            // TODO Retornar con un msj de error.
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cliente::destroy($id);
        return redirect('cliente/')
            ->with('mensaje', 'Cliente borrado completamente');
    }
}
