id = document.getElementById("boton-menu");
menu = document.getElementById("menu");
principal = document.getElementById("principal");
cerrar_menu = document.getElementById("cerrar-menu");
id.addEventListener("click", () => {
    menu.classList.toggle("fixed");
    principal.classList.toggle("fixed");
});
cerrar_menu.addEventListener("click", () => {
    menu.classList.toggle("fixed");
    principal.classList.toggle("fixed");
});
