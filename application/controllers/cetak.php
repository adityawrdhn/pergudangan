<?php
class Cetak extends CI_Controller{
	
	private $kd_penjualan, $kd_pembelian, $data;
	
    function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        $this->load->model('model_master');
        $this->load->helper('currency_format_helper');
    }

    function print_penjualan(){
        $kd_penjualan=$this->uri->segment(3);
        $data=array(
            'title'=>'Penjualan',
            'dt_contact'=>$this->model_master->getAllContact(),
            'dt_penjualan'=>$this->model_app->manualQuery("
                SELECT * from tbl_penjualan_header a
                left join tbl_pegawai c
                on a.kd_pegawai=c.kd_pegawai
                where a.kd_penjualan = '$kd_penjualan'
            ")->result(),
            'barang_jual'=>$this->model_app->manualQuery("
                select a.kd_barang,a.qty,b.nm_barang,b.harga from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$kd_penjualan'
            ")->result(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('subelement/v_print_penjualan');
    }
	
	function print_pembelian(){
        $kd_pembelian=$this->uri->segment(3);
        $data=array(
            'title'=>'Pembelian',
            'dt_contact'=>$this->model_master->getAllContact(),
            'dt_pembelian'=>$this->model_app->manualQuery("
                SELECT * from tbl_pembelian a
                left join tbl_supplier b
                on a.kd_supplier=b.kd_supplier
                left join tbl_pegawai c
                on a.kd_pegawai=c.kd_pegawai
                where a.kd_pembelian = '$kd_pembelian'
            ")->result(),
            'barang_beri'=>$this->model_app->manualQuery("
                select a.kd_barang,a.qty,b.nm_barang,b.harga from tbl_pembelian_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_pembelian = '$kd_pembelian'
            ")->result(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('subelement/v_print_pembelian');
    }

}