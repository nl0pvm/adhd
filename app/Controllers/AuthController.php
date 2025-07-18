<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    protected UserModel $users;

    public function __construct()
    {
        $this->users = new UserModel();
        helper(['form']);
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'role_id'  => $this->request->getPost('role_id'),
            ];

            if (!$this->users->validate($data)) {
                return view('auth/register', [
                    'validation' => $this->users->validator,
                    'roles'      => $this->getRoles(),
                ]);
            }

            $this->users->createUser($data);

            return redirect()->to('/');
        }

        return view('auth/register', [
            'roles' => $this->getRoles(),
        ]);
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->users->where('email', $email)->first();

            if ($user && password_verify($password, $user['password_hash'])) {
                $session = session();
                $session->set([
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'logged_in' => true,
                ]);

                return redirect()->to('/');
            }

            return redirect()->back()
                ->with('error', 'Invalid email or password.')
                ->withInput();
        }

        return view('auth/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }

    private function getRoles(): array
    {
        $db = \Config\Database::connect();

        return $db->table('roles')->select('id, name')->get()->getResultArray();
    }
}
