<?php

namespace App\Models;

use CodeIgniter\Model;

class Metode extends Model
{
    protected $table      = 't_metode';
    protected $primaryKey = 'id';
    protected $returnType = "object";

    protected $allowedFields = ['nama_metode', 'jumlah_siswa', 'ukuran_kelas', 'pertemuan', 'modalitas'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
