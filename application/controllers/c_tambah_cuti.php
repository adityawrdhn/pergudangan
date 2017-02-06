<?php

class c_tambah_cuti extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('USERNAME') != TRUE && $this->session->userdata('PASS') != TRUE) {
            echo "<script>alert('Session Telah Habis, Silahkan Login !');</script>";
            redirect('login', 'refresh');
        }
        $this->load->model('model_master');
    }

    function index() {
        $id=$this->session->userdata('ID');
        $data = array(
            'title' => 'Buat Permohonan Cuti',
            'cuti_pegawai' => $this->model_master->manualQuery("SELECT * from cuti_pegawai")->result(),
            'tbl_pegawai' => $this->model_master->manualQuery("SELECT * from tbl_pegawai Where kd_pegawai='$id'")->result(),
            
            'active_tambahcuti'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_tambah_izin_cuti');
    }

    function tambah_izin() {
        $data = array(
            'id_pegawai' => $this->input->post('id_pegawai'),
            'nm_pegawai' => $this->input->post('nm_pegawai'),
            'divisi' => $this->input->post('divisi'),
            'tgl_mulai' => date("Y-m-d", strtotime($this->input->post('tgl_mulai'))),
            'jam_mulai' => date("H:i:s", strtotime($this->input->post('jam_mulai'))),
            'tgl_selesai' => date("Y-m-d", strtotime($this->input->post('tgl_selesai'))),
            'jam_selesai' => date("H:i:s", strtotime($this->input->post('jam_selesai'))),
            'deskripsi' => $this->input->post('deskripsi'),
            'tipecuti' => $this->input->post('tipecuti'),
            
             //'status' => $this->input->post('status'),
        );
        $this->model_master->createIzin($data, 'refresh');
        redirect("c_cuti/tampil_cuti");
    }


}
