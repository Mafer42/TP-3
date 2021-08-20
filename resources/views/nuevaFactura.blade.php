@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Nueva Factura</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="'cliente_id'"> Codigo del cliente </label>
        <input type="text" class="form-control form-control-user" name="clienteId" id="clienteId"
               placeholder="cliente id">
    </div>

    <div class="form-group">
        <label for="fecha_venta">Fecha de Venta</label>
        <input type="text" class="form-control form-control-user" name="fechaV" id="fechaV"
               placeholder="Y-mm-d" >
    </div>

    <div class="form-group">
        <label for="producto_id">Id del Producto</label>
        <input type="text" class="form-control form-control-user" name="productoId" id="productoId"
               placeholder= "producto Id" >
    </div>

    <div class="form-group">
        <label for="precio_venta_id">Precio de venta del Producto </label>
        <input type="text" class="form-control form-control-user" name="precioVId" id="precioVId"
               placeholder="Precio de venta del Producto " >
    </div>
    
    <br>
    <button type="submit" class="btn btn-info">Guardar</button>
    <input type="reset" class="btn btn-danger">

</form>
@endsection