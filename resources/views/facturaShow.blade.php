@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Informacion de la Factura</h1>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"> Cliente </th>
            <td> {{ $factura->cliente->nombre }} </td>
        </tr>
        <tr>
            <th scope="row"> Fecha de Venta </th>
            <td> {{ $factura->fecha_venta }} </td>
        </tr>
        <tr>
            <th scope="row"> Producto </th>
            <td> {{ $factura->producto->nombreP }} </td>
        </tr>
        <tr>
            <th scope="row"> Precio de Venta del Producto</th>
            <td> {{ $factura->producto->precio_venta }} </td>
        </tr>


        </tbody>
    </table>

@endsection