<?php

namespace App\Models;

use CodeIgniter\Model;

class InsertKuis extends Model
{
    // ...
    protected $table      = 't_kuis';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $useAutoIncrement     = true;

    protected $allowedFields = [
        'user_id','status','nama_metode', 'jumlah_siswa', 'jumlah_pertemuan', 
        'ukuran_kelas', 'modalitas_belajar', 'nama_kelas', 'periode', 'created_by', 'updated_by'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $this->builder = $db->table('t_kuis');
    }

    // public function getData($id)
    // {
    //     # code...
    //     return $this->db->table('SELECT t_method SELECT t_name_method.name_method, t_jml_student.jumlah, t_ukuran_kelas.ukuran, t_pertemuan.pertemuan, t_modalitas.modalitas 
    //     FROM t_method INNER JOIN t_name_method ON t_method.name = t_name_method.id INNER JOIN t_jml_student ON 
    //     t_method.jml_student = t_jml_student.id INNER JOIN t_ukuran_kelas ON t_method.ukuran_kelas = t_ukuran_kelas.id INNER JOIN 
    //     t_pertemuan ON t_method.pertemuan = t_pertemuan.id INNER JOIN t_modalitas ON t_method.modalitas = t_modalitas.id where t_method.id = $id;');
    // }

    // public function getKuis($id)
    // {
    //     $builder = $this->db->table('t_kuis');
    //     $builder->join('t_metode', 't_metode.id = t_kuis.id');
    //     $query = $builder->get($id);
    //     return $query->getResult();
    //     # code...
    // }

    public function get_by_id($id)
    {
        $sql = 'SELECT * FROM t_kuis where id =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function updateSiswa($id, $data)
    {
        $this->db->table($this->table)->update($data, $id);
        //        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }

    public function delete_by_id($id)
    {
        $this->db->table($this->table)->delete(array('id' => $id));
    }
}
