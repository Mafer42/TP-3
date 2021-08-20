@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')
   
<h1>Editar Factura</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{route('factura.update', ['id' => $factura->id])}}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="'cliente_id'"> Codigo del cliente </label>
        <input type="text" class="form-control form-control-user" name="clienteId" id="clienteId"
               placeholder="ingrese un id de cliente" value="{{ $factura->cliente_id }}">
    </div>

    <div class="form-group">
        <label for="fecha_venta">Fecha de Venta</label>
        <input type="text" class="form-control form-control-user" name="fechaV" id="fechaV"
               placeholder="Y-mm-d" value="{{ $factura->fecha_venta }}">
    </div>

    <div class="form-group">
        <label for="producto_id">Id del Producto</label>
        <input type="text" class="form-control form-control-user" name="productoId" id="productoId"
               placeholder= "Ingrese el id del producto" value="{{ $factura->producto_id }}">
    </div>

    <div class="form-group">
        <label for="precio_venta_id">Precio de venta del Producto </label>
        <input type="text" class="form-control form-control-user" name="precioVId" id="precioVId"
               placeholder="Ingrese el id del Producto " value="{{ $factura->precio_venta_id }}">
    </div>
    
    <br>
    <button type="submit" class="btn btn-info">Guardar</button>
    <input type="reset" class="btn btn-danger">

</form>
@endsection