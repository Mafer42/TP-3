@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

@if (session('mensaje'))
     <div class="alert alert-success">
       {{ session('mensaje')}}
     </div>
   @endif  

   <h1>Mercadito "El Popular"</h1>
   <h3>Facturas</h3>
   <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Fecha de Venta</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio de Venta</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    
    </tr>
  </thead>
  <tbody>
      @forelse($facturas as $factura)
      
        <tr>
          <th scope="row"> {{ $factura->cliente->nombre }}</th>
             <td> {{ $factura->fecha_venta}} </td>
             <td> {{ $factura->producto->nombreP}} </td>
             <td> {{ $factura->producto->precio_venta}} </td>
             <td><a class="btn btn-info" href=" {{ route('factura.mostrar', ['id' => $factura->id])}}">Ver</a></td>
            <td> <a class="btn btn-warning" href=" {{ route('factura.edit', ['id' => $factura->id])}} ">Editar</a> </td>
            <td>
                <form method="post" action="{{route('factura.borrar', ['id' => $factura->id])}}">
                  @csrf
                  @method('delete')

                  <input type="submit" value="Eliminar" class="btn btn-danger">

                </form>
            </td>
        </tr>
        </tr>
      @empty
           <tr>
               <td colspan="4">No hay ninguna factura para mostrar</td>
           </tr>

      @endforelse

  </tbody>
</table>

 {{ $facturas->links() }}
@endsection