@extends('layouts.app')

@section('titulo', 'Registrar nueva clase')

@section('contenido')
    <div class="contenedor-formulario">
        <h1>Registrar nueva clase</h1>

        <form action="{{ route('clases.store') }}" method="POST">
            @csrf

            <div class="contenedor-grupos-formulario">
                <div class="grupo-formulario">
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre">
                </div>
            </div>

            <button type="submit" class="btn-submit">Registrar</button>
        </form>
    </div>

    <a style="margin-top: 3rem" href="{{ route('inicio') }}" class="btn-regresar">
        Regresar <i class="fa-solid fa-arrow-left"></i>
    </a>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Se produjeron algunos errores:',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                });
            });
        </script>
    @endif
@endsection
