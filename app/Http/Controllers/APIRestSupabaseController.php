<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;

class APIRestSupabaseController extends Controller
{
    private $apiKey;
    private $idProject;

    public function __construct()
    {
        $this->apiKey = config('services.supabase.key');
        $this->idProject = config('services.supabase.id');
    }

    /**
     * @throws Exception
     */
    public function getDataTableLessParams(string $tabla): array|object|string
    {
        $parametros = [
            'vinos' => "select=id,nombre,anada,bodega,region,precio,stock,tipo,nivel_alcohol,tipo_barrica,descripcion,notas_cata,temperatura_consumo,activo,id_unica,url_imagen,promocion,busqueda,maridaje,pais,paises(pais),id_categoria,secciones(nombre),variedad,variedades(variedad)&order=id.asc",
            'secciones' => "id_unica=neq.4&select=*",
            'paises' => 'select=*',
            'variedades' => 'select=*'
        ];

        if (array_key_exists($tabla, $parametros)) {
            // Realizar la petición a la API
            $response = Http::withHeaders([
                'apikey' => $this->apiKey,
                'Authorization' => 'Bearer ' . $this->apiKey
            ])->get("https://{$this->idProject}.supabase.co/rest/v1/$tabla?" . $parametros[$tabla]);

            // Obtener la respuesta JSON como cadena de texto
            $responseObject = json_decode($response->body());

            // Retornar la respuesta JSON
            return $responseObject;
        } else {
            return "no es una tabla válida/ no es el esquema correcto";
        }
    }

    /**
     * @throws Exception
     */
    public function getDataTableParams(string $tabla, string $parametros): array|object|string
    {
        // Realizar la petición a la API
        $response = Http::withHeaders([
            'apikey' => $this->apiKey,
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get("https://{$this->idProject}.supabase.co/rest/v1/$tabla?$parametros");

        // Obtener la respuesta JSON como array asociativo
        $responseObject = $response->json();

        // Retornar la respuesta JSON
        return $responseObject;
    }

    /**
     * Realiza una solicitud POST a la API de Supabase.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param array $data Los datos a enviar en la solicitud POST.
     * @return ResponseInterface|string|null La respuesta de la API de Supabase o un mensaje de error.
     * @throws Exception
     */
    public function postDataTable(string $tabla, array $data): ResponseInterface|string|null
    {
        try {
            return Http::withHeaders([
                'apikey' => $this->apiKey,
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
                'Prefer' => 'return=minimal'
            ])->post(
                    "https://{$this->idProject}.supabase.co/rest/v1/$tabla",
                    json_encode($data)
                );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Realiza una solicitud PATCH a la API de Supabase.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param string $columna El nombre de la columna para filtrar los registros.
     * @param string $valor El valor para filtrar los registros.
     * @param array $datos Los datos a enviar en la solicitud PATCH.
     * @return ResponseInterface|string|null La respuesta de la API de Supabase o un mensaje de error.
     * @throws Exception
     */
    public function patchDataTable(string $tabla, string $columna, string $valor, array $datos): ResponseInterface|string|null
    {
        try {
            $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla?$columna=eq.$valor";
            $headers = [
                'apikey' => $this->apiKey,
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
                'Prefer' => 'return=minimal'
            ];

            return Http::withHeaders($headers)->patch($url, $datos);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Realiza una solicitud DELETE a la API de Supabase.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param string $columna El nombre de la columna para filtrar los registros.
     * @param string $valor El valor para filtrar los registros.
     * @return ResponseInterface|string|null La respuesta de la API de Supabase o un mensaje de error.
     * @throws Exception
     */
    public function deleteDataTable(string $tabla, string $columna, string $valor): ResponseInterface|string|null
    {
        try {
            $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla?$columna=eq.$valor";
            $headers = [
                'apikey' => $this->apiKey,
                'Authorization' => 'Bearer ' . $this->apiKey
            ];

            return Http::withHeaders($headers)->delete($url);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}