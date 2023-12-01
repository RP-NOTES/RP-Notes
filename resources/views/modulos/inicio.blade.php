@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <div class="barra-navegacion-inicio">
        <h1>Clases disponibles</h1>
        <a class="btn-agregar">Canjear código <i class="fa-solid fa-hashtag"></i></a>
        <a class="btn-agregar" href="{{ route('clases.create') }}">Crear nueva clase <i class="fa-solid fa-plus"></i></a>
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
        <p>Aún no tienes clases agregadas, porfavor canjea el código o crea una nueva clase</p>
    @endif

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
