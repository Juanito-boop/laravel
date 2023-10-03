<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application as ApplicationP;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View|Application|Factory|ApplicationP
    {
        session_start();
        $token = $_SESSION['token'] ?? '';
        $isSuperAdmin = $_SESSION['admin'] ?? false;

        return view('index');
    }
}
