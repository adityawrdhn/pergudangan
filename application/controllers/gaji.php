<?php

class gaji extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('USERNAME') != TRUE && $this->session->userdata('PASS') != TRUE) {
            echo "<script>alert('Session Telah Habis, Silahkan Login !');</script>";
            redirect('login', 'refresh');
        }
        $this->load->model('model_master');
    }

    function index() {
        $data = array(
            'title' => 'Halaman Gaji',
            'tb_gaji' => $this->model_master->manualQuery("SELECT * from tb_gaji")->result(),
            'active_gajipegawai'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_gaji');
    }

    function terima() {
        $kd_gaji = $this->uri->segment(3);
        $data = array(
            'status' => "Diterima"
        );
        $this->model_master->updateStatusGaji($kd_gaji, $data);
        redirect("gaji/tampil_Gaji_Manager");
    }

    function tolak() {
        $kd_gaji = $this->uri->segment(3);
        $data = array(
            'status' => "Ditolak"
        );
        $this->model_master->updateStatusGaji($kd_gaji, $data);
        redirect("gaji/tampil_Gaji_Manager");
    }
    function sudah_diterima() {
        $kd_gaji = $this->uri->segment(3);
        $data = array(
            'status' => "Sudah Diambil"
        );
        $this->model_master->updateStatusGaji($kd_gaji, $data);
        redirect("gaji/tampil_Gaji_Pegawai");
    }
    function tampil_Gaji() {
        $data = array(
            'title' => 'Halaman Gaji',
            'tb_gaji' => $this->model_master->manualQuery("SELECT * from tb_gaji")->result(),
            
			'active_gajipegawai'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_gaji');
    }
    function tampil_Gaji_Manager() {
        $data = array(
            'title' => 'Konfirmasi Gaji (Manager)',
            'tb_gaji' => $this->model_master->manualQuery("SELECT * from tb_gaji")->result(),
            
            'active_konfirmasigaji'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_gaji_m');
    }
    function tampil_Gaji_HRD() {
        $data = array(
            'title' => 'Set Gaji Pegawai',
            'tb_gaji' => $this->model_master->manualQuery("SELECT * from tb_gaji")->result(),
            'tbl_pegawai'=> $this->model_master->manualQuery("SELECT * from tbl_pegawai")->result(),
            'active_MasukkanGaji'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_gaji_h');
    }

    function tampil_Gaji_Pegawai() {
        $id=$this->session->userdata('ID');
        $data = array(
            'title' => 'Konfirmasi Gaji (Pegawai)',
            'tb_gaji' => $this->model_master->manualQuery("SELECT * from tb_gaji g, tbl_pegawai p WHERE p.kd_pegawai = g.kd_pegawai and g.kd_pegawai='$id'")->result(),
            
            'active_konfirmasigajip'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_gaji_k');
    }
    function setgaji(){
        $id = $this->input->post('kd_gaji');
        $data=array(
            'kd_gaji'=> $this->input->post('kd_gaji'),
            'kd_pegawai'=>$this->input->post('kd_pegawai'),
            'nama'=>$this->input->post('nama'),
            'divisi'=>$this->input->post('divisi'),
            'tgl_mulai'=>date("Y-m-d", strtotime($this->input->post('tgl_mulai'))),
            'tgl_akhir'=>date("Y-m-d", strtotime($this->input->post('tgl_akhir'))),
            'gaji_pokok'=>$this->input->post('gaji_pokok'),
            'bonus'=>$this->input->post('bonus')

        );
        $this->model_master->setGaji($id,$data);
        redirect("gaji/tampil_Gaji_HRD");
    }
    function addgajipegawai(){
        $data=array(
            'kd_gaji'=> $this->input->post('kd_gaji'),
            'kd_pegawai'=>$this->input->post('kd_pegawai'),
            'nama'=>$this->input->post('nama'),
            'divisi'=>$this->input->post('divisi'),
            'tgl_mulai'=>date("Y-m-d", strtotime($this->input->post('tgl_mulai'))),
            'tgl_akhir'=>date("Y-m-d", strtotime($this->input->post('tgl_akhir'))),
            'gaji_pokok'=>$this->input->post('gaji_pokok'),
            'bonus'=>$this->input->post('bonus'),
            'status'=>'menunggu',

        );
        $this->model_master->insertGaji($data);
        redirect("gaji/tampil_Gaji_HRD");
    }
    function get_data_pegawai(){
        $kd_pegawai=$this->input->post('kd_pegawai');
        $data=array(
            'tbl_pegawai'=>$this->model_master->getPegawaiById($kd_pegawai),
        );
        $this->load->view('pages/ajax_detail_pegawai',$data);
    }



}
