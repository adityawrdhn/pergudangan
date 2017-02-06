<?php
class Login extends CI_Controller{
	
	private $username, $data;
	
    function __construct(){
        parent::__construct();
        $this->load->model('model_master');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_login');
    }

    function cek_login() {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        foreach ($this->model_master->getAllPegawai() as $r):
            if($username == " " || $pass == " "){
                $status = 0;
            }
            elseif ($username != $r->username || $pass != $r->password){
                $status = 0;
            }
            else{
                $status = 1;
                $data = array(
                    'USERNAME' => $r->username,
                    'PASS' => $r->password,
                    'LEVEL' => $r->level,
                    'ID'=> $r->kd_pegawai,
                );
                $this->session->set_userdata($data);
            }
            $output = '{ "status": "'.$status.'" }';
            echo $output;
        endforeach;
    }

    function logout() {
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('ID');
        redirect('login');
    }
}
