<?php

require_once __DIR__ . '/../models/mahasiswa.php';

class mahasiswacontroller
{
    public function index()
    {
        global $pdo;
        $model = new Mahasiswa($pdo);
        $mahasiswa = $model->getAll();
        require_once __DIR__ . '/../views/mahasiswa/index.php';
    }

    public function detail()
    {
        global $pdo;
        $model = new Mahasiswa($pdo);
        $id = $_GET['id'];
        $mahasiswa = $model->getById($id);
        require_once __DIR__ . '/../views/mahasiswa/detail.php';
    }

    public function create()
    {
        echo "Ini halaman form tambah mahasiswa (belum ada form, baru placeholder).";
    }
}