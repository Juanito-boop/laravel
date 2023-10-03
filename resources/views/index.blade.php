@extends('main-layout')

@section('title', 'Vinos de la Villa Wine Bar')

@section('content')

  <body class="bg-colorPrincipal_2 font-inconsolata z-0">
    <x-menu />
    {{-- componente header --}}
    <x-header />
    <section class="flex mx-2.5 my-0">

      {{-- componente aside --}}
      @component('components.aside', ['opciones' => $opciones])
      @endcomponent
      <main class="max-w-[84%] mx-[10px] rounded-[10px] bg-color11 scroll-none">
        {{-- componente slider --}}
        <x-slider />
        {{-- tarjetas --}}
        @component('components.tarjetas', ['vista' => $vista])
        @endcomponent
      </main>
    </section>
    {{-- componente testimonials --}}
    <x-testimonials />
    {{-- componente footer --}}
    <x-footer />
  </body>

@endsection
