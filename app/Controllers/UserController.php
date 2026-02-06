<?php

namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller
{
    public function login(): void
    {
        $this->view('user/login');
    }
}