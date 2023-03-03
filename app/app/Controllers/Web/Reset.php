<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Reset extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Redefinir Senha'
        ];
        return view('reset', $data);
    }
}
