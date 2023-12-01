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
