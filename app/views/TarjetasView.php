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

    function renderProductCardHtml(string $productName, string $productPrice, string $productId, string $productImageUrl, string $productVariety): string
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
                        <button class="text-emerald-500 background-transparent font-semibold uppercase py-1 outline-none focus:outline-none ease-linear transition-all duration-150 border border-emerald-500 rounded-lg">&nbspINFORMACIÓN&nbsp</button>
                    </a>
                </div>
            </div>
        </div>
        HTML;
    }

    private function renderProductCard(object $product): string
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

    private function renderSection(object $section): string
    {
        $sectionTitle = $section->nombre;
        $sectionHtml = <<<HTML
        <h2 class="my-3 flex items-center justify-center font-poppins text-[2em] font-bold leading-10 text-colorPrincipal_1">$sectionTitle</h2>
        <div class="mx-[5px] px-2 gap-4 flex pb-[3%] justify-start items-center overflow-x-auto scrollbar-width-none -webkit-scrollbar -scroll-m-0 scroll-smooth scroll-snap-x-mandatory [&>div]:hover:backdrop:blur cont" id="container$section->id_unica">
        HTML;

        foreach ($this->productos as $product) {
            if ($product->id_categoria === $section->id_unica) {
                $sectionHtml .= $this->renderProductCard(product: $product);
            }
        }

        $sectionHtml .= <<<HTML
        </div>
        HTML;

        return $sectionHtml;
    }

    public function showProductCards(int $sectionId): void
    {
        foreach ($this->secciones as $section) {
            if ($section->id_unica === $sectionId) {
                echo $this->renderSection(section: $section);
                break;
            }
        }
    }

    function renderPaginationButtons(int $sectionId): mixed
    {
        $html = <<<HTML
            <div class="flex justify-center mb-5">
            <button type="button" class="flex items-center p-2 px-4 mr-2 leading-none text-white rounded-full bg-[#63155C]" id="prev-btn$sectionId">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0"/>
                        <path d="M5 12l4 4"/>
                        <path d="M5 12l4 -4"/>
                    </svg>
                </button>
                <button type="button" class="flex items-center p-2 px-4 ml-2 leading-none text-white rounded-full bg-[#63155C]" id="next-btn$sectionId">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l14 0"/>
                        <path d="M15 16l4 -4"/>
                        <path d="M15 8l4 4"/>
                    </svg>
                </button>
            </div>
        HTML;

        return $html;
    }


    public function showProductCardsWithPagination(): void
    {
        foreach ($this->secciones as $section) {
            echo "<article>";
            $this->showProductCards(sectionId: $section->id_unica);
            echo $this->renderPaginationButtons(sectionId: $section->id_unica);
            echo "</article>";
        }
    }
}
