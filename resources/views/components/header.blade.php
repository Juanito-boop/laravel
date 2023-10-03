<header class="px-20 w-full bg-violet-400 z-[10] mb-3">
  <div class="flex justify-between items-center mb-[10px]">
    <a href="{{ route('home') }}">
      <img class="h-[120px] w-[120px]"
        src="https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/some/image-removebg-preview.svg"
        alt="">
    </a>
    <div class="inline-flex flex-col items-center justify-center w-auto h-auto">
      <div class="text-center texto-Black text-[40px] font-extrabold">LOS VINOS</div>
      <div class="text-2xl font-extrabold text-center texto-Black">Wine Bar</div>
      <div class="text-2xl font-extrabold text-center texto-Black">Villa de Leyva, Carrera 9 #11-47 Segundo piso</div>
      <div
        class="self-stretch h-[26px] pl-[114.38px] pr-[113.98px] justify-center items-center gap-[0.64px] inline-flex">
        <div class="text-lg font-bold text-center texto-Black">CONTACTANOS (+57) 3219085857
            <em class="fas fa-phone"></em></div>
      </div>
    </div>
    <div class="relative mx-[50px] my-10 z-[100]" id="boton-menu">
      <img src="https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/some/bars-solid.svg"
        id="icono-menu" alt="" class="w-10 align-top cursor-pointer">
    </div>
    {{-- <x-menu /> --}}
    <!-- Add cart button here -->
  </div>
  <form class="w-full h-[41px] pl-[61.98px] pr-[20.69px] justify-between items-center gap-[41.33px] inline-flex"
    id="myForm" action="" method="POST">
    <div class="w-full flex justify-around items-center mt-[10px] mb-[10px]">
      <label for="query"></label>
      <input type="search" id="query" name="query"
        class="block w-full px-4 py-2 border-color11 rounded-full w-90p border-3"
        placeholder="What product are you looking for?">
      <i class="fa-solid fa-magnifying-glass text-white ml-[8px]" id="lupa"></i>
    </div>
  </form>
</header>

<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
  integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggleMenuButton = document.getElementById("toggle-menu-button");
    const menu = document.getElementById("menu");

    toggleMenuButton.addEventListener("click", function () {
      // Cambiar las clases de Tailwind para mostrar u ocultar el menú
      menu.classList.toggle("opacity-100");
      menu.classList.toggle("translate-x-0");
      menu.classList.toggle("translate-x-[-100%]");
    });
  });
</script>

