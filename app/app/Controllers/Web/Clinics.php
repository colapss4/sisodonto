<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Clinics extends BaseController
{
    private $title;

    public function __construct()
    {
        $this->title = 'Clínicas';
    }

    public function index()
    {
        $session = session();
        $user_logged = $session->get('user_logged');

        if (!isset($user_logged)) {
            $session->setFlashdata('error', 'Efetue o login para acessar o sistema.');
            return redirect()->to('/login');
        }

        echo '<pre>';
        var_dump($session->get());

        $session->remove('user_logged');
    }
}
