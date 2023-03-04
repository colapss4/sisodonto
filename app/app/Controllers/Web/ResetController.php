<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class ResetController extends BaseController
{
    private $title;

    public function __construct()
    {
        $this->title = 'Redefinir Senha';
    }

    public function index()
    {
        return view('reset', ['title' => $this->title]);
    }

    public function reset()
    {
        $post = $this->request->getPost([
            'email',
            'cpf'
        ]);

        echo '<pre>';
        var_dump($post);
        die;
    }
}
