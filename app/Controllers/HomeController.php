<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function home(): void
    {
        $this->view('home', [
            "title" => "Página Inicial"
        ]);
    }

    public function error(array $data)
    {
        echo "<h1>Error</h1>";
        var_dump($data);
    }
}