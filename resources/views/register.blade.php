@extends('form-layout')

@section('title', 'Registro nuevo usuario')

@section('content')

  <form
    class="absolute left-2/4 top-2/4 w-[300px] -translate-x-2/4 -translate-y-2/4 justify-center rounded-[10px] bg-[#3d3d3d] p-10 text-center shadow-[#141313]"
    action="{{ route('register-data') }}" method="post">

    <!-- Agregamos un encabezado con el título "Registro de Usuario". -->
    <span class="text-[20px] font-medium uppercase text-white">
      Registro de Usuario
    </span>
    <!-- Agregamos campos de entrada de texto para el correo electrónico y clave del usuario. Estos campos son requeridos. -->
    <div class="my-4 flex justify-center">
      <input type="email" id="email" name="email" placeholder="Email"
        class="mx-auto block w-[200px] rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] text-center text-white transition-[0.25s] focus:w-[280px] focus:border-[#2ecc71]"
        required>
    </div>
    <div class="my-4 flex justify-center">
      <input type="password" id="clave" name="clave" placeholder="Password"
        class="mx-auto block w-[200px] rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] text-center text-white transition-[0.25s] focus:w-[280px] focus:border-[#2ecc71]"
        required>
    </div>
    <!-- Agregamos un botón para enviar el formulario con el texto "Crear usuario". -->
    <button type="submit"
      class="mx-auto block cursor-pointer rounded-3xl border-2 border-solid border-[#2ecc71] px-10 py-1 text-center uppercase text-[white] transition-[0.25s] hover:bg-[#2ecc71]">Register</button>
    <div class="flex flex-col p-2">
      <span>
        <a class="text-[#ffa500]" href={{ route('register') }}>¿Ya tienes una cuenta? Inicia Sesion</a>
      </span>
      <a class="mt-2.5 text-[#2ecc71]" href={{ route('home') }}>
        <em class="fas fa-home"></em>
      </a>
    </div>
  </form>

@endsection
