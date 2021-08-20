@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

<h1>Informacion del Proveedor</h1>

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
             <td> {{ $proveedor->nombre_proveedor }} </td>
        </tr>
        <tr>
          <th scope="row"> Nombre del Contacto </th>
             <td> {{ $proveedor->correo }} </td>
        </tr>
        <tr>
          <th scope="row"> Telefono </th>
             <td> {{ $proveedor->telefono }} </td>
        </tr>
        <tr>
          <th scope="row"> Dia de Entrega </th>
             <td> {{ $proveedor->nombre_contacto_proveedor }} </td>
        </tr>

  </tbody>
</table>

@endsection