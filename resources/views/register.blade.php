@extends('form-layout')

@section('title', 'Registro nuevo usuario')

@section('content')

    <form class="bg-[#3d3d3d] shadow-[#141313] w-[300px] absolute -translate-x-2/4 -translate-y-2/4 text-center p-10 rounded-[10px] left-2/4 top-2/4 justify-center" action="{{ route('register-data') }}" method="post">

        <!-- Agregamos un encabezado con el título "Registro de Usuario". -->
        <span class="text-white uppercase font-medium text-[20px]">
            Registro de Usuario
        </span>
        <!-- Agregamos campos de entrada de texto para el correo electrónico y clave del usuario. Estos campos son requeridos. -->
        <div class="flex justify-center my-4">
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Email"
                class="text-white block text-center transition-[0.25s] w-[200px] mx-auto rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] focus:border-[#2ecc71] focus:w-[280px]"
                required
            >
        </div>
        <div class="flex justify-center my-4">
            <input
                type="password"
                id="clave"
                name="clave"
                placeholder="Password"
                class="text-white block text-center transition-[0.25s] w-[200px] mx-auto rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] focus:border-[#2ecc71] focus:w-[280px]"
                required
            >
        </div>
        <!-- Agregamos un botón para enviar el formulario con el texto "Crear usuario". -->
        <button
            type="submit"
            class="text-[white] cursor-pointer block text-center transition-[0.25s] mx-auto px-10 py-1 rounded-3xl border-2 border-solid border-[#2ecc71] hover:bg-[#2ecc71] uppercase"
        >Register</button>
            <div class="flex flex-col p-2">
            <span>
                <a
                    class="text-[#ffa500]"
                    href={{ route('register') }}
                >¿Ya tienes una cuenta? Inicia Sesion</a>
            </span>
            <a class="text-[#2ecc71] mt-2.5 " href={{ route('home') }}>
                <em class="fas fa-home"></em>
            </a>
        </div>
    </form>

@endsection
