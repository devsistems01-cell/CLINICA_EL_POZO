<?php

class Controller
{
    protected function view(string $path, array $data = []): void
    {
        (new View())->render($path, $data);
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    protected function requireLogin(): void
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    protected function requireAdmin(): void
    {
        if (empty($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
            http_response_code(403);
            echo '<div class="container"><div class="card"><h2>Acceso denegado</h2><p>No tienes permiso para acceder a esta sección.</p></div></div>';
            exit;
        }
    }
}
