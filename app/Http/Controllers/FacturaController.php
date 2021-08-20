<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas =Factura::paginate(10);
        return view('facturaIndex')->with('facturas', $facturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nuevaFactura');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'clienteId'=>'required', //required es un campo obligartorio, alpha que no lleva numeros
            'fechaV'=>'required|date',
            'productoId'=>'required',
            'precioVId'=>'required|numeric|'
        ]);
        $nuevaFactura = new Factura();
        //formulario

        $nuevaFactura->cliente_id = $request->input('clienteId');
        $nuevaFactura->fecha_venta = $request->input('fechaV');
        $nuevaFactura->producto_id= $request->input('productoId');
        $nuevaFactura->precio_venta_id = $request->input('precioVId');

        $creadoF = $nuevaFactura ->save();

        if ($creadoF){
            return redirect() ->route('factura.index')
                -> with('mensaje', 'La factura fue creada exitosamente');
        }
        else{
            //retornar con un mensaje de error

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $factura = Factura::findOrFail($id);
        return view('facturaShow')->with('factura', $factura);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $factura = Factura::findOrFail($id);
        return view('editarFactura')->with('factura', $factura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'clienteId'=>'required', //required es un campo obligartorio, alpha que no lleva numeros
            'fechaV'=>'required|date',
            'productoId'=>'required',
            'precioVId'=>'required|numeric|'
        ]);
        $factura = new Factura();
        //formulario

        $factura->cliente_id = $request->input('clienteId');
        $factura->fecha_venta = $request->input('fechaV');
        $factura->producto_id= $request->input('productoId');
        $factura->precio_venta_id = $request->input('precioVId');

        $creadoF =  $factura->save();

        if ($creadoF){
            return redirect() ->route('factura.index')
                -> with('mensaje', 'La Factura fue modifiada correctamente');
        }else{
            //retornar con un mensaje de error

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factura::destroy($id);
        return redirect()->route('factura.index')
            ->with('mensaje', 'Factura borrada correctamente');
    }
}
