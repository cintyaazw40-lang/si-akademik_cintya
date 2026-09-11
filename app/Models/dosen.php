<?php
class Dosen
{
    public function getAll()
    {
        return [
            ['nip' => 'D001', 'nama' => 'Dr. Hendra Wijaya', 'jabatan' => 'Lektor Kepala'],
            ['nip' => 'D002', 'nama' => 'Ir. Maya Kusuma', 'jabatan' => 'Lektor'],
            ['nip' => 'D003', 'nama' => 'Dr. Farhan Ardiansyah', 'jabatan' => 'Asisten Ahli'],
        ];
    }

    public function getByNip($nip)
    {
        foreach ($this->getAll() as $dsn) {
            if ($dsn['nip'] == $nip) {
                return $dsn;
            }
        }
        return null;
    }
}