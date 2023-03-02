<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }
}
