<?php

class View
{
    public function render(string $path, array $data = []): void
    {
        extract($data, EXTR_OVERWRITE);
        $viewFile = BASE_PATH . '/app/views/' . $path . '.php';
        if (!file_exists($viewFile)) {
            throw new Exception('Vista no encontrada: ' . $viewFile);
        }

        ob_start();
        include $viewFile;
        $content = ob_get_clean();
        include BASE_PATH . '/app/views/layouts/main.php';
    }
}
