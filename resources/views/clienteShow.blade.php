@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

    <h1>Informacion del Cliente</h1>
    
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"> Nombre </th>
            <td> {{ $cliente->numeroIdentidad }} </td>
        </tr>
        <tr>
            <th scope="row"> Nombre del Contacto </th>
            <td> {{ $cliente->nombre }} </td>
        </tr>
        <tr>
            <th scope="row"> Telefono </th>
            <td> {{ $cliente->telefono }} </td>
        </tr>


        </tbody>
    </table>

@endsection