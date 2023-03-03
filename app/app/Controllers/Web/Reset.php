<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Reset extends BaseController
{
    public function index()
    {
        return view('reset');
    }
}
