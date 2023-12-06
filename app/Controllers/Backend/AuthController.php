<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    public function index()
    {
        redirect()->to(base_url('landingpage/login'));
    }
    public function login()
    {
        $session = session();

        if ($session->get('logged_in')) {
            return redirect()->to(base_url('landingpage'));
        }

        if ($this->request->isAJAX() && $this->request->is('post')) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password') ?? '';
            $model = new User();
            $user = $model->where('username', $username)
                ->first();

            $isPasswordValid = false;

            if (!empty($user)) {
                $isPasswordValid = password_verify($password, $user->password);
            }

            if (!$isPasswordValid) {
                $response = [
                    'success' => false,
                    'message' => 'Username atau Password salah',
                ];
                return $this->response->setJSON($response);
            }
            $response = [
                'success' => true,
                'redirect' => base_url('landingpage'),
                'message' => 'Berhasil login'
            ];
            $sess = [
                'user' => $user,
                'logged_in'     => TRUE
            ];
            $session->set($sess);
            return $this->response->setJSON($response);
        }
        return view('backend/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('landingpage/login'));
    }
}
