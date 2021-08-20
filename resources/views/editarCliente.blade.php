@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')
    
<h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('cliente.update', ['id' => $cliente->id])}}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="nombre">Numero de Identidad</label>
            <input type="text" class="form-control" name="numeroIC" id="numeroIC"
                   placeholder="Numero de Identidad" value="{{$cliente->numeroIdentidad}}">

        </div>
        <div class="form-group">
            <label for="nombre">Nombre del CLiente</label>
            <input type="text" class="form-control" name="nombreC" id="nombreC"
                   placeholder= "Nombre del CLiente"
                   value="{{$cliente->nombre}}">
        </div>
        <div class="form-group">
            <label for="telefono">telefono</label>
            <input type="text" class="form-control form-control-user" name="telefonoC" id="telefonoC"
                   placeholder="ingrese el numero telefonico" value="{{$cliente->telefono}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Guardar</button>
            <input type="reset" class="btn btn-danger">

        </div>
    </form>

@endsection