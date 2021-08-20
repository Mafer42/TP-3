<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(10);

        return view('productoIndex')->with('productos',$productos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nuevoProducto');
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
            'categoriaP' =>'required|alpha',
            'precioC' =>'required|numeric|min:5|max:150',
            'precioV'=>'required|numeric',
            'proveedor'=>'required|numeric|min:1|max:60',
           
        ]);

        $nuevoProducto = new Producto();

        // Formulario
        $nuevoProducto->nombreP = $request->input('nombreP');
        $nuevoProducto->categoria = $request->input('categoriaP');
        $nuevoProducto->precio_compra = $request->input('precioC');
        $nuevoProducto->precio_venta = $request->input('precioV');
        $nuevoProducto->proveedor_id = $request->input('proveedor');
       
        $creadoPV = $nuevoProducto->save();

        if ($creadoPV) {
            return redirect()->route('producto.index')
            ->with('mensaje', 'El producto fue creado exitosamente');
        }
        else{
            // TODO Retornar con un msj de error.
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = Producto::findOrFail($id); 
        return view('productoShow')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id); 
        return view('editarProducto')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombreP' =>'required|',
            'categoriaP' =>'required|alpha',
            'precioC' =>'required|numeric|min:5|max:150',
            'precioV'=>'required|numeric',
            'proveedor'=>'required|',
           
        ]);

        $producto = new Producto();

        // Formulario
        $producto->nombreP = $request->input('nombreP');
        $producto->categoria = $request->input('categoriaP');
        $producto->precio_compra = $request->input('precioC');
        $producto->precio_venta = $request->input('precioV');
        $producto->proveedor_id = $request->input('proveedor');
       
        $creadoPV =  $producto->save();

        if ($creadoPV) {
            return redirect()->route('producto.index')
            ->with('mensaje', 'El producto fue actualizado exitosamente');
        }
        else{
            // TODO Retornar con un msj de error.
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);

        // REDIRIGIR
        return redirect('producto/')
        ->with('mensaje', 'Producto borrado completamente');
    }
}
