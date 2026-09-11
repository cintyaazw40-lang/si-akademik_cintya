<?php

require_once __DIR__ . '/../models/dosen.php';

class dosencontroller
{
    public function index()
    {
        $model = new Dosen();
        $dosen = $model->getAll();
        require_once __DIR__ . '/../views/dosen/index.php';
    }

    public function detail()
    {
        $model = new Dosen();
        $nip = $_GET['nip'];
        $dosen = $model->getByNip($nip);
        require_once __DIR__ . '/../views/dosen/detail.php';
    }
}