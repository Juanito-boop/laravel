<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;

class APIRestSupabaseController extends Controller
{
    /**
     * @throws Exception
     */
    public function getDataTableLessParams(string $tabla): array|object|string
    {
        $apiKey = env(key: 'APIKEY', default: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im5wdXhwdWVsaW1heXFyc216cXVyIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTI4NDA4OTUsImV4cCI6MjAwODQxNjg5NX0.BdphzWe3xBzZZ_helLZlsUVDVEjByXfS8FjJP6Agn0M');
        $idProject = env(key: 'ID_PROJECT', default: 'npuxpuelimayqrsmzqur');

        // Determinar la consulta en función del valor de $tabla
        switch ($tabla) {
            case 'vinos':
                $parametros = "select=id,nombre,anada,bodega,region,precio,stock,tipo,nivel_alcohol,tipo_barrica,descripcion,notas_cata,temperatura_consumo,activo,id_unica,url_imagen,promocion,busqueda,maridaje,pais,paises(pais),id_categoria,secciones(nombre),variedad,variedades(variedad)&order=id.asc";
                break;
            case 'secciones':
                $parametros = "id_unica=neq.4&select=*";
                break;
            case 'paises':
            case 'variedades':
                $parametros = 'select=*';
                break;
            default:
                return "no es una tabla valida/ no es el eschema correcto";
        }

        // Realizar la petición a la API
        $response = Http::withHeaders(
            headers: [
                'apikey' => $apiKey,
                'Authorization' => 'Bearer ' . $apiKey
            ]
        )->get(url: "https://$idProject.supabase.co/rest/v1/$tabla?$parametros");

        // Obtener la respuesta JSON como cadena de texto
        $responseObject = json_decode($response->body());

        // Retornar la respuesta JSON
        return $responseObject;
    }

    /**
     * @throws Exception
     */
    public function getDataTableParams(string $tabla, string $parametros): array|object|string
    {
        $apiKey = env(key: 'APIKEY', default: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im5wdXhwdWVsaW1heXFyc216cXVyIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTI4NDA4OTUsImV4cCI6MjAwODQxNjg5NX0.BdphzWe3xBzZZ_helLZlsUVDVEjByXfS8FjJP6Agn0M');
        $idProject = env(key: 'ID_PROJECT', default: 'npuxpuelimayqrsmzqur');
        // Realizar la petición a la API
        $response = Http::withHeaders(
            headers: [
                'apikey' => $apiKey,
                'Authorization' => 'Bearer ' . $apiKey
            ]
        )->get(url: "https://$idProject.supabase.co/rest/v1/$tabla?$parametros");

        // Obtener la respuesta JSON como cadena de texto
        $json = $response->body();

        // Retornar la respuesta JSON como un array asociativo
        return json_decode(json: $json, associative: true);
    }

    /**
     * @throws Exception
     */
    public function postDataTable(string $tabla, array $data): ResponseInterface|string|null
    {
        try {
            $apiKey = env(key: 'APIKEY', default: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im5wdXhwdWVsaW1heXFyc216cXVyIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTI4NDA4OTUsImV4cCI6MjAwODQxNjg5NX0.BdphzWe3xBzZZ_helLZlsUVDVEjByXfS8FjJP6Agn0M');
        $idProject = env(key: 'ID_PROJECT', default: 'npuxpuelimayqrsmzqur');

            return Http::withHeaders(
                headers: [
                    'apikey' => $apiKey,
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                    'Prefer' => 'return=minimal'
                ]
            )->post(
                url: "https://$idProject.supabase.co/rest/v1/$tabla",
                data: json_encode(value: $data)
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    public function patchDataTable(string $tabla, string $columna, string $valor, array $datos): ResponseInterface|string|null
    {
        try {
            $apiKey = env(key: 'APIKEY', default: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im5wdXhwdWVsaW1heXFyc216cXVyIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTI4NDA4OTUsImV4cCI6MjAwODQxNjg5NX0.BdphzWe3xBzZZ_helLZlsUVDVEjByXfS8FjJP6Agn0M');
        $idProject = env(key: 'ID_PROJECT', default: 'npuxpuelimayqrsmzqur');

            return Http::withHeaders(
                headers: [
                    'apikey' => $apiKey,
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                    'Prefer' => 'return=minimal'
                ]
            )->patch(
                url: "https://$idProject.supabase.co/rest/v1/$tabla?$columna=eq.$valor",
                data: json_encode(value: $datos)
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    public function deleteDataTable(string $tabla, string $columna, string $valor): ResponseInterface|string|null
    {
        try {
            $apiKey = env(key: 'APIKEY', default: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im5wdXhwdWVsaW1heXFyc216cXVyIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTI4NDA4OTUsImV4cCI6MjAwODQxNjg5NX0.BdphzWe3xBzZZ_helLZlsUVDVEjByXfS8FjJP6Agn0M');
        $idProject = env(key: 'ID_PROJECT', default: 'npuxpuelimayqrsmzqur');

            return Http::withHeaders(
                headers: [
                    'apikey' => $apiKey,
                    'Authorization' => 'Bearer ' . $apiKey
                ]
            )->delete(url: "https://$idProject.supabase.co/rest/v1/$tabla?$columna=eq.$valor");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
