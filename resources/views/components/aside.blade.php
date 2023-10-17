<aside class="min-w-[15%] whitespace-nowrap rounded-xl bg-color11 px-2">
	<span
		class="ml-2.5 mr-2.5 mt-2.5 flex items-center justify-center border-b border-b-colorPrincipal_1 font-poppins text-[2em] font-bold leading-[48px] text-colorPrincipal_1">
		FILTROS
	</span>
	<div class="border-b border-solid border-b-color12 bg-color11 p-2.5">
		{!! $opciones->generarOpcionesVariedad() !!}
	</div>
	<div class="border-b border-solid border-b-color12 bg-color11 p-2.5">
		{!! $opciones->generarOpcionesPais() !!}
	</div>
</aside>
