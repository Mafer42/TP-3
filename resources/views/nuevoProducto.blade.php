@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Nuevo Producto</h1>

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
              <label for="nombreP">Nombre del Producto</label>
              <input type="text" class="form-control form-control-user" name="nombreP" id="nombreP" 
              placeholder="Ingrese el nombre del producto">
          </div>
          <div class="form-group">
              <label for="categoria">Categoria</label>
              <input type="text" class="form-control form-control-user" name="categoriaP" id="categoriaP" 
              placeholder="categoria del producto">
          </div>
          <div class="form-group">
              <label for="precio_compra">Precio de Compra</label>
              <input type="text" class="form-control form-control-user" name="precioC" id="precioC" 
              placeholder="ingrese el precio de compra">
          </div>
          <div class="form-group">
              <label for="precio_venta">Precio de Venta</label>
              <input type="text" class="form-control form-control-user" name="precioV" id="precioV" 
              placeholder="Ingrese el precio de venta">
          </div>    
          <div class="form-group">
              <label for="proveedor_id">Proveedor</label>
              <input type="text" class="form-control form-control-user" name="proveedor" id="proveedor" 
              placeholder="Ingrese un id de proveedor">
          </div>    
          <br>
          <button type="submit" class="btn btn-info">Guardar</button>
          <input type="reset" class="btn btn-danger">

      </form>
@endsection