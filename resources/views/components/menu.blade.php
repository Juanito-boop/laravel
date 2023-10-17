<div id="menu"
	class="fixed top-[100%] z-[90] flex h-screen w-screen items-center justify-center bg-[rgb(42,42,42)] text-[40px] tracking-[1px] text-white">
	<ul class="pt-auto flex w-[80%] flex-col gap-3">
		<li
			class="px-auto block cursor-pointer rounded-xl border border-[rgb(228,228,228)] py-[20px] text-[25px] text-[white] hover:bg-[rgb(228,228,228)] hover:text-[rgb(42,42,42)]">
			<button class="w-full">
				<a href="{{ route('login-em-pass') }}" class="no-underline hover:no-underline"> login email password </a>
			</button>
		</li>
		<li
			class="px-auto block cursor-pointer rounded-xl border border-[rgb(228,228,228)] py-[20px] text-[25px] text-[white] hover:bg-[rgb(228,228,228)] hover:text-[rgb(42,42,42)]">
			<button class="w-full">
				<a href="{{ route('login-magic') }}" class="no-underline hover:no-underline"> login magic link </a>
			</button>
		</li>
		<li
			class="px-auto block cursor-pointer rounded-xl border border-[rgb(228,228,228)] py-[20px] text-[25px] text-[white] hover:bg-[rgb(228,228,228)] hover:text-[rgb(42,42,42)]"
			id="cerrar-menu">
			<button class="w-full">
				<a href="" class="no-underline hover:no-underline"> cerrar menu </a>
			</button>
		</li>
	</ul>
</div>
