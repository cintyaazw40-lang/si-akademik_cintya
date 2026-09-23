<?php

require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';
require_once __DIR__ . '/../models/dosen.php';

class mahasiswacontroller
{
    private MahasiswaRepository $repo;

    public function __construct(MahasiswaRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $mahasiswa = $this->repo->all();
        require_once __DIR__ . '/../views/mahasiswa/index.php';
    }

    public function detail()
    {
        $id = (int) $_GET['id'];
        $mahasiswa = $this->repo->find($id);
        require_once __DIR__ . '/../views/mahasiswa/detail.php';
    }

    public function create()
    {
        global $pdo;
        $daftarDosen = (new Dosen($pdo))->getAll();

        $errors = [];
        require_once __DIR__ . '/../views/mahasiswa/create.php';
    }

    public function store()
    {
        try {
            $mahasiswa = new Mahasiswa(
                nim: $_POST['nim'],
                nama: $_POST['nama'],
                prodi: $_POST['prodi'],
                dosenId: !empty($_POST['dosen_id']) ? (int) $_POST['dosen_id'] : null
            );
            $this->repo->create($mahasiswa);
            header('Location: /si-akademik/public/mahasiswa');
            exit;
        } catch (InvalidArgumentException $e) {
            global $pdo;
            $daftarDosen = (new Dosen($pdo))->getAll();
            $errors = [$e->getMessage()];
            require_once __DIR__ . '/../views/mahasiswa/create.php';
        }
    }

    public function edit()
    {
        global $pdo;
        $daftarDosen = (new Dosen($pdo))->getAll();

        $id = (int) $_GET['id'];
        $mahasiswa = $this->repo->find($id);
        $errors = [];
        require_once __DIR__ . '/../views/mahasiswa/edit.php';
    }

    public function update()
    {
        $id = (int) $_GET['id'];
        try {
            $mahasiswa = new Mahasiswa(
                nim: $_POST['nim'],
                nama: $_POST['nama'],
                prodi: $_POST['prodi'],
                dosenId: !empty($_POST['dosen_id']) ? (int) $_POST['dosen_id'] : null
            );
            $this->repo->update($id, $mahasiswa);
            header('Location: /si-akademik/public/mahasiswa');
            exit;
        } catch (InvalidArgumentException $e) {
            global $pdo;
            $daftarDosen = (new Dosen($pdo))->getAll();
            $mahasiswa = $this->repo->find($id);
            $errors = [$e->getMessage()];
            require_once __DIR__ . '/../views/mahasiswa/edit.php';
        }
    }

    public function delete()
    {
        $id = (int) $_GET['id'];
        $this->repo->delete($id);
        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }
}