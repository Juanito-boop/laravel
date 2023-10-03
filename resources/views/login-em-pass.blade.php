@extends('form-layout')

@section('title', 'Login email password')

@section('content')

    <form class="bg-[#3d3d3d] shadow-[#141313] w-[300px] absolute -translate-x-2/4 -translate-y-2/4 text-center p-10 rounded-[10px] left-2/4 top-2/4 justify-center" id="loginForm" method="POST" action="{{ route('login-em-pass') }}">
        <span class="text-white uppercase font-medium text-[20px]">Inicio de sesion correo y clave</span>
        <!--Campo para ingresar el correo-->
        <label for="email-data"></label>
        <div class="flex justify-center my-4">
            <input type="text" id="email" name="email-data" class="text-white block text-center transition-[0.25s] w-[200px] mx-auto rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] focus:border-[#2ecc71] focus:w-[280px]" placeholder="Email" required>
        </div>
        <!--Campo para ingresar la contraseña-->
        <label for="pass-data"></label>
        <div class="flex justify-center my-4">
            <input type="password" id="password" name="pass-data" class="text-white block text-center transition-[0.25s] w-[200px] mx-auto rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] focus:border-[#2ecc71] focus:w-[280px]" placeholder="Password" required>
        </div>
        <!--Botón para enviar los datos-->
        <button type="submit" class="text-[white] cursor-pointer block text-center transition-[0.25s] mx-auto px-10 py-1 rounded-3xl border-2 border-solid border-[#2ecc71] hover:bg-[#2ecc71] uppercase">Login</button>
        <!--Enlace para redirigir al usuario a la página de re  gistro si no tiene una cuenta-->
        <div class="flex flex-col p-2">
            <span>
                <a class="text-[#ffa500]" href={{ route('register') }}>¿No tienes una cuenta? Regístrate aquí</a>
            </span>
            <a class="text-[#2ecc71] mt-2.5 " href={{ route('home') }}>
                <em class="fas fa-home"></em>
            </a>
        </div>
    </form>

    <!-- Agregar la referencia a jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Obtén el token CSRF del meta-tag en el encabezado de la página
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#loginForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '/auth/em-pass',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data, textStatus, xhr) {
                    if (xhr.status === 200) {
                        // Redirigir a /home en caso de éxito (código 200)
                        window.location.href = '/home';
                    } else {
                        // Mostrar mensaje de error según la respuesta
                        console.error('Authentication failed:', data.error);
                    }
                },
                error: function(xhr, textStatus, error) {
                    console.error('AJAX request failed:', error);
                }
            });
        });
    </script>

@endsection
