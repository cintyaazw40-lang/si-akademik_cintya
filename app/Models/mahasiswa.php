<?php
class Mahasiswa
{
    public function getAll()
    {
        return [
            ['nim' => '23001', 'nama' => 'Budi Santoso', 'prodi' => 'Teknik Informatika'],
            ['nim' => '23002', 'nama' => 'Siti Aminah', 'prodi' => 'Sistem Informasi'],
            ['nim' => '23003', 'nama' => 'Agus Prasetyo', 'prodi' => 'Teknik Komputer'],
            ['nim' => '23004', 'nama' => 'Dewi Lestari', 'prodi' => 'Teknik Informatika'],
            ['nim' => '23005', 'nama' => 'Rizky Ramadhan', 'prodi' => 'Sistem Informasi'],
            ['nim' => '23006', 'nama' => 'Putri Wulandari', 'prodi' => 'Teknik Komputer'],
        ];
    }

    public function getByNim($nim)
    {
        foreach ($this->getAll() as $mhs) {
            if ($mhs['nim'] == $nim) {
                return $mhs;
            }
        }
        return null;
    }
}