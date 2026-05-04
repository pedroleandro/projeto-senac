<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Message;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct("Admin");
    }

    public function login(): void
    {
        Message::warning('Sua sessão expira em 5 minutos.');

        echo $this->view->render('user/login');
    }
}