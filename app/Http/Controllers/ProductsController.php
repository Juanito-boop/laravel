<?php

namespace App\Http\Controllers;

use App\views\OpcionesView;
use App\views\TarjetasView;
use Exception;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): View
    {
        // Obtener los datos de las tablas 'vinos', 'secciones', 'variedades' y 'paises'
        $datosVinos = (new APIRestSupabaseController())->getDataTableLessParams(
            tabla: 'vinos'
        );
        $datosSecciones = (new APIRestSupabaseController())->getDataTableLessParams(
            tabla: 'secciones'
        );
        $opcionesVariedad = (new APIRestSupabaseController())->getDataTableLessParams(
            tabla: 'variedades'
        );
        $opcionesPais = (new APIRestSupabaseController())->getDataTableLessParams(
            tabla: 'paises'
        );
        $datosVariedad = (new APIRestSupabaseController())->getDataTableLessParams(
            tabla: 'variedades'
        );

        // Crear una instancia de la clase 'TarjetasView' y 'OpcionesView' con los datos obtenidos
        $vista = new TarjetasView(
            dataGetProductos: $datosVinos,
            dataGetSecciones: $datosVariedad
        ); // Tarjetas
        $opciones = new OpcionesView(
            dataGetVariedades: $opcionesVariedad,
            dataGetPaises: $opcionesPais
        ); // Opciones

        // Retornar la vista 'index' con los datos en la variable $vista y $opciones
        return view(
            view: 'index',
            data: compact('vista', 'opciones')
        );
    }

    /**
     * @throws Exception
     */
    public function info(int $productoID): View
    {
        // Definir los parametros para la consulta a la API
        $parametros = "id_unica=eq.$productoID&select=id,nombre,anada,bodega,region,precio,stock,tipo,nivel_alcohol,tipo_barrica,descripcion,notas_cata,temperatura_consumo,activo,id_unica,url_imagen,promocion,busqueda,maridaje,pais,paises(pais),id_categoria,secciones(nombre),variedad,variedades(variedad)";

        // Obtener los datos de la tabla 'vinos'
        $datosVino = (new APIRestSupabaseController())->getDataTableParams(
            tabla: 'vinos',
            parametros: $parametros
        );

        return view(
            view: 'info',
            data: ['datosVino' => $datosVino]
        );
    }
}
