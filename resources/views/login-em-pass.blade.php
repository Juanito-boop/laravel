@extends('form-layout')

@section('title', 'Login email password')

@section('content')

  <form
    class="absolute left-2/4 top-2/4 w-[300px] -translate-x-2/4 -translate-y-2/4 justify-center rounded-[10px] bg-[#3d3d3d] p-10 text-center shadow-[#141313]"
    id="loginForm" method="POST" action="{{ route('login-em-pass') }}">
    <span class="text-[20px] font-medium uppercase text-white">Inicio de sesion correo y clave</span>
    <!--Campo para ingresar el correo-->
    <label for="email-data"></label>
    <div class="my-4 flex justify-center">
      <input type="text" id="email" name="email-data"
        class="mx-auto block w-[200px] rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] text-center text-white transition-[0.25s] focus:w-[280px] focus:border-[#2ecc71]"
        placeholder="Email" required>
    </div>
    <!--Campo para ingresar la contraseña-->
    <label for="pass-data"></label>
    <div class="my-4 flex justify-center">
      <input type="password" id="password" name="pass-data"
        class="mx-auto block w-[200px] rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] text-center text-white transition-[0.25s] focus:w-[280px] focus:border-[#2ecc71]"
        placeholder="Password" required>
    </div>
    <!--Botón para enviar los datos-->
    <button type="submit"
      class="mx-auto block cursor-pointer rounded-3xl border-2 border-solid border-[#2ecc71] px-10 py-1 text-center uppercase text-[white] transition-[0.25s] hover:bg-[#2ecc71]">Login</button>
    <!--Enlace para redirigir al usuario a la página de re  gistro si no tiene una cuenta-->
    <div class="flex flex-col p-2">
      <span>
        <a class="text-[#ffa500]" href={{ route('register') }}>¿No tienes una cuenta? Regístrate aquí</a>
      </span>
      <a class="mt-2.5 text-[#2ecc71]" href={{ route('home') }}>
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
