<?php

class UserController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();
        $this->requireAdmin();

        $users = (new User())->getAll();
        $this->view('users/index', [
            'users' => $users,
            'message' => flash('success'),
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->requireAdmin();

        $this->view('users/form', [
            'user' => null,
            'action' => '/users/create',
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        $this->requireAdmin();

        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => $_POST['password'],
            'role' => $_POST['role'] ?? 'user',
        ];

        (new User())->create($data);
        flash('success', 'Usuario creado correctamente.');
        $this->redirect('/users');
    }

    public function edit(): void
    {
        $this->requireLogin();
        $this->requireAdmin();

        $id = $_GET['id'] ?? null;
        $user = (new User())->find($id);
        $this->view('users/form', [
            'user' => $user,
            'action' => '/users/edit?id=' . $id,
        ]);
    }

    public function update(): void
    {
        $this->requireLogin();
        $this->requireAdmin();

        $id = $_GET['id'] ?? null;
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => $_POST['password'] ?? '',
            'role' => $_POST['role'] ?? 'user',
        ];

        (new User())->update($id, $data);
        flash('success', 'Usuario actualizado correctamente.');
        $this->redirect('/users');
    }

    public function delete(): void
    {
        $this->requireLogin();
        $this->requireAdmin();

        $id = $_GET['id'] ?? null;
        (new User())->delete($id);
        flash('success', 'Usuario eliminado.');
        $this->redirect('/users');
    }
}
