@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

  @if (session('mensaje'))
     <div class="alert alert-success">
       {{ session('mensaje')}}
     </div>
   @endif  

   <h1>Mercadito "El Popular"</h1>
   <h3>Productos</h3>
   <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nombre del Producto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio de Compra</th>
      <th scope="col">Precio de Venta</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

    </tr>
  </thead>
  <tbody>
      @forelse($productos as $producto)
      
        <tr>
          <th scope="row"> {{ $producto->nombreP }}</th>
             <td> {{ $producto->categoria}} </td>
             <td> {{ $producto->precio_compra}} </td>
             <td> {{ $producto->precio_venta}} </td>
             <td> {{ $producto->proveedor->nombre_proveedor}} </td>
             <td><a class="btn btn-info" href=" {{ route('producto.mostrar', ['id' => $producto->id])}}">Ver</a></td>
            <td> <a class="btn btn-warning" href=" {{ route('producto.edit', ['id' => $producto->id])}} ">Editar</a> </td>
            <td>
                <form method="post" action="{{route('producto.borrar', ['id' => $producto->id])}}">
                  @csrf
                  @method('delete')

                  <input type="submit" value="Eliminar" class="btn btn-danger">

                </form>
            </td>
        </tr>
        </tr>
      @empty
           <tr>
               <td colspan="4">No hay ningun producto para mostrar</td>
           </tr>

      @endforelse

  </tbody>
</table>

 {{ $productos->links() }}

@endsection