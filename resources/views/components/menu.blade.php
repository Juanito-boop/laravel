<div id="menu"
  class="h-screen w-auto bg-[rgb(42,42,42)] fixed text-white flex justify-center items-center text-[40px] tracking-[1px] z-[90] left-[100] mx-[20%] dis-none">
  <ul class="pt-auto w-full flex flex-col gap-3">
    <li
      class="text-[white] block text-[25px] cursor-pointer px-[50px] py-2.5 hover:bg-[rgb(228,228,228)] hover:text-[rgb(42,42,42)] rounded-[10px]">
      <button class="w-full">
        <a href="{{ route('login-em-pass') }}" class="no-underline hover:no-underline">
          login email password
        </a>
      </button>
    </li>
    <li
      class="text-[white] block text-[25px] cursor-pointer px-[50px] py-2.5 hover:bg-[rgb(228,228,228)] hover:text-[rgb(42,42,42)] rounded-[10px]">
      <button class="w-full">
        <a href="{{ route('login-magic') }}" class="no-underline hover:no-underline">
          login magic link
        </a>
      </button>
    </li>
  </ul>
</div>
