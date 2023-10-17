@extends('form-layout')

@section('title', 'Login magic link')

@section('content')

  <form
    class="absolute left-2/4 top-2/4 w-[300px] -translate-x-2/4 -translate-y-2/4 justify-center rounded-[10px] bg-[#3d3d3d] p-10 text-center shadow-[#141313]"
    style="display: block;" action="{{ route('magic-link-data') }}" method="POST">
    @csrf
    <span class="text-[20px] font-medium uppercase text-white">Inicio de sesion con magic link</span>
    <!--Campo para ingresar el correo-->
    <div class="my-4 flex justify-center">
      <input
        class="mx-auto block w-[200px] rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] text-center text-white transition-[0.25s] focus:w-[280px] focus:border-[#2ecc71]"
        type="text" id="email" name="email" placeholder="Email" required>
    </div>
    <!--Botón para enviar los datos-->
    <button type="submit"
      class="mx-auto block cursor-pointer rounded-3xl border-2 border-solid border-[#2ecc71] px-10 py-1 text-center uppercase text-[white] transition-[0.25s] hover:bg-[#2ecc71]">Login</button>
    <!--Enlace para redirigir al usuario a la página de registro si no tiene una cuenta-->
    <div class="flex flex-col p-2">
      <span>
        <a class="text-[#ffa500]" href={{ route('register') }}>¿No tienes una cuenta? Regístrate aquí</a>
      </span>
      <a class="mt-2.5 text-[#2ecc71]" href={{ route('home') }}>
        <em class="fas fa-home"></em>
      </a>
    </div>
  </form>

@endsection
