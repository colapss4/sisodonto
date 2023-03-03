<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Cadastro'
        ];
        return view('register', $data);
    }
}
