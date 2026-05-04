<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Message;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home(): void
    {
        Message::info('Bem-vindo ao Projeto Senac! O sistema está funcionando corretamente.');

        echo $this->view->render('home', [
            "title" => "Página Inicial"
        ]);
    }

    public function error(array $data)
    {
        Message::error('Página não encontrada.');
        var_dump($data);
    }
}