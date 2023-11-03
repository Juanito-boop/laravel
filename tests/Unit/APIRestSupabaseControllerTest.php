<?php

namespace Tests\Unit;

use App\Http\Controllers\APIRestSupabaseController;
use PHPUnit\Framework\TestCase;

class APIRestSupabaseControllerTest extends TestCase
{
    public function testGetDataTableLessParams()
    {
        $controller = new APIRestSupabaseController();

        // Test with a valid table
        $tabla = 'vinos';
        $expectedUrl = "https://{$controller->idProject}.supabase.co/rest/v1/$tabla?select=id,nombre,anada,bodega,region,precio,stock,tipo,nivel_alcohol,tipo_barrica,descripcion,notas_cata,temperatura_consumo,activo,id_unica,url_imagen,promocion,busqueda,maridaje,pais,paises(pais),id_categoria,secciones(nombre),variedad,variedades(variedad)&order=id.asc";
        $expectedResponse = [
            [
                "id" => 1,
                "nombre" => "Petirrojo",
                "anada" => 2019,
                "bodega" => "Bodega Requingua, Chile",
                "region" => "Valle Central",
                "precio" => 87.422,
                "stock" => 40,
                "tipo" => "Tinto",
                "nivel_alcohol" => 13.0,
                "tipo_barrica" => "El vino Petirrojo se añeja en barricas de roble francés y americano durante un periodo de 8 meses . ",
                "descripcion" => "Un vino con cuerpo y personalidad única . Sus notas frutales y especiadas te transportarán a un bosque encantado, mientras que su elegante estructura te cautivará en cada sorbo . ",
                "notas_cata" => "En nariz, este vino chileno ofrece una mezcla de frutas rojas, especias y notas florales . En boca, se destaca por su buena acidez y cuerpo medio, con sabores de cerezas, ciruelas y un toque de vainilla . El final es largo y persistente, con un ligero toque de taninos . ",
                "temperatura_consumo" => "16 - 18°C",
                "activo" => true,
                "id_unica" => 245726,
                "url_imagen" => "https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/245726.png",
                "promocion" => false,
                "busqueda" => 4,
                "maridaje" => "Va muy bien con platos de pasta con salsa de tomate, carnes asadas y quesos suaves.",
                "pais" => 3,
                "id_categoria" => 1,
                "variedad" => 5,
                "paises" => [
                    "pais" => "Chile"
                ],
                "secciones" => [
                    "nombre" => "NUESTROS VINOS MAS VENDIDOS"
                ],
                "variedades" => [
                    "variedad" => "Merlot"
                ]
            ],
            [
                "id" => 2,
                "nombre" => "Posta Pizzella",
                "anada" => 2019,
                "bodega" => "Bodega La Posta, Argentina",
                "region" => "Valle de Uco, Mendoza",
                "precio" => 98.842,
                "stock" => 50,
                "tipo" => "Tinto",
                "nivel_alcohol" => 13.5,
                "tipo_barrica" => "Este vino se añeja en barricas de roble francés y americano durante un periodo de 12 meses.",
                "descripcion" => "Descubre la esencia de los viñedos argentinos en cada botella de este vino. Con su aroma seductor y su    sabor intenso a frutas maduras, Posta Pizzella te invita a disfrutar de una experiencia verdaderamente indulgente.",
                "notas_cata" => "De origen argentino, este vino tinto presenta un intenso aroma a frutos negros, junto con notas especiadas     y de vainilla. En el paladar, es un vino de cuerpo medio con taninos suaves y redondos, con un sabor a frutos negros maduros    y una acidez equilibrada. El final es largo y agradable.",
                "temperatura_consumo" => "16-18°C",
                "activo" => true,
                "id_unica" => 933404,
                "url_imagen" => "https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/933404.png",
                "promocion" => false,
                "busqueda" => 4,
                "maridaje" => "Es ideal para acompañar con carnes rojas a la parrilla, guisos y estofados.",
                "pais" => 1,
                "id_categoria" => 1,
                "variedad" => 4,
                "paises" => [
                    "pais" => "Argentina"
                ],
                "secciones" => [
                    "nombre" => "NUESTROS VINOS MAS VENDIDOS"
                ],
                "variedades" => [
                    "variedad" => "Malbec"
                ]
            ],
            [
                "id" => 3,
                "nombre" => "Marquez de villa de leyva",
                "anada" => 2017,
                "bodega" => "Bodega Marquez de Villa de Leyva, Colombia",
                "region" => "Villa de Leyva",
                "precio" => 477.162,
                "stock" => 50,
                "tipo" => "Tinto",
                "nivel_alcohol" => 13.5,
                "tipo_barrica" => "Este vino se añeja en barricas de roble francés durante un periodo de 12 meses.",
                "descripcion" => "Un vino que rinde homenaje a la tradición y la historia. Marquez de Villa de Leyva te sorprenderá con su equilibrio perfecto entre notas de frutas negras, especias y un toque sutil de roble, creando una experiencia memorable.",
                "notas_cata" => "Proveniente de Colombia, este vino tinto tiene un aroma a frutos rojos y negros, junto con notas de cedro y especias. En el paladar, es un vino de cuerpo medio con taninos suaves y una acidez equilibrada, con sabores a frutos negros y un toque de vainilla. El final es largo y persistente.",
                "temperatura_consumo" => "15-17°C",
                "activo" => true,
                "id_unica" => 948930,
                "url_imagen" => "https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/948930.png",
                "promocion" => false,
                "busqueda" => 4,
                "maridaje" => "Combina bien con platos de pollo asado, pastas con salsas cremosas y quesos suaves.",
                "pais" => 2,
                "id_categoria" => 1,
                "variedad" => 2,
                "paises" => [
                    "pais" => "Colombia"
                ],
                "secciones" => [
                    "nombre" => "NUESTROS VINOS MAS VENDIDOS"
                ],
                "variedades" => [
                    "variedad" => "Cabernet Sauvignon"
                ]
            ],
        ];
        $this->assertEquals($expectedResponse, $controller->getDataTableLessParams($tabla));

        // Test with an invalid table
        $tabla = 'invalid_table';
        $expectedResponse = "No es una tabla válida o no es el esquema correcto";
        $this->assertEquals($expectedResponse, $controller->getDataTableLessParams($tabla));
    }
}
