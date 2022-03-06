<?php

namespace App\Controllers;

use App\Models\InsertKuis;
use App\Models\UsersModel;
use Dompdf\Dompdf;

class Dashboard extends BaseController
{
    protected $assesment;
    protected $method;
    public function __construct()
    {
        $this->assesment = new InsertKuis();
        $this->method = new UsersModel();
        $this->db     = \Config\Database::connect();
    }

    public function index()
    {
        return view("profile");
    }

    public function updateprofile($id = null)
    {
        $model = new UsersModel();

        $data = array(
            'post' => $model->find($id)
        );

        // dd($data);

        return view('edit_profile', $data);
    }


    public function profileupdate()
    {
    }





    public function assesment()
    {
        $kuis = $this->assesment->where('user_id', session()->get('user_id'))->findAll();
        $data = [
            "kuis" => $kuis
        ];
        // dd('$data');
        return view("hasil_assesment", $data);
    }

    public function report()
    {
        $reportModel = new InsertKuis();
        // $id = $this->request->getVar('user_id');

        $report = $reportModel->find('user_id');
        $modelUser = new UsersModel();
        $siswa = $modelUser->find('id');

        $html = view('report/pdf', [
            'kuis' => $report,
            'user' => $siswa
        ]);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }



    public function create_assesment()
    {
        return view("assesment");
    }

    public function save()
    {
        //matching
        $whereparams = array(
            'jumlah_siswa'  => $this->request->getVar('jml_siswa'),
            'pertemuan'     => $this->request->getVar('jml_pertemuan'),
            'ukuran_kelas'  => $this->request->getVar('ukuran'),
            'modalitas'     => $this->request->getVar('modalitas'),
        );
        // print_r($whereparams);
        // dd($whereparams);


        $sql = $this->db->query("SELECT * FROM t_metode where 
        `jumlah_siswa` = '" . $whereparams['jumlah_siswa'] . "' AND
        `pertemuan` = '" . $whereparams['pertemuan'] . "' AND
        `ukuran_kelas` = '" . $whereparams['ukuran_kelas'] . "' AND
        `modalitas` = '" . $whereparams['modalitas'] . "'")->getResult();

        // if empty
        if (empty($sql)) {
            echo "<script>
            alert('Metode Tidak Ada Yang Cocok Untuk Kamu');
            window.location = '" . base_url('/assesment') . "';</script>";
        }

        //save
        // session()->get('user_id');
        $this->assesment->insert([
            'nama_metode'         => $sql[0]->nama_metode,
            'user_id'             => session()->get('user_id'),
            'status'              => 1,
            'created_by'          => session()->get('username'),
            'updated_by'          => session()->get('username'),
            'jumlah_siswa'        => $this->request->getVar('jml_siswa'),
            'jumlah_pertemuan'    => $this->request->getVar('jml_pertemuan'),
            'ukuran_kelas'        => $this->request->getVar('ukuran'),
            'modalitas_belajar'   => $this->request->getVar('modalitas'),
            'nama_kelas'          => $this->request->getVar('namakelas'),
            'periode'             => $this->request->getVar('periode'),
        ]);
        // print_r($data);
        // dd($data);
        // die();
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        echo "<script>alert('Metode Yang Cocok Untuk Kamu Adalah " . $sql[0]->nama_metode . "');window.location = '" . base_url('/assesment') . "'</script>";
        // return redirect()->to('dashboard');
    }

    public function delete($id)
    {
        // $this->assesment->delete($id);
        // session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        // return redirect('')->to('/dashboard');

        helper(['form', 'url']);
        // $this->assesment = new InsertKuis();
        $this->assesment->delete_by_id($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {

        $this->assesment = new InsertKuis();

        $data = $this->assesment->get_by_id($id);

        echo json_encode($data);
    }
    public function update()
    {

        helper(['form', 'url']);
        // $this->assesment = new InsertKuis();

        $data = array(
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'periode' => $this->request->getVar('periode'),
        );
        $this->assesment->updateSiswa(array('id' => $this->request->getVar('id')), $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        echo json_encode(array("status" => TRUE));
    }
}
