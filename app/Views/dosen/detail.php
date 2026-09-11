<?php
/** @var array $dosen */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="d-flex align-items-center gap-3 mb-4">
            <img src="/si-akademik/public/assets/logo-polije.png" alt="Logo POLIJE" style="width:56px;height:auto;">
            <div>
                <h1 class="h3 text-info-emphasis mb-0">Politeknik Negeri Jember</h1>
                <p class="text-secondary mb-0">Detail Dosen</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 480px;">
            <div class="card-body">
                <p class="mb-2"><strong>NIP:</strong> <?= htmlspecialchars($dosen['nip']) ?></p>
                <p class="mb-2"><strong>Nama:</strong> <?= htmlspecialchars($dosen['nama']) ?></p>
                <p class="mb-3"><strong>Jabatan:</strong> <?= htmlspecialchars($dosen['jabatan']) ?></p>
                <a class="btn btn-outline-secondary" href="/si-akademik/public/dosen">Kembali</a>
            </div>
        </div>
    </main>
</body>
</html>