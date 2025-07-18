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

    public function forgotPassword()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $user  = $this->users->where('email', $email)->first();

            if ($user) {
                $token      = bin2hex(random_bytes(32));
                $expires_at = date('Y-m-d H:i:s', time() + 3600);

                $resetModel = new \App\Models\PasswordResetTokenModel();
                $resetModel->insert([
                    'user_id'    => $user['id'],
                    'token'      => $token,
                    'expires_at' => $expires_at,
                ]);

                $emailService = service('email');
                $emailService->setTo($user['email']);
                $emailService->setSubject('Password Reset');
                $link = base_url('reset-password?token=' . $token);
                $emailService->setMessage(
                    "Click the link to reset your password: {$link}"
                );
                $emailService->send();
            }

            return redirect()->to('login')
                ->with('message', 'If the email exists, a reset link has been sent.');
        }

        return view('auth/forgot_password');
    }

    public function resetPassword()
    {
        $token = $this->request->getGet('token');
        $resetModel = new \App\Models\PasswordResetTokenModel();

        $record = $resetModel
            ->where('token', $token)
            ->where('expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$record) {
            return redirect()->to('login')->with('error', 'Invalid or expired token.');
        }

        if ($this->request->getMethod() === 'post') {
            $password = $this->request->getPost('password');

            if (strlen($password) < 8) {
                return view('auth/reset_password', [
                    'token' => $token,
                    'error' => 'Password must be at least 8 characters.',
                ]);
            }

            $this->users->updateUser($record['user_id'], ['password' => $password]);
            $resetModel->delete($record['id']);

            return redirect()->to('login')->with('message', 'Password reset successful.');
        }

        return view('auth/reset_password', ['token' => $token]);
    }

    private function getRoles(): array
    {
        $db = \Config\Database::connect();

        return $db->table('roles')->select('id, name')->get()->getResultArray();
    }
}
