<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetasModel extends Model
{
   protected array $productos;
    protected array $secciones;

    public function __construct(array $dataGetProductos, array $dataGetSecciones)
    {
        parent::__construct();
        $this->productos = $dataGetProductos;
        $this->secciones = $dataGetSecciones;
    }

    /**
     * @return array
     */
    public function getProductos(): array
    {
        return $this->productos;
    }

    /**
     * @param array $productos
     */
    public function setProductos(array $productos): void
    {
        $this->productos = $productos;
    }

    /**
     * @return array
     */
    public function getSecciones(): array
    {
        return $this->secciones;
    }

    /**
     * @param array $secciones
     */
    public function setSecciones(array $secciones): void
    {
        $this->secciones = $secciones;
    }
}
