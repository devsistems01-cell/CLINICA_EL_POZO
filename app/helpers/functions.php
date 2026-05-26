<?php

function old(string $key, $default = '')
{
    return $_POST[$key] ?? $default;
}

function flash(string $key, ?string $message = null)
{
    if ($message !== null) {
        $_SESSION['flash'][$key] = $message;
        return;
    }

    if (!empty($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }

    return null;
}

function authUser()
{
    return $_SESSION['user'] ?? null;
}

function formatDate(string $dateTime): string
{
    return date('d/m/Y H:i', strtotime($dateTime));
}
