<?php
class Master_pergudangan extends CI_Controller{
	
	private $kd_barang, $kd_supplier, $kd_pegawai, $data;
	
    function __construct(){
        parent::__construct();
        $this->load->model('model_master');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'kd_barang'=>$this->model_master->getKodeBarang(),
            'kd_supplier'=>$this->model_master->getKodeSupplier(),
            'kd_pegawai'=>$this->model_master->getKodePegawai(),
            'data_barang'=>$this->model_master->getAllBarang(),
            'data_supplier'=>$this->model_master->getAllSupplier(),
            'data_contact'=>$this->model_master->getAllContact(),
            'data_pegawai'=>$this->model_master->getAllPegawai(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_master_pergudangan');
        $this->load->view('element/v_footer');
    }

//
//    ===================== INSERT =====================
    function tambah_barang(){
        $data=array(
            'kd_barang'=> $this->input->post('kd_barang'),
            'nm_barang'=>$this->input->post('nm_barang'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_master->insertBarang($data);
        redirect("master_pergudangan");
    }
    function tambah_supplier(){
        $data=array(
            'kd_supplier'=> $this->model_master->getKodeSupplier(),
            'nm_supplier'=>$this->input->post('nm_supplier'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
        );
        $this->model_master->insertSupplier($data);
        redirect("master_pergudangan");
    }
    function tambah_pegawai(){
        $data=array(
            'kd_pegawai'=> $this->model_master->getKodePegawai(),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_master->insertPegawai($data);
        redirect("master_pergudangan");
    }


//    ======================== EDIT =======================
    function edit_barang(){
        $id = $this->input->post('kd_barang');
        $data=array(
            'kd_barang'=> $this->input->post('kd_barang'),
            'nm_barang'=>$this->input->post('nm_barang'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_master->updateBarang($id,$data);
        redirect("master_pergudangan");
    }
    function edit_supplier(){
        $kd_supplier = $this->input->post('kd_supplier');
        $data=array(
            'kd_supplier'=> $this->input->post('kd_supplier'),
            'nm_supplier'=>$this->input->post('nm_supplier'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
        );
        $this->model_master->updateSupplier($kd_supplier,$data);
        redirect("master_pergudangan");
    }
    function edit_contact(){
        $id = $this->input->post('id');
        $data=array(
            'nama'=> $this->input->post('nama'),
            'owner'=>$this->input->post('owner'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'desc'=>$this->input->post('desc'),
        );
        $this->model_master->updateContact($id,$data);
        redirect("master_pergudangan");
    }
    function edit_pegawai(){
        $kd_pegawai = $this->input->post('kd_pegawai');
        $data=array(
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_master->updatePegawai($kd_pegawai,$data);
        redirect("master_pergudangan");
    }

//    ========================== DELETE =======================
    function hapus_barang(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteBarang($id);
        redirect("master_pergudangan");
    }
    function hapus_supplier(){
        $kd_supplier = $this->uri->segment(3);
        $this->model_master->deleteSupplier($kd_supplier);
        redirect("master_pergudangan");
    }
    function hapus_pegawai(){
        $kd_pegawai = $this->uri->segment(3);
        $this->model_master->deletePegawai($kd_pegawai);
        redirect("master_pergudangan");
    }
}


