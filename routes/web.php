<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/MahasiswaControllers.php';
require_once __DIR__ . '/../app/Controllers/DosenController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';


// Ambil folder dasar aplikasi, misal: /si-akademik/public
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

// Ambil path URL (tanpa query string), lalu buang bagian basePath
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim(substr($requestUri, strlen($basePath)), '/');

switch ($uri) {
    case '':
        $controller = new HomeController();
        $controller->index();
        break;

    // ===== AUTH (tidak perlu middleware) =====
    case 'login':
        $controller = new AuthController();
        $controller->loginForm();
        break;

    case 'login/process':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    // ===== DASHBOARD (dilindungi middleware) =====
    case 'dashboard':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new AuthController();
        $controller->dashboard();
        break;

    // ===== MAHASISWA (dilindungi middleware) =====
    case 'mahasiswa':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController();
        $controller->index();
        break;

    case 'mahasiswa/create':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController();
        $controller->create();
        break;

    case 'mahasiswa/detail':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController();
        $controller->detail();
        break;

    // ===== DOSEN (dilindungi middleware) =====
    case 'dosen':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->index();
        break;

    case 'dosen/detail':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->detail();
        break;

    case 'dosen/create':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->create();
        break;

    case 'dosen/store':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->store();
        break;

    case 'dosen/edit':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->edit();
        break;

    case 'dosen/update':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->update();
        break;

    case 'dosen/delete':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new DosenController();
        $controller->delete();
        break;

    default:
        http_response_code(404);
        echo "404 - Halaman tidak ditemukan";
        break;
}