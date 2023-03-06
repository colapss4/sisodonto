<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Services\CPFService;
use CodeIgniter\Config\Factories;
use CodeIgniter\Database\Exceptions\DatabaseException;

class RegisterController extends BaseController
{
    private $title;
    private $cpfService;

    public function __construct()
    {
        $this->title = 'Cadastro';
        $this->cpfService = Factories::class(CPFService::class);
    }

    public function index()
    {
        return view('register', ['title' => $this->title]);
    }

    public function register()
    {
        $session = session();

        if (!$this->request->is('post'))
            return view('register', ['title' => $this->title]);

        $post = $this->request->getPost([
            'nome',
            'email',
            'telefone',
            'senha1',
            'senha2',
            'cpf'
        ]);

        if (is_null($post['nome']) || empty($post['nome'])) {
            $session->setFlashdata('error', 'Nome não enviado.');
            return view('register', ['title' => $this->title]);
        } else {
            $post['nome'] = strtoupper($post['nome']);
        }

        if (is_null($post['email']) || empty($post['email'])) {
            $session->setFlashdata('error', 'Email não enviado.');
            return view('register', ['title' => $this->title]);
        }

        if (is_null($post['telefone']) || empty($post['telefone'])) {
            $session->setFlashdata('error', 'Telefone não enviado.');
            return view('register', ['title' => $this->title]);
        } else {
            $post['telefone'] = (string) preg_replace('/[^0-9]/', '', $post['telefone']);
        }

        if (strlen($post['telefone']) != 11) {
            $session->setFlashdata('error', 'Telefone inválido.');
            return view('register', ['title' => $this->title]);
        }

        if ($post['senha1'] != $post['senha2']) {
            $session->setFlashdata('error', 'Senhas diferentes.');
            return view('register', ['title' => $this->title]);
        }

        $this->cpfService->setValue($post['cpf']);
        if (!$this->cpfService->isValid()) {
            $session->setFlashdata('error', 'CPF inválido.');
            return view('register', ['title' => $this->title]);
        } else {
            $post['cpf'] = $this->cpfService->getValue();
        }

        $model = model(UserModel::class);

        try {
            $model->save([
                'name' => $post['nome'],
                'email' => $post['email'],
                'phone_number' => $post['telefone'],
                'password' => md5($post['senha1']),
                'cpf' => $post['cpf'],
                'active' => ENVIRONMENT == 'production' ? false : true
            ]);
        } catch (DatabaseException $error) {
            $session->setFlashdata('error', 'Cadastro falhou. ' . $error->getMessage());
            return view('register', ['title' => $this->title]);
        }

        $session->setFlashdata('success', 'Cadastro realizado com sucesso.');
        return redirect()->to('/login');
    }
}
