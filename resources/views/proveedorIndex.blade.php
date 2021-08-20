@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')

  @if (session('mensaje'))
     <div class="alert alert-success">
       {{ session('mensaje')}}
     </div>
   @endif  
   <form action="proveedor" method="GET">
     @csrf
        <input type="text" name="filtro" class="form-control form-control-user" 
        placeholder="ingrese lo buscado" value="{{$texto}}">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        <a href="proveedor" class="btn btn-outline-info">Limpiar</a>
    </form>

   <h1>Mercadito "El Popular"</h1>
   <h3>Proveedores</h3>
   <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nombre del Proveedor</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Nombre del contacto del proveedor</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

    </tr>
  </thead>
  <tbody>
      @forelse($proveedors as $proveedor)
      
        <tr>
          <td scope="row"> {{ $proveedor->nombre_proveedor }}</td>
             <td> {{ $proveedor->correo}} </td>
             <td> {{ $proveedor->telefono}} </td>
             <td> {{ $proveedor->nombre_contacto_proveedor}} </td>
             <td><a class="btn btn-info" href=" {{ route('proveedor.mostrar', ['id' => $proveedor->id])}}">Ver</a></td>
            <td> <a class="btn btn-warning" href=" {{ route('proveedor.edit', ['id' => $proveedor->id])}} ">Editar</a> </td>
            <td>
                <form method="post" action="{{route('proveedor.borrar', ['id' => $proveedor->id])}}">
                  @csrf
                  @method('delete')

                  <input type="submit" value="Eliminar" class="btn btn-danger">

                </form>
            </td>
        </tr>
        </tr>
      @empty
           <tr>
               <td colspan="4">No hay ningun proveedor para mostrar</td>
           </tr>

      @endforelse

  </tbody>
</table>

 {{ $proveedors->links() }}

@endsection