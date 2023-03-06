<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // if all ok
        return redirect()->to('/login');
    }
}
