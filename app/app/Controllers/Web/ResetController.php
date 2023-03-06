<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Services\CPFService;
use App\Services\EmailService;
use CodeIgniter\Config\Factories;

class ResetController extends BaseController
{
    private $title;
    private $email;
    private $cpfService;

    public function __construct()
    {
        $this->title = 'Redefinir Senha';
        $this->email = Factories::class(EmailService::class)->get();
        $this->cpfService = Factories::class(CPFService::class);
    }

    public function index()
    {
        return view('reset', ['title' => $this->title]);
    }

    public function reset()
    {
        $session = session();

        if (!$this->request->is('post'))
            return view('reset',  ['title' => $this->title]);

        $post = $this->request->getPost([
            'email',
            'cpf'
        ]);

        if (empty($post['email']) || empty($post['cpf'])) {
            $session->setFlashdata('error', 'Email ou CPF não informado.');
            return view('reset',  ['title' => $this->title]);
        }

        $this->cpfService->setValue($post['cpf']);

        $model = model(UserModel::class);

        $user = $model->asObject()
            ->where('email', $post['email'])
            ->where('cpf', $this->cpfService->getValue())
            ->first();

        if (is_null($user)) {
            $session->setFlashdata('error', 'Usuário não encontrado.');
            return view('reset',  ['title' => $this->title]);
        }

        $newPassword = $this->generateNewPassword(8);

        if (!$model->update($user->id, ['password' => md5($newPassword)])) {
            $session->setFlashdata('error', 'Falha em tentar salvar nova senha.');
            return view('reset',  ['title' => $this->title]);
        }

        $this->email->setFrom('nao-responda@sisodonto.mail', 'SisOdonto');
        $this->email->setTo($post['email']);
        $this->email->setSubject('Recuperação de Senha');
        $this->email->setMessage("<h1>Olá!</h1><p>Sua nova senha é: <span style='color:red'>{$newPassword}</span></p>");

        if (!$this->email->send()) {
            $session->setFlashdata('error', 'Erro!');
            return view('reset',  ['title' => $this->title]);
        }

        $session->setFlashdata('success', 'Sucesso! Verifique sua caixa de e-mail.');
        return redirect()->to('/login');
    }

    private function generateNewPassword(int $lenght): string
    {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $lenght; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
