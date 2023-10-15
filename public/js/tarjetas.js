// Obtén el número total de contenedores
const numContenedores=document.querySelectorAll(".cont").length;

// Itera a través de los contenedores y sus botones
for (let i = 1; i <= numContenedores; i++) {
    const container = document.getElementById(`container${i}`);
    const prevBtn = document.getElementById(`prev-btn${i}`);
    const nextBtn = document.getElementById(`next-btn${i}`);

    // Obtenemos el número de tarjetas en el contenedor
    const numTarjetas = container.querySelectorAll(".group").length;

    // Obtenemos la posición actual de la tarjeta
    let posicionActual = 0;

    // Evento para el botón izquierdo
    prevBtn.addEventListener("click",() => {
        // Si estamos en la primera tarjeta, no hacemos nada
        if (posicionActual === 0) {
            return;
        }

        // Desplazamos el contenedor a la tarjeta anterior
        container.scrollLeft-=container.scrollWidth;
        posicionActual--;
    });

    // Evento para el botón derecho
    nextBtn.addEventListener("click",() => {
        // Si estamos en la última tarjeta, no hacemos nada
        if (posicionActual===numTarjetas-1) {
            return;
        }

        // Desplazamos el contenedor a la siguiente tarjeta
        container.scrollLeft+=container.scrollWidth;
        posicionActual++;
    });
}
