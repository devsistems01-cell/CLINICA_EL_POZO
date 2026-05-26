<?php

class AuthController extends Controller
{
    public function login(): void
    {
        if (!empty($_SESSION['user'])) {
            $this->redirect('/dashboard');
        }

        $this->view('login', [
            'error' => flash('error'),
        ]);
    }

    public function loginPost(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            flash('error', 'Credenciales incorrectas.');
            $this->redirect('/login');
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'] ?? 'user',
        ];

        $this->redirect('/dashboard');
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/login');
    }
}
