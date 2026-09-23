<?php

require_once __DIR__ . '/../Entities/Mahasiswa.php';

class MahasiswaRepository
{
    private PDO $pdo;

    public function __construct(Database $database)
    {
        $this->pdo = $database->getConnection();
    }

    private function mapToEntity(array $row): Mahasiswa
    {
        return new Mahasiswa(
            nim: $row['nim'],
            nama: $row['nama'],
            prodi: $row['prodi'],
            dosenId: $row['dosen_id'] !== null ? (int) $row['dosen_id'] : null,
            id: (int) $row['id'],
            namaDosen: $row['nama_dosen'] ?? null
        );
    }

    public function all(): array
    {
        $sql = "SELECT mahasiswa.*, dosen.nama AS nama_dosen
                FROM mahasiswa
                LEFT JOIN dosen ON mahasiswa.dosen_id = dosen.id
                ORDER BY mahasiswa.nama ASC";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'mapToEntity'], $rows);
    }

    public function find(int $id): ?Mahasiswa
    {
        $sql = "SELECT mahasiswa.*, dosen.nama AS nama_dosen
                FROM mahasiswa
                LEFT JOIN dosen ON mahasiswa.dosen_id = dosen.id
                WHERE mahasiswa.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapToEntity($row) : null;
    }

    public function create(Mahasiswa $mahasiswa): int
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO mahasiswa (nim, nama, prodi, dosen_id)
             VALUES (:nim, :nama, :prodi, :dosen_id)"
        );
        $stmt->execute([
            'nim' => $mahasiswa->getNim(),
            'nama' => $mahasiswa->getNama(),
            'prodi' => $mahasiswa->getProdi(),
            'dosen_id' => $mahasiswa->getDosenId(),
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(int $id, Mahasiswa $mahasiswa): bool
    {
        $stmt = $this->pdo->prepare(
            "UPDATE mahasiswa
             SET nim = :nim, nama = :nama, prodi = :prodi, dosen_id = :dosen_id
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'nim' => $mahasiswa->getNim(),
            'nama' => $mahasiswa->getNama(),
            'prodi' => $mahasiswa->getProdi(),
            'dosen_id' => $mahasiswa->getDosenId(),
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM mahasiswa WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}