<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Entities/Mahasiswa.php';
require_once __DIR__ . '/../app/Repositories/MahasiswaRepository.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/MahasiswaControllers.php';
require_once __DIR__ . '/../app/Controllers/DosenController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';


$database = new Database();
$mahasiswaRepo = new MahasiswaRepository($database);

// Ambil folder dasar aplikasi, misal: /si-akademik/public
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim(substr($requestUri, strlen($basePath)), '/');

switch ($uri) {
    case '':
        $controller = new HomeController();
        $controller->index();
        break;

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


    case 'mahasiswa':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->index();
        break;

    case 'mahasiswa/detail':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->detail();
        break;

    case 'mahasiswa/create':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->create();
        break;

    case 'mahasiswa/store':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->store();
        break;

    case 'mahasiswa/edit':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->edit();
        break;

    case 'mahasiswa/update':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->update();
        break;

    case 'mahasiswa/delete':
        $middleware = new AuthMiddleware();
        $middleware->handle();

        $controller = new MahasiswaController($mahasiswaRepo);
        $controller->delete();
        break;

    // ===== DOSEN (dilindungi middleware, masih pakai cara lama) =====
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
