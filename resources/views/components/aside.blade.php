<aside class="min-w-[15%] px-2 bg-color11 rounded-xl whitespace-nowrap">
    <span class="text-[2em] text-colorPrincipal_1 flex mt-2.5 ml-2.5 mr-2.5 font-poppins justify-center items-center border-b-colorPrincipal_1 border-b  font-bold leading-[48px]">
        FILTROS
    </span>
    <div class="bg-color11 p-2.5 border-b-color12 border-b border-solid">
        {!! $opciones->generarOpcionesVariedad() !!}
    </div>
    <div class="bg-color11 p-2.5 border-b-color12 border-b border-solid">
        {!! $opciones->generarOpcionesPais() !!}
    </div>
</aside>
