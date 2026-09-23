<?php

class Mahasiswa
{
    private ?int $id;
    private string $nim;
    private string $nama;
    private string $prodi;
    private ?int $dosenId;
    private ?string $namaDosen;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        ?int $dosenId = null,
        ?int $id = null,
        ?string $namaDosen = null
    ) {
        $this->setNim($nim);
        $this->setNama($nama);
        $this->setProdi($prodi);
        $this->id = $id;
        $this->dosenId = $dosenId;
        $this->namaDosen = $namaDosen;
    }

    // ===== Getter =====
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNim(): string
    {
        return $this->nim;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getProdi(): string
    {
        return $this->prodi;
    }

    public function getDosenId(): ?int
    {
        return $this->dosenId;
    }

    public function getNamaDosen(): ?string
    {
        return $this->namaDosen;
    }

    // ===== Setter dengan validasi =====
    public function setNim(string $nim): void
    {
        if (!ctype_digit($nim)) {
            throw new InvalidArgumentException("NIM harus berupa angka.");
        }
        $this->nim = $nim;
    }

    public function setNama(string $nama): void
    {
        if (trim($nama) === '') {
            throw new InvalidArgumentException("Nama mahasiswa tidak boleh kosong.");
        }
        $this->nama = $nama;
    }

    public function setProdi(string $prodi): void
    {
        if (trim($prodi) === '') {
            throw new InvalidArgumentException("Program studi tidak boleh kosong.");
        }
        $this->prodi = $prodi;
    }

    public function setDosenId(?int $dosenId): void
    {
        $this->dosenId = $dosenId;
    }
}