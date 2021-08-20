@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Informacion del Producto</h1>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Campo</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <th scope="row"> Nombre del Producto </th>
             <td> {{ $producto->nombreP }} </td>
        </tr>
        <tr>
          <th scope="row"> Categoria </th>
             <td> {{ $producto->categoria }} </td>
        </tr>
        <tr>
          <th scope="row"> Precio de Compra </th>
             <td> {{ $producto->precio_compra }} </td>
        </tr>
        <tr>
          <th scope="row"> Precio de Venta </th>
             <td> {{ $producto->precio_venta }} </td>
        </tr>
        <tr>
          <th scope="row"> Proveedor </th>
             <td> {{ $producto->proveedor->nombre_proveedor }} </td>
        </tr>

  </tbody>
</table>

@endsection