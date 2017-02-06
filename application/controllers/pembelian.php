<?php
class Pembelian extends CI_Controller{

	private $kd_pembelian, $data, $kd_barang;

    function __construct(){
        parent::__construct();

        $this->load->model('model_app');
        $this->load->model('model_master');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Pembelian Barang',
            'active_pembelian'=>'active',
			'kd_barang'=>$this->model_master->getKodeBarang(),
            'data_barang'=>$this->model_master->getAllBarang(),
            'data_pembelian'=>$this->model_app->manualQuery("SELECT a.kd_pembelian,  a.tanggal_pembelian,a.total_harga,
			(select count(kd_pembelian) as jum from tbl_pembelian_detail where kd_pembelian=a.kd_pembelian)
			as jumlah from tbl_pembelian a ORDER BY a.kd_pembelian DESC")->result(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_pembelian');
        $this->load->view('element/v_footer',$data);

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

//    GET DATA
    function get_detail_barang(){
        $kd_barang=$this->input->post('kd_barang');
        $data=array(
            'detail_barang'=>$this->model_master->getBarangById($kd_barang),
        );
        $this->load->view('pages/ajax_detail_barang',$data);
    }

    function pages_tambah_pembelian(){
        
        $data=array(
            'title'=>'Tambah Pembelian Barang',
            'active_pembelian'=>'active',
            'kd_barang'=>$this->model_master->getKodeBarang(),
            'kd_pembelian'=>$this->model_app->getKodePembelian(),
			'data_barang'=>$this->model_app->manualQuery("SELECT * from tbl_barang
			where stok < 30")->result(),
            'data_supplier'=>$this->model_master->getAllSupplier()
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_add_pembelian',$data);
        $this->load->view('element/v_footer',$data);
    }
	function get_detail_supplier(){
        $id=$this->input->post('kd_supplier');
        $data=array(
            'detail_supplier'=>$this->model_master->getSupplierById($id),
        );
        $this->load->view('pages/ajax_detail_supplier',$data);
    }

    function detail_pembelian(){
        $kd_pembelian= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Pembelian Barang',
            'active_pembelian'=>'active',

            'dt_pembelian'=>$this->model_app->manualQuery("
                SELECT * from tbl_pembelian a
                left join tbl_supplier b
                on a.kd_supplier=b.kd_supplier
                left join tbl_pegawai c
                on a.kd_pegawai=c.kd_pegawai
                where a.kd_pembelian = '$kd_pembelian'
            ")->result(),

            'barang_jual'=>$this->model_app->manualQuery("
                select a.kd_pembelian,a.kd_barang,a.qty,b.nm_barang,b.harga from tbl_pembelian_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_pembelian = '$kd_pembelian'
            ")->result(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_detail_pembelian');
        $this->load->view('element/v_footer',$data);
    }

//    INSERT DATA
    function tambah_pembelian_to_cart(){
        $data = array(
            'id'    => $this->input->post('kd_barang'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nm_barang'),
        );
        $this->cart->insert($data);
        redirect('pembelian/pages_tambah_pembelian');
    }

    function tambah_pembelian(){
        $d_header['kd_pembelian'] = $this->model_app->getKodePembelian();
        $temp= $d_header['kd_pembelian'];
        $d_header['kd_supplier']=$this->input->post('kd_supplier');
		$d_header['total_harga'] = $this->input->post('total_harga');
		$d_header['tanggal_pembelian'] = date("Y-m-d",strtotime($this->input->post('tanggal_pembelian')));
        $d_header['kd_pegawai'] = $this->session->userdata('ID');
        $this->model_app->insertData("tbl_pembelian",$d_header);

        foreach($this->cart->contents() as $items){
            $d_detail['kd_pembelian'] = $temp;
            $d_detail['kd_barang'] = $items['id'];
            $d_detail['qty'] = $items['qty'];
			$d_detail['nm_barang'] = $items['name'];
			$d_detail['harga'] = $items['price'];
            $this->model_app->insertData("tbl_pembelian_detail",$d_detail);
           
        }
        if (!'kd_barang') {
        foreach($this->cart->contents() as $items){
            $data['kd_barang'] = $items['id'];
            $data['nm_barang'] = $items['name'];
            $data['stok'] = $items['qty'];
            $data['harga'] = $items['price'];
        $this->model_master->insertBarang($data);
           
        }
            # code...
        }else{
            foreach($this->cart->contents() as $items){
            $data['kd_barang'] = $items['id'];
            $data['nm_barang'] = $items['name'];
            $data['stok'] = $this->model_app->getTambahStok($data['kd_barang'],$items['qty']);
            $data['harga'] = $items['price'];
        $this->model_master->updateBarang($data['kd_barang'],$data);
           
        }

        }

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('pembelian');
    }

//	  EDIT

	function edit_pembelian_barang(){
		$kd_barang = $this->input->post('kd_barang');
		$data=array(
			'kd_barang'=> $this->input->post('kd_barang'),
			'nm_barang'=>$this->input->post('nm_barang'),
			'qty'=>$this->input->post('qty'),
			'harga'=>$this->input->post('harga'),
		);
		$this->model_master->updatePembelianBarang($kd_barang,$data);
		
		$data=array(
			'kd_barang'=> $this->input->post('kd_barang'),
			'nm_barang'=>$this->input->post('nm_barang'),
			'qty'=>$this->input->post('qty'),
			'harga'=>$this->input->post('harga'),
		);
		$this->model_master->updateBarang($kd_barang,$data);
		
		$kd_pembelian = $this->model_app->getKodePembelianById($kd_barang);
		$total = $this->model_app->getTotalHargaPembelian($kd_pembelian);
		$data=array('total_harga' => $total);
		$this->model_master->updatePembelian($kd_pembelian,$data);
		
		redirect("pembelian");

	}

//    DELETE
    function hapus_barang(){
        $kd_pembelian= $this->uri->segment(3);
        $bc=$this->model_app->getSelectedData("tbl_pembelian",$kd_pembelian);
        foreach($bc->result() as $dph){
            $sess_data['kd_pembelian'] = $dph->kd_pembelian;
            $this->session->set_userdata($sess_data);
        }

        $kode = explode("/",$_GET['kode']);
        if($kode[0]=="tambah")
        {
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
        }
        else if($kode[0]=="edit")
        {
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
            $hps['kd_pembelian'] = $kode[2];
            $hps['kd_barang'] = $kode[3];
            $this->model_app->deleteData("tbl_pembelian_detail",$hps);

            $key_barang['kd_barang'] = $hps['kd_barang'];
            $d_u['qty'] = $kode[4]+$kode[5];
            $this->model_app->updateData("tbl_barang",$d_u,$key_barang);
        }
        redirect('pembelian/pages_edit/'.$this->session->userdata('kd_pembelian'));
    }

    function hapus(){
        $hapus['kd_pembelian'] = $this->uri->segment(3);
        $q = $this->model_app->getSelectedData("tbl_pembelian_detail",$hapus);
        foreach($q->result() as $d){
            $d_u['qty'] = $this->model_app->getKurangStok($d->kd_barang,$d->qty);
            $key['kd_barang'] = $d->kd_barang;
            $this->model_app->updateData("tbl_barang",$d_u,$key);
        }
        $this->model_app->deleteData("tbl_pembelian",$hapus);
        $this->model_app->deleteData("tbl_pembelian_detail",$hapus);
        redirect('pembelian');
    }
	function hapus_barang_pembelian(){
        $kd_barang = $this->uri->segment(3);
        $this->model_master->deleteBarang($kd_barang);
		$this->model_master->deletePembelian($kd_barang);
        redirect("pembelian");
    }
}
