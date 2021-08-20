@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Editar Producto</h1>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
             @endforeach
          </ul>
        </div>
      @endif

      <form action="{{route('producto.update', ['id' => $producto->id])}}" method="post">
          @method('put')
          @csrf
          <div class="form-group">
              <label for="nombreP">Nombre del Producto</label>
              <input type="text" class="form-control form-control-user" name="nombreP" id="nombreP" 
              placeholder="Ingrese el nombre del producto" value="{{$producto->nombreP}}">
          </div>
          <div class="form-group">
              <label for="categoria">Categoria</label>
              <input type="text" class="form-control form-control-user" name="categoriaP" id="categoriaP" 
              placeholder="categoria del producto" value="{{$producto->categoria}}">
          </div>
          <div class="form-group">
              <label for="precioC">Precio de Compra</label>
              <input type="text" class="form-control form-control-user" name="precioC" id="precioC" 
              placeholder="ingrese el precio de compra" value="{{$producto->precio_compra}}">
          </div>
          <div class="form-group">
              <label for="precioV">Precio de Venta</label>
              <input type="text" class="form-control form-control-user" name="precioV" id="precioV" 
              placeholder="Ingrese el precio de venta" value="{{$producto->precio_venta}}">
          </div>    
          <div class="form-group">
              <label for="proveedor">Proveedor</label>
              <input type="text" class="form-control form-control-user" name="proveedor" id="proveedor" 
              placeholder="Ingrese el nombre del proveedor" value="{{$producto->proveedor_id}}">
          </div>    
          <br>
          <button type="submit" class="btn btn-info">Guardar</button>
          <input type="reset" class="btn btn-danger">

      </form>
@endsection