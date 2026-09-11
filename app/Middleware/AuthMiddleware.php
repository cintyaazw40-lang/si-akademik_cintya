<?php
class AuthMiddleware
{
    public function handle(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        
        if (empty($_SESSION['login']) || $_SESSION['login'] !== true) {
            header('Location: /si-akademik/public/login');
            exit;
        }
    }
}