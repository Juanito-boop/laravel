<?php

namespace App\views;

class OpcionesView
{
    private array $variedades;
    private array $paises;

    public function __construct(array $dataGetVariedades, array $dataGetPaises)
    {
        $this->variedades = $dataGetVariedades;
        $this->paises = $dataGetPaises;
    }

    public function generarOpcionesVariedad(): string
    {
        $datosVariedades = $this->variedades;
        $html = "<h2 class='flex items-center justify-center text-xl font-bold text-colorPrincipal_1'>CEPAS</h2>";

        foreach ($datosVariedades as $variedad) {
            $divId = $variedad->id;
            $divText = $variedad->variedad;
            $html .= "<input type='checkbox' value='$divId' name='variedad[]' disableds>&nbsp;<label>$divText</label><br>";
        }

        return $html;
    }


    public function generarOpcionesPais(): string
    {
        $datosPaises = $this->paises;
        $html = "<h2 class='flex items-center justify-center text-xl font-bold text-colorPrincipal_1'>PAISES</h2>";

        foreach ($datosPaises as $pais) {
            $divId = $pais->id;
            $divText = $pais->pais;
            $html .= "<input type='checkbox' value='$divId' name='pais[]'>&nbsp;<label>$divText</label><br>";
        }

        return $html;
    }
}
