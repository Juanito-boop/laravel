@extends('main-layout')

@section('title', $datosVino[0]['nombre'] . ' - ' . $datosVino[0]['variedades']['variedad'])

@section('content')
    <body class="bg-colorPrincipal_2 font-inconsolata">
    <x-header />
    @foreach($datosVino as $data)
        <div class="flex flex-row">
            <aside class="w-[50%] mr-2.5">
                <img
                    src="{{ $data['url_imagen'] }}"
                    alt="{{ $data['nombre']. '-'. $data['variedades']['variedad'] }}"
                    class="ml-auto mr-auto"
                    style="width: 70%; height: auto;"
                >
            </aside>
            <main class="w-[45%] bg-[#7f1a77] ml-2.5 rounded-[10px] pl-2 pt-0 pb-2">
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Nombre: </span>
                    <span class="text-[20px]">{{ $data['nombre'] }}</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Cepa: </span>
                    <span class="text-[20px]">{{ $data['variedades']['variedad'] }}</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Bodega: </span>
                    <span class="text-[20px]">{{ $data['bodega'] }}</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Añada: </span>
                    <span class="text-[20px]">{{ $data['anada'] }}</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Precio: </span>
                    <span class="text-[20px]">${{ $data['precio'] }} COP</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Descripción: </span>
                    <span class="text-[20px] w-[70%]">{{ $data['descripcion'] }}</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Notas de cata: </span>
                    <span class="text-[20px] w-[70%]">{{ $data['notas_cata'] }}</span>
                </div>
                <div class="pt-1">
                    <span class="font-bold font-poppins text-[20px]">Maridaje: </span>
                    <span class="text-[20px] w-[70%]">{{ $data['maridaje'] }}</span>
                </div>
            </main>
        </div>
    @endforeach
@endsection
