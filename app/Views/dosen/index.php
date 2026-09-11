<?php
/** @var array $dosen */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <img src="/si-akademik/public/assets/logo-polije.png" alt="Logo POLIJE" style="width:56px;height:auto;">
                <div>
                    <h1 class="h3 text-info-emphasis mb-0">Politeknik Negeri Jember</h1>
                    <p class="text-secondary mb-0">Daftar Dosen</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a class="btn btn-outline-secondary" href="/si-akademik/public/mahasiswa">Kembali ke Mahasiswa</a>
                <a class="btn btn-outline-secondary" href="/si-akademik/public/dashboard">Dashboard</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-info">
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (($dosen ?? []) as $dsn): ?>
                                <tr>
                                    <td><?= htmlspecialchars($dsn['nip']) ?></td>
                                    <td><?= htmlspecialchars($dsn['nama']) ?></td>
                                    <td><?= htmlspecialchars($dsn['jabatan']) ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info" href="/si-akademik/public/dosen/detail?nip=<?= htmlspecialchars($dsn['nip']) ?>">Detail</a>
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