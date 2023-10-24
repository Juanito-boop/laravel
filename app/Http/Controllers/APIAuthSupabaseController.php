<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Client\Response as ResponseClient;
use Illuminate\Http\Response as ResponseHttp;

class APIAuthSupabaseController extends Controller
{
    private $apiKey;
    private $idProject;

    public function __construct()
    {
        $this->apiKey = config('services.supabase.key');
        $this->idProject = config('services.supabase.id');
    }

    public function signup(Request $request): PromiseInterface|string|ResponseClient
    {
        try {
            $response = $this->makeRequest('POST', 'auth/v1/signup', [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTokenEmailPassword(Request $request): ResponseHttp|RedirectResponse|JsonResponse
    {
        try {
            $response = $this->makeRequest('POST', 'auth/v1/token?grant_type=password', [
                'email' => $request->input('email-data'),
                'password' => $request->input('pass-data'),
            ]);

            if ($response->successful()) {
                return redirect()->route('home');
            } else {
                return response()->json(['error' => 'Authentication failed'], $response->status());
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function sendMagicLink(Request $request): PromiseInterface|string|ResponseClient
    {
        try {
            $response = $this->makeRequest('POST', 'auth/v1/magiclink', [
                'email' => $request->input('email'),
            ]);

            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUser(string $userToken): string|array
    {
        try {
            $response = $this->makeRequest('GET', 'auth/v1/user', [], ['Authorization' => 'Bearer ' . $userToken]);

            return $response->body();
        } catch (\Exception $e) {
            return [];
        }
    }

    private function makeRequest(string $method, string $endpoint, array $data = [], array $headers = [])
    {
        $url = "https://{$this->idProject}.supabase.co/$endpoint";
        $requestHeaders = array_merge([
            'apikey' => $this->apiKey,
            'Content-Type' => 'application/json',
        ], $headers);

        return Http::withHeaders($requestHeaders)->$method($url, $data);
    }
}
