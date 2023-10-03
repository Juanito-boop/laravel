<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response as ResponseClient;
use Illuminate\Http\Response as ResponseHttp;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;

class APIAuthSupabaseController extends Controller
{
    public function signup(Request $request): PromiseInterface|string|ResponseClient
    {
        $apiKey = env(key: 'APIKEY', default: 'null');
        $idProject = env(key: 'ID_PROJECT', default: 'null');

        try {
            return Http::withHeaders(
                headers: [
                    'apikey' => $apiKey,
                    'Content-Type' => 'application/json',
                ]
            )->post(
                url: "https://$idProject.supabase.co/auth/v1/signup",
                data: [
                    'email' => $request->input(key: 'email'),
                    'password' => $request->input(key: 'password'),
                ]
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTokenEmailPassword(Request $request): ResponseHttp|RedirectResponse|JsonResponse
    {
        $apiKey = env(key: 'APIKEY', default: 'null');
        $idProject = env(key: 'ID_PROJECT', default: 'null');

        try {
            $response = Http::withHeaders(
                headers:[
                    'apikey' => $apiKey,
                    'Content-Type' => 'application/json',
                ]
            )->post(
                url: "https://$idProject.supabase.co/auth/v1/token?grant_type=password",
                data: [
                    'email' => $request->input(key: 'email-data'),
                    'password' => $request->input(key: 'pass-data'),
                ]
            );

            if ($response->successful()) {
                return redirect()->route('home');
            } else {
                return response()->json(data: ['error' => 'Authentication failed'], status: $response->status());
            }

        } catch (Exception $e) {
            // Ocurrió una excepción, mostrar un mensaje de error o realizar alguna acción adecuada
            return back()->withErrors(provider: ['message' => $e->getMessage()]);
        }
    }

    public function sendMagicLink(Request $request): PromiseInterface|string|ResponseClient
    {
        $apiKey = env(key: 'APIKEY', default: 'null');
        $idProject = env(key: 'ID_PROJECT', default: 'null');

        try {
            return Http::withHeaders(
                headers: [
                    'apikey' => $apiKey,
                    'Content-Type' => 'application/json',
                ]
            )->post(
                url: "https://$idProject.supabase.co/auth/v1/magiclink",
                data: [
                    'email' => $request->input(key: 'email'),
                ]
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUser(string $userToken): string|array
    {
        $apiKey = env(key: 'APIKEY', default: 'null');
        $idProject = env(key: 'ID_PROJECT', default: 'null');

        try {
            $response = Http::withHeaders(
                headers: [
                    'apikey' => $apiKey,
                    'Authorization' => 'Bearer ' . $userToken,
                ]
            )->get(
                url: "https://$idProject.supabase.co/auth/v1/user"
            );

            return $response->body();
        } catch (Exception $e) {
            return [];
        }
    }
}
