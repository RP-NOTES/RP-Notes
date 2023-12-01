@extends('layouts.app')

@section('titulo', 'Registrar nueva clase')

@section('contenido')
    <div class="contenedor-titulo-clase">
        <p>Clase</p>
        <h1 class="titulo-clase">{{ $clase->nombre }}</h1>
    </div>

    <div class="contenedor-nueva-publicacion">
        <h2>Crear nueva publicación</h2>

        <form action="{{ url('publicaciones') }}" method="POST" class="formulario-publicacion" enctype="multipart/form-data">
            @csrf
            <div class="grupo-formulario">
                <label for="">Titulo publicación</label>
                <input type="text" name="titulo" placeholder="Ingresa el titulo...">
            </div>

            <div class="grupo-formulario">
                <label for="">Contenido publicación</label>
                <textarea placeholder="Ingresa el contenido..." name="contenido"></textarea>
            </div>

            <label for="" style="text-align: center; margin-bottom: 10px">Agregar archivos</label>
            <div class="contenedor-archivos">
                <label for="inputImage"><i class="fa-solid fa-image"></i> <span id="txtImagen"></span></label>
                <label for="inputFile"><i class="fa-solid fa-file"></i> <span id="txtFile"></span></label>
            </div>

            <input type="file" name="image" id="inputImage" accept="image/*" hidden>
            <input type="file" name="file" id="inputFile" hidden>
            <input type="number" value="{{ $clase->id }}" name="idClase" hidden>

            <button class="btn-submit" type="submit">Publicar</button>
        </form>
    </div>

    <div class="contenedor-titulo-publicaciones">
        <h2>Publicaciones</h2>
    </div>

    <div class="contenedor-publicaciones">
        @forelse ($clase->publicaciones as $publicacion)
            <div class="card-publicacion">
                <h3 class="titulo-publicacion">{{ $publicacion->titulo }}</h3>

                <p class="contenido-publicacion">{{ $publicacion->contenido }}</p>

                @if ($publicacion->nombreImagen)
                    <img src="{{ asset('images/' . $publicacion->nombreImagen) }}" alt="Imagén publicacion" />
                @endif

                @if ($publicacion->nombreArchivo)
                    <img src="{{ asset('images/' . $publicacion->nombreImagen) }}" alt="Imagén publicacion" />
                @endif

                <a class="like" href="{{ route('aumentarLikePublicacion', ['idPublicacion' => $publicacion->id, 'idClase' => $clase->id]) }}">
                    {{ $publicacion->contadorLikes }} <i class="fa-regular fa-thumbs-up"></i>
                </a>
            </div>
        @empty
        @endforelse
    </div>

    <script>
        const inputImage = document.getElementById('inputImage');
        const inputFile = document.getElementById('inputFile');

        // Agregar eventos de cambio
        inputImage.addEventListener('change', validarImagen);
        inputFile.addEventListener('change', validarArchivo);

        function validarImagen() {
            const files = inputImage.files;
            if (files.length > 0) {
                document.getElementById("txtImagen").innerHTML = files[0].name;
            } else {
                console.log('Por favor, seleccione una imagen.');
            }
        }

        function validarArchivo() {
            const files = inputFile.files;
            if (files.length > 0) {
                document.getElementById("txtFile").innerHTML = files[0].name;
            } else {
                console.log('Por favor, seleccione un archivo.');
            }
        }
    </script>

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
