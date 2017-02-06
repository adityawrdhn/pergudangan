<?php
class Barang_Rusak extends CI_Controller{
	
	private $kd_barang, $data;
	
    function __construct(){
        parent::__construct();

        $this->load->model('model_app');
        $this->load->model('model_master');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
			'title'=>'Barang Rusak',
            'active_barang_rusak'=>'active',
            'data_barang_rusak'=>$this->model_master->getAllBarangRusak(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_barang_rusak');
        $this->load->view('element/v_footer',$data);
    }

//    GET DATA
    
    function detail_barang_rusak(){
        $kd_barang= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Barang Rusak',
            'active_barang_rusak'=>'active',

            'dt_barang_rusak'=>$this->model_app->manualQuery("
                SELECT * from tbl_barang_rusak a
                left join tbl_supplier b
                on a.kd_supplier=b.kd_supplier
				left join tbl_pembelian c
                on a.kd_pembelian=c.kd_pembelian
                where a.kd_barang = '$kd_barang'
            ")->result(),

            'barang_rusak'=>$this->model_app->manualQuery("
                select a.kd_barang,a.kd_supplier,a.kd_pembelian,b.jumlah_barang_rusak from tbl_barang_rusak a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_barang_rusak = '$kd_barang'
            ")->result(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_detail_barang_rusak');
        $this->load->view('element/v_footer',$data);
    }

    function get_detail_barang(){
        $kd_barang=$this->input->post('kd_barang');
        $data=array(
            'detail_barang'=>$this->model_master->getBarangById($kd_barang),
        );
        $this->load->view('pages/ajax_detail_barang_rusak',$data);
    }


//    INSERT DATA
   
    function tambah_barang_rusak(){
		$kode_barang_rusak = $this->input->post('kd_barang');
       	$d_detail['kd_barang'] = $kode_barang_rusak;
		$d_detail['kd_pembelian'] = $this->model_app->getKodePembelianById($kode_barang_rusak);
       	$d_detail['kd_supplier'] = $this->model_app->getKodeSupplierById($kode_barang_rusak);
		$d_detail['jumlah_barang_rusak'] = $this->input->post('qty');

        $this->model_app->insertData("tbl_barang_rusak",$d_detail);

        $d_u['stok'] = $this->model_app->getKurangStok($d_detail['kd_barang'],$d_detail['jumlah_barang_rusak']);
        $key['kd_barang'] = $d_detail['kd_barang'];
        $this->model_app->updateData("tbl_barang",$d_u,$key);
			
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('barang_rusak');
    }



//    DELETE
    function hapus_barang(){
        $kd_barang= $this->uri->segment(3);
        $bc=$this->model_app->getSelectedData("tbl_barang_rusak_header",$kd_barang);
        foreach($bc->result() as $dph){
            $sess_data['kd_barang_rusak'] = $dph->kd_barang_rusak;
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
            $hps['kd_barang_rusak'] = $kode[2];
            $hps['kd_barang'] = $kode[3];
            $this->model_app->deleteData("tbl_barang_rusak_detail",$hps);

            $key_barang['kd_barang'] = $hps['kd_barang'];
            $d_u['stok'] = $kode[4]+$kode[5];
            $this->model_app->updateData("tbl_barang",$d_u,$key_barang);
        }
        redirect('barang_rusak/pages_edit/'.$this->session->userdata('kd_barang_rusak'));
    }

    function hapus(){
        $hapus['kd_barang'] = $this->uri->segment(3);
        $q = $this->model_app->getSelectedData("tbl_barang_rusak",$hapus);
        foreach($q->result() as $d){
            $d_u['stok'] = $this->model_app->getTambahStok($d->kd_barang,$d->jumlah_barang_rusak);
            $key['kd_barang'] = $d->kd_barang;
            $this->model_app->updateData("tbl_barang",$d_u,$key);
        }
        $this->model_app->deleteData("tbl_barang_rusak",$hapus);
        redirect('barang_rusak');
    }
	 function edit_barang_rusak(){
        $kode_barang_rusak = $this->input->post('kd_barang');
        $d_detail['kd_barang'] = $kode_barang_rusak;
        $d_detail['kd_pembelian'] = $this->model_app->getKodePembelianById($kode_barang_rusak);
        $d_detail['kd_supplier'] = $this->model_app->getKodeSupplierById($kode_barang_rusak);
        $d_detail['jumlah_barang_rusak'] = $this->input->post('qty');

        $this->model_app->insertData("tbl_barang_rusak",$d_detail);

        $d_u['stok'] = $this->model_app->getKurangStok($d_detail['kd_barang'],$d_detail['jumlah_barang_rusak']);
        $key['kd_barang'] = $d_detail['kd_barang'];
        $this->model_app->updateData("tbl_barang",$d_u,$key);
            
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('barang_rusak');
    }
    //     $kd_barang = $this->input->post('kd_barang');
    //     $data=array(
    //         'jumlah_barang_rusak'=>$this->input->post('jumlah_barang_rusak')
    //     );
    //     $this->model_app->getTambahJumlahBarangRusak($kd_barang,$data);
    //     $this->model_app->getKurangStok($kd_barang,$data);
    //     redirect('barang_rusak');
    // }
}
