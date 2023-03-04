<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class ResetController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Redefinir Senha'
        ];
        return view('reset', $data);
    }
}
