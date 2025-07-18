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

    private function getRoles(): array
    {
        $db = \Config\Database::connect();

        return $db->table('roles')->select('id, name')->get()->getResultArray();
    }
}
