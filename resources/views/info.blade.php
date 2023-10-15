@extends('main-layout')

@section('title', $datosVino[0]['nombre'] . ' - ' . $datosVino[0]['variedades']['variedad'])

@section('content')

  <body class="bg-colorPrincipal_2 font-inconsolata h-[100hv]">
    <x-menu />
      @foreach ($datosVino as $data)
      <div id="principal" class="pb-3">
          <x-header />
          <div class="flex flex-row bg-color11 p-3 rounded-xl mx-2.5 justify-center">
            <aside class="w-[50%]">
              <img src="{{ $data['url_imagen'] }}" alt="{{ $data['nombre'] . '-' . $data['variedades']['variedad'] }}"
                class="mx-auto w-[90%] h-auto mt-3">
            </aside>
            <main
              class="w-[50%] bg-[#7f1a77] ml-2.5 rounded-tr-[10px] rounded-br-[10px] pl-2 pt-0 pb-2 border-l border-l-colorPrincipal_1 text-[20px] font-poppins flex flex-col gap-2.5">
              <div class="pl-2">
                <span class="font-bold">Nombre: </span>
                <span class="font-medium">{{ $data['nombre'] }}</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Cepa: </span>
                <span class="font-medium">{{ $data['variedades']['variedad'] }}</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Bodega: </span>
                <span class="font-medium">{{ $data['bodega'] }}</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Añada: </span>
                <span class="font-medium">{{ $data['anada'] }}</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Precio: </span>
                <span class="font-medium">${{ $data['precio'] }} COP</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Descripción: </span>
                <span class="font-medium">{{ $data['descripcion'] }}</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Notas de cata: </span>
                <span class="font-medium">{{ $data['notas_cata'] }}</span>
              </div>
              <div class="pl-2">
                <span class="font-bold">Maridaje: </span>
                <span class="font-medium">{{ $data['maridaje'] }}</span>
              </div>
            </main>
          </div>
      </div>
    @endforeach
  @endsection
