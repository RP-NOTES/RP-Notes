<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RP Notes - Iniciar sesión</title>

    @vite('resources/css/login.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="card">
        <img src="{{ asset('img/logo.png') }}" alt="">

        <h2 class="titulo-card">Iniciar sesión</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="grupo-formulario">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>

            <div class="grupo-formulario">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
            </div>

            <button class="boton-submit" type="submit">Ingresar</button>
        </form>
    </div>
</body>

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

</html>
