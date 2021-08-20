@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Editar Proveedor</h1>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
             @endforeach
          </ul>
        </div>
      @endif

      <form action="{{route('proveedor.update', ['id' => $proveedor->id])}}" method="POST">
          @method('put')
          @csrf
          <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control form-control-user" name="nombreP" id="nombreP" 
              placeholder="Ingrese el nombre" value="{{$proveedor->nombre_proveedor}}">
          </div>
          <div class="form-group">
              <label for="correoP">Correo</label>
              <input type="text" class="form-control form-control-user" name="correoP" id="correoP" 
              placeholder="ingrese su correo" value="{{$proveedor->correo}}">
          </div>
          <div class="form-group">
              <label for="telefono">telefono</label>
              <input type="text" class="form-control form-control-user" name="telefono" id="telefono" 
              placeholder="ingrese un numero telefonico" value="{{$proveedor->telefono}}">
          </div>
          <div class="form-group">
              <label for="nombreCP">Nombre del Contacto del Proveedor</label>
              <input type="text" class="form-control form-control-user" name="nombreCP" id="nombreCP" 
              placeholder="De viernes a domingo" value="{{$proveedor->nombre_contacto_proveedor}}">
          <br>
          <button type="submit" class="btn btn-info">Guardar</button>
          <input type="reset" class="btn btn-danger">

      </form>
@endsection