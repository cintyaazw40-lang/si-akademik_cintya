<?php

require_once __DIR__ . '/../models/dosen.php';

class dosencontroller
{
    public function index()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $dosen = $model->getAll();
        require_once __DIR__ . '/../views/dosen/index.php';
    }

    public function detail()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $id = $_GET['id'];
        $dosen = $model->getById($id);
        require_once __DIR__ . '/../views/dosen/detail.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/dosen/create.php';
    }

    public function store()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $model->create([
            'nidn' => $_POST['nidn'],
            'nama' => $_POST['nama'],
            'bidang_keahlian' => $_POST['bidang_keahlian']
        ]);
        header('Location: /si-akademik/public/dosen');
        exit;
    }

    public function edit()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $id = $_GET['id'];
        $dosen = $model->getById($id);
        require_once __DIR__ . '/../views/dosen/edit.php';
    }

    public function update()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $id = $_GET['id'];
        $model->update($id, [
            'nidn' => $_POST['nidn'],
            'nama' => $_POST['nama'],
            'bidang_keahlian' => $_POST['bidang_keahlian']
        ]);
        header('Location: /si-akademik/public/dosen');
        exit;
    }

    public function delete()
    {
        global $pdo;
        $model = new Dosen($pdo);
        $id = $_GET['id'];
        $model->delete($id);
        header('Location: /si-akademik/public/dosen');
        exit;
    }
}