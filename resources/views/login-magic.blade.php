@extends('form-layout')

@section('title', 'Login magic link')

@section('content')

    <form class="bg-[#3d3d3d] shadow-[#141313] w-[300px] absolute -translate-x-2/4 -translate-y-2/4 text-center p-10 rounded-[10px] left-2/4 top-2/4 justify-center" style="display: block;" action="{{ route('magic-link-data') }}" method="POST">
        @csrf
        <span class="text-white uppercase font-medium text-[20px]">Inicio de sesion con magic link</span>
        <!--Campo para ingresar el correo-->
        <div class="flex justify-center my-4">
            <input class="text-white block text-center transition-[0.25s] w-[200px] mx-auto rounded-3xl border-2 border-solid border-[#3498db] bg-[#3d3d3d] focus:border-[#2ecc71] focus:w-[280px]" type="text" id="email" name="email" placeholder="Email" required>
        </div>
        <!--Botón para enviar los datos-->
        <button type="submit" class="text-[white] cursor-pointer block text-center transition-[0.25s] mx-auto px-10 py-1 rounded-3xl border-2 border-solid border-[#2ecc71] hover:bg-[#2ecc71] uppercase">Login</button>
        <!--Enlace para redirigir al usuario a la página de registro si no tiene una cuenta-->
        <div class="flex flex-col p-2">
            <span>
                <a class="text-[#ffa500]" href={{ route('register') }}>¿No tienes una cuenta? Regístrate aquí</a>
            </span>
            <a class="text-[#2ecc71] mt-2.5 " href={{ route('home') }}>
                <em class="fas fa-home"></em>
            </a>
        </div>
    </form>

@endsection
