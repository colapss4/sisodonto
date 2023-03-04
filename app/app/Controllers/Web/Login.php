<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UserModel;

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

        if (empty($post['email']) || empty($post['senha'])) {
            $session->setFlashdata('error', 'Email ou senha não informado.');
            return view('login',  ['title' => $this->title]);
        }

        $model = model(UserModel::class);

        $user = $model->asObject()
            ->where('email', $post['email'])
            ->where('password', md5($post['senha']))
            ->first();

        if (is_null($user)) {
            $session->setFlashdata('error', 'Usuário não encontrado.');
            return view('login',  ['title' => $this->title]);
        }

        $session->set('user_logged', [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email
        ]);

        return redirect()->to('/clinics');
    }
}
