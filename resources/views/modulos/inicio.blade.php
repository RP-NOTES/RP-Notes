@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <div class="barra-navegacion-inicio">
        <h1>Clases disponibles</h1>

        <div class="contenedor-botones">
            <a class="btn-agregar" href="{{ route('canjearCodigo') }}">Canjear código <i class="fa-solid fa-hashtag"></i></a>
            <a class="btn-agregar" href="{{ route('clases.create') }}">Crear nueva clase <i class="fa-solid fa-plus"></i></a>
        </div>
    </div>

    @if (count($inscripciones) > 0)
        <div class="contenedor-clases">
            @foreach ($inscripciones as $inscripcion)
                <a class="card-clase" href="{{ url('clases/' . $inscripcion->clase->id) }}">
                    <h2 class="card-titulo">{{ $inscripcion->clase->nombre }}</h2>
                    <h3 class="card-nombre-usuario">{{ $inscripcion->clase->usuario->name }}</h3>
                </a>
            @endforeach
        </div>
    @else
        <p style="margin-top: 30px">Aún no tienes clases agregadas, porfavor canjea el código o crea una nueva clase</p>
    @endif

    <a class="logout-icon" href="{{ route('logout') }}">
        <i class="fa-solid fa-right-from-bracket"></i>
    </a>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: `{{ session('success') }}`,
                });
            });
        </script>
    @endif
@endsection
