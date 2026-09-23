<?php
/** @var Mahasiswa $mahasiswa */
/** @var array $daftarDosen */
/** @var array $errors */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <div class="d-flex align-items-center gap-3 mb-4">
            <img src="/si-akademik/public/assets/logo-polije.png" alt="Logo POLIJE" style="width:56px;height:auto;">
            <div>
                <h1 class="h3 text-info-emphasis mb-0">Politeknik Negeri Jember</h1>
                <p class="text-secondary mb-0">Edit Mahasiswa</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="max-width: 520px;">
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $err): ?>
                            <div><?= htmlspecialchars($err) ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="/si-akademik/public/mahasiswa/update?id=<?= htmlspecialchars($mahasiswa->getId()) ?>">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control"
                               value="<?= htmlspecialchars($mahasiswa->getNim()) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= htmlspecialchars($mahasiswa->getNama()) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi" class="form-control"
                               value="<?= htmlspecialchars($mahasiswa->getProdi()) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosen Pembimbing</label>
                        <select name="dosen_id" class="form-select">
                            <option value="">-- Tidak ada --</option>
                            <?php foreach ($daftarDosen as $d): ?>
                                <option value="<?= htmlspecialchars($d['id']) ?>"
                                    <?= ((int)$d['id'] === $mahasiswa->getDosenId()) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($d['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info text-white">Simpan Perubahan</button>
                    <a href="/si-akademik/public/mahasiswa" class="btn btn-outline-secondary">Batal</a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>