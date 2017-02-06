<?php

class c_cuti extends CI_Controller {

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
            'title' => 'Perizinan Cuti',
            'cuti_pegawai' => $this->model_master->manualQuery("SELECT * from cuti_pegawai")->result(),
            'active_cutipegawai'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_cuti');
    }

    function terima_izin() {
        $no_izin = $this->uri->segment(3);
        $data = array(
            'status' => "Diizinkan"
        );
        $this->model_master->updateStatusIzin($no_izin, $data);
        redirect("c_cuti");
    }

    function tolak_izin() {
        $no_izin = $this->uri->segment(3);
        $data = array(
            'status' => "Tidak Diizinkan"
        );
        $this->model_master->updateStatusIzin($no_izin, $data);
        redirect("c_cuti");
    }
    
    function tampil_cuti() {
        $data = array(
            'title' => 'Perizinan Cuti',
            'cuti_pegawai' => $this->model_master->manualQuery("SELECT * from cuti_pegawai")->result(),
            
			'active_tampilcuti'=>'active',
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_cuti_biasa');
    }

}
