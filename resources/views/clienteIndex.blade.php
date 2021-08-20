@extends('layouts.app')

@section('titulo', 'Mercadito "El Popular"')

@section('content')
    
@if (session('mensaje'))
     <div class="alert alert-success">
       {{ session('mensaje')}}
     </div>
   @endif  
   <form action="cliente" method="GET">
     @csrf
        <input type="text" name="filtro" class="form-control form-control-user" 
        placeholder="ingrese lo buscado" value="{{$texto}}">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        <a href="cliente" class="btn btn-outline-info">Limpiar</a>
    </form>

   <h1>Mercadito "El Popular"</h1>
   <h3>Clientes</h3>
   <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nombre de Identidad</th>
      <th scope="col">Nombre del Cliente</th>
      <th scope="col">Telefono</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

    </tr>
  </thead>
  <tbody>
      @forelse($clientes as $cliente)
      
        <tr>
             <th scope="row"> {{ $cliente->numeroIdentidad}} </th>
             <td> {{ $cliente->nombre }}</td>
             <td> {{ $cliente->telefono}} </td>
             <td><a class="btn btn-info" href=" {{ route('cliente.mostrar', ['id' => $cliente->id])}}">Ver</a></td>
            <td> <a class="btn btn-warning" href=" {{ route('cliente.edit', ['id' => $cliente->id])}} ">Editar</a> </td>
            <td>
                <form method="post" action="{{route('cliente.borrar', ['id' => $cliente->id])}}">
                  @csrf
                  @method('delete')

                  <input type="submit" value="Eliminar" class="btn btn-danger">

                </form>
            </td>
        </tr>
        </tr>
      @empty
           <tr>
               <td colspan="4">No hay ningun cliente para mostrar</td>
           </tr>

      @endforelse

  </tbody>
</table>

 {{ $clientes->links() }}
 

@endsection