<?php
/** @var Mahasiswa[] $mahasiswa */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <img src="/si-akademik/public/assets/logo-polije.png" alt="Logo POLIJE" style="width:56px;height:auto;">
                <div>
                    <h1 class="h3 text-info-emphasis mb-0">Politeknik Negeri Jember</h1>
                    <p class="text-secondary mb-0">Daftar Mahasiswa</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a class="btn btn-info text-white" href="/si-akademik/public/dosen">Daftar Dosen</a>
                <a class="btn btn-outline-secondary" href="/si-akademik/public/dashboard">Dashboard</a>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-info text-white" href="/si-akademik/public/mahasiswa/create">+ Tambah Mahasiswa</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-info">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Dosen Pembimbing</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mahasiswa as $mhs): ?>
                                <tr>
                                    <td><?= htmlspecialchars($mhs->getNim()) ?></td>
                                    <td><?= htmlspecialchars($mhs->getNama()) ?></td>
                                    <td><?= htmlspecialchars($mhs->getProdi()) ?></td>
                                    <td><?= htmlspecialchars($mhs->getNamaDosen() ?? '-') ?></td>
                                    <td class="d-flex gap-2">
                                        <a class="btn btn-sm btn-outline-info" href="/si-akademik/public/mahasiswa/detail?id=<?= htmlspecialchars($mhs->getId()) ?>">Detail</a>
                                        <a class="btn btn-sm btn-outline-warning" href="/si-akademik/public/mahasiswa/edit?id=<?= htmlspecialchars($mhs->getId()) ?>">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger" href="/si-akademik/public/mahasiswa/delete?id=<?= htmlspecialchars($mhs->getId()) ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>