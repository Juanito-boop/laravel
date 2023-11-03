@extends('main-layout')

@section('title', 'Vinos de la Villa Wine Bar')

@section('content')

  <body class="bg-colorPrincipal_2 font-inconsolata">
    {{-- componente header --}}
    <x-menu />
    <div id="principal">
      <x-header />
      {{-- componente banner --}}
      <section class="mx-2.5 my-0 flex">
        {{-- componente aside --}}
        @component('components.aside', ['opciones' => $opciones])
        @endcomponent
        <main class="scroll-none mx-[10px] max-w-[84%] rounded-[10px] bg-color11">
          {{-- tarjetas --}}
          @component('components.tarjetas', ['vista' => $vista])
          @endcomponent
        </main>
      </section>
      {{-- componente testimonials --}}
      <x-testimonials />
      {{-- componente footer --}}
      <x-footer />
    </div>
  </body>
  <script src="https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/js/tarjetas.js"></script>

@endsection
