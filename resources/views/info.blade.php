@extends('main-layout')

@foreach ($datosVino as $data)

	@section('title', $data->nombre . ' - ' . $data->variedades->variedad)

	@section('content')
		<body class="bg-colorPrincipal_2 font-inconsolata ">
			<x-menu />

			<div id="principal" class="pb-3">
				<x-header />

				<div class="mx-2.5 flex flex-row justify-center rounded-xl bg-color11 p-3">
					<aside class="w-[50%]">
						<img src="{{ $data->url_imagen }}" alt="{{ $data->nombre . '-' . $data->variedades->variedad }}"
							class="mx-auto mt-3 h-auto w-[90%] ">
					</aside>
					<main
						class="ml-2.5 flex w-[50%] flex-col gap-2.5 rounded-br-[10px] rounded-tr-[10px] border-l border-l-colorPrincipal_1 bg-[#7f1a77] pb-2 pl-2 pt-0 font-poppins text-[20px]">
						<div class="pl-2">
							<span class="font-bold">Nombre: </span>
							<span class="font-medium">{{ $data->nombre }}</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Cepa: </span>
							<span class="font-medium">{{ $data->variedades->variedad }}</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Bodega: </span>
							<span class="font-medium">{{ $data->bodega }}</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Añada: </span>
							<span class="font-medium">{{ $data->anada }}</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Precio: </span>
							<span class="font-medium">${{ $data->precio }} COP</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Descripción: </span>
							<span class="font-medium">{{ $data->descripcion }}</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Notas de cata: </span>
							<span class="font-medium">{{ $data->notas_cata }}</span>
						</div>
						<div class="pl-2">
							<span class="font-bold">Maridaje: </span>
							<span class="font-medium">{{ $data->maridaje }}</span>
						</div>
					</main>
				</div>
			</div>
		</body>
    @endsection
@endforeach
