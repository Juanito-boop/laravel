<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

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
     * Realiza una solicitud GET a la API de Supabase sin parámetros personalizados.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @return mixed La respuesta de la API de Supabase o un mensaje de error.
     */
    public function getDataTableLessParams(string $tabla)
    {
        $endpoints = [
            'vinos' => 'select=id,nombre,anada,bodega,region,precio,stock,tipo,nivel_alcohol,tipo_barrica,descripcion,notas_cata,temperatura_consumo,activo,id_unica,url_imagen,promocion,busqueda,maridaje,pais,paises(pais),id_categoria,secciones(nombre),variedad,variedades(variedad)&order=id.asc',
            'secciones' => 'id_unica=neq.4&select=*',
            'paises' => 'select=*',
            'variedades' => 'id=neq.7&select=*'
        ];

        if (array_key_exists($tabla, $endpoints)) {
            $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla?" . $endpoints[$tabla];

            return $this->makeRequest('GET', $url);
        }

        return "No es una tabla válida o no es el esquema correcto";
    }

    /**
     * Realiza una solicitud GET a la API de Supabase con parámetros personalizados.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param string $parametros Los parámetros de consulta personalizados.
     * @return mixed La respuesta de la API de Supabase o un mensaje de error.
     */
    public function getDataTableParams(string $tabla, string $parametros)
    {
        $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla?$parametros";

        return $this->makeRequest('GET', $url);
    }

    /**
     * Realiza una solicitud POST a la API de Supabase.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param array $data Los datos a enviar en la solicitud POST.
     * @return mixed La respuesta de la API de Supabase o un mensaje de error.
     */
    public function postDataTable(string $tabla, array $data)
    {
        $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla";
        $headers = [
            'Content-Type' => 'application/json',
            'Prefer' => 'return=minimal'
        ];

        return $this->makeRequest('POST', $url, $data, $headers);
    }

    /**
     * Realiza una solicitud PATCH a la API de Supabase.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param string $columna El nombre de la columna para filtrar los registros.
     * @param string $valor El valor para filtrar los registros.
     * @param array $datos Los datos a enviar en la solicitud PATCH.
     * @return mixed La respuesta de la API de Supabase o un mensaje de error.
     */
    public function patchDataTable(string $tabla, string $columna, string $valor, array $datos)
    {
        $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla?$columna=eq.$valor";
        $headers = [
            'Content-Type' => 'application/json',
            'Prefer' => 'return=minimal'
        ];

        return $this->makeRequest('PATCH', $url, $datos, $headers);
    }

    /**
     * Realiza una solicitud DELETE a la API de Supabase.
     *
     * @param string $tabla El nombre de la tabla en la API de Supabase.
     * @param string $columna El nombre de la columna para filtrar los registros.
     * @param string $valor El valor para filtrar los registros.
     * @return mixed La respuesta de la API de Supabase o un mensaje de error.
     */
    public function deleteDataTable(string $tabla, string $columna, string $valor)
    {
        $url = "https://{$this->idProject}.supabase.co/rest/v1/$tabla?$columna=eq.$valor";

        return $this->makeRequest('DELETE', $url);
    }

    /**
     * Realiza una solicitud HTTP genérica.
     *
     * @param string $method El método HTTP (GET, POST, PATCH, DELETE).
     * @param string $url La URL de la solicitud.
     * @param array|null $data Los datos a enviar en la solicitud (para métodos POST y PATCH).
     * @param array $headers Los encabezados de la solicitud.
     * @return mixed La respuesta de la API de Supabase o un mensaje de error.
     */
    private function makeRequest(string $method, string $url, array $data = null, array $headers = [])
    {
        try {
            $headers = array_merge($headers, [
                'apikey' => $this->apiKey,
                'Authorization' => 'Bearer ' . $this->apiKey
            ]);

            $response = Http::withHeaders($headers)->$method($url, $data);

            return json_decode($response->body());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
