@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')
    
<h1>Nuevo Cliente</h1>

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
            <label for="numeroIdentidad">Ingrese el numero de identidad </label>
            <input type="text" class="form-control form-control-user" name="numeroIC" id="numeroIC"
                   placeholder="Ingrese el numero de identidad del cliente">
        </div>

        <div class="form-group">
            <label for="nombre">Ingrese nombre completo</label>
            <input type="text" class="form-control form-control-user" name="nombreC" id="nombreC"
                   placeholder="Ingrese nombre completo del cliente">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control form-control-user" name="telefonoC" id="telefonoC"
                   placeholder="Telefono">
        </div>

        <br>
        <button type="submit" class="btn btn-info">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>

@endsection