<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Login extends BaseController
{
    private $title;

    public function __construct()
    {
        $this->title = 'Login';
    }

    public function index()
    {
        return view('login', ['title' => $this->title]);
    }

    public function authenticate()
    {
        $session = session();

        if (!$this->request->is('post'))
            return view('login',  ['title' => $this->title]);

        $post = $this->request->getPost(['email', 'senha']);

        $session->setFlashdata('error', implode(',', $post));
        return view('login',  ['title' => $this->title]);
    }
}
