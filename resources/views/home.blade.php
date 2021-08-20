@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenidos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Puede ingresar a la sección que necesite de las 
                        que se encuentran en la parte superior de la barra de navegación!') }}
                        <br>
                    {{ __('Disfrute su visita en nuestro sitio :3') }}
                        <br> <br>
                    {{ __('Lo abrazariamos pero chivas con el covid XD') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
