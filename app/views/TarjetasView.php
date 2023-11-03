<?php

namespace App\views;

class TarjetasView
{
    private array $productos;
    private array $secciones;

    public function __construct(array $dataGetProductos, array $dataGetSecciones)
    {
        $this->productos = $dataGetProductos;
        $this->secciones = $dataGetSecciones;
    }

    public function renderProductCardHtml(
        string $productName,
        string $productPrice,
        string $productId,
        string $productImageUrl,
        string $productVariety): string
    {
        return <<<HTML
            <div class="rounded-t-[10px] group-[transition-transform transform hover:translate-z-2 hover:scale-105 hover:shadow-xl hover:duration-hover:ease-in-out] max-w-[260px] min-w-[260px] ml-1 scroll-snap-align-start z-10">
                <img src="$productImageUrl" alt="$productName-$productVariety" class="my-2 rounded-[10px] w-[260px] h-[260px]">
                <div class="p-4 border-2 border-[#efb810] rounded-b-[10px]">
                    <span class="mb-2 text-[0.9em] font-poppins text-colorPrincipal_1 font-semibold">$productName</span>
                    <p class="mb-2 text-[0.9em] font-poppins text-colorPrincipal_1">$productVariety</p>
                    <div class="flex items-center justify-between">
                        <p class="mr-0 font-semibold font-poppins text-colorPrincipal_1 text-[0.9em]">$productPrice</p>
                        <a href="/info/$productId" class="mx-2">
                            <button class="text-emerald-500 background-transparent font-semibold uppercase py-1 outline-none focus:outline-none ease-linear transition-all duration-150 border border-emerald-500 rounded-lg text-xs">&nbspINFORMACIÓN&nbsp</button>
                        </a>
                    </div>
                </div>
            </div>
        HTML;
    }

    public function renderProductCard(object $product): string
    {
        $productName = $product->nombre;
        $productPrice = "$" . $product->precio . " COP";
        $productId = $product->id_unica;
        $productImageUrl = $product->url_imagen;
        $productVariety = $product->variedades->variedad;

        return $this->renderProductCardHtml(
            $productName,
            $productPrice,
            $productId,
            $productImageUrl,
            $productVariety
        );
    }

    public function renderSectionHtml(
        string $sectionTitle,
        int $sectionId,
        string $sectionHtml): string
    {
        return <<<HTML
            <h2 class="my-3 flex items-center justify-center font-poppins text-[2em] font-bold leading-10 text-colorPrincipal_1 uppercase">$sectionTitle</h2>
            <div class="mx-[5px] pb-[3%] items-center overflow-x-auto scrollbar-width-none -webkit-scrollbar -scroll-m-0 scroll-smooth scroll-snap-x-mandatory cont" id="container$sectionId">
                <section class="flex opera:gap-1.5 edge:gap-3.5 px-2 justify-start [&>div]:hover:backdrop:blur">
                    $sectionHtml
                </section>
            </div>
        HTML;
    }

    public function showProductCards(int $sectionId): string
    {
        $sectionHtml = '';
        foreach ($this->productos as $product) {
            if ($product->variedad === $sectionId) {
                $sectionHtml .= $this->renderProductCard($product);
            }
        }

        foreach ($this->secciones as $section) {
            if ($section->id === $sectionId) {
                return $this->renderSectionHtml(
                    $section->variedad,
                    $sectionId,
                    $sectionHtml);
            }
        }

        return ''; // Si no se encuentra ninguna sección
    }

    public function renderPaginationButtons(int $sectionId): string
    {
        return <<<HTML
            <div class="flex justify-center mb-5 bg-transparent">
                <button
                type="button"
                class="flex items-center p-2 px-4 mr-2 leading-none rounded-full bg-[#63155C]"
                id="prev-btn$sectionId"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 12l14 0"/>
                            <path d="M5 12l4 4"/>
                            <path d="M5 12l4 -4"/>
                    </svg>
                </button>
                <button
                type="button"
                class="flex items-center p-2 px-4 ml-2 leading-none rounded-full bg-[#63155C]"
                id="next-btn$sectionId"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0"/>
                        <path d="M15 16l4 -4"/>
                        <path d="M15 8l4 4"/>
                    </svg>
                </button>
            </div>
        HTML;
    }

     public function showProductCardsWithPagination(): string
    {
        $output = '';
        foreach ($this->secciones as $section) {
            $output .= <<<HTML
                <article>
                    {$this->showProductCards($section->id)}
                    {$this->renderPaginationButtons($section->id)}
                </article>
            HTML;
        }

        return $output;
    }
}
