<?php
/** @var array $dosen */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="d-flex align-items-center gap-3 mb-4">
            <img src="/si-akademik/public/assets/logo-polije.png" alt="Logo POLIJE" style="width:56px;height:auto;">
            <div>
                <h1 class="h3 text-info-emphasis mb-0">Politeknik Negeri Jember</h1>
                <p class="text-secondary mb-0">Edit Dosen</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 520px;">
            <div class="card-body">
                <form method="post" action="/si-akademik/public/dosen/update?id=<?= htmlspecialchars($dosen['id']) ?>">
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" name="nidn" class="form-control"
                               value="<?= htmlspecialchars($dosen['nidn']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= htmlspecialchars($dosen['nama']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" class="form-control"
                               value="<?= htmlspecialchars($dosen['bidang_keahlian']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-info text-white">Simpan Perubahan</button>
                    <a href="/si-akademik/public/dosen" class="btn btn-outline-secondary">Batal</a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>