<?php

class af_delivery extends CI_Controller {

    private $kd_penjualan, $kd_barang, $data;

    function __construct() {
        parent::__construct();

        $this->load->model('model_app');
        $this->load->model('model_master');
        $this->load->helper('currency_format_helper');
    }

    function index() {
        $data = array(
            'title' => 'Penjualan Barang',
            'active_penjualan' => 'active',
            'data_penjualan' => $this->model_app->manualQuery("SELECT a.kd_penjualan,  a.tanggal_penjualan,a.total_harga,
			(select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan)
			as jumlah, a.status from tbl_penjualan_header a ORDER BY a.kd_penjualan DESC")->result(),
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_af_delivery');
        $this->load->view('element/v_footer', $data);

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function tampil_anggaran() {
        $data = array(
            'title' => 'Penjualan Barang',
            'active_keuangan' => 'active',
            'data_anggaran' => $this->model_app->manualQuery("SELECT a.tanggal,  a.kredit, a.debit,
			a.saldo from anggaran a")->result(),
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_af_anggaran');
        $this->load->view('element/v_footer', $data);
    }

    function detail_penjualan() {
        $kd_penjualan = $this->uri->segment(3);
        $data = array(
            'title' => 'Detail Penjualan Barang',
            'active_penjualan' => 'active',
            'dt_penjualan' => $this->model_app->manualQuery("
                SELECT * from tbl_penjualan_header a
                left join tbl_pegawai c
                on a.kd_pegawai=c.kd_pegawai
                where a.kd_penjualan = '$kd_penjualan'
            ")->result(),
            'barang_jual' => $this->model_app->manualQuery("
                select a.kd_barang,a.qty,b.nm_barang,b.harga from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$kd_penjualan'
            ")->result(),
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_detail_penjualan');
        $this->load->view('element/v_footer', $data);
    }

    function get_detail_barang() {
        $kd_barang = $this->input->post('kd_barang');
        $data = array(
            'detail_barang' => $this->model_master->getBarangById($kd_barang),
        );
        $this->load->view('pages/ajax_detail_barang', $data);
    }

//    DELETE
    function hapus_barang() {
        $kd_penjualan = $this->uri->segment(3);
        $bc = $this->model_app->getSelectedData("tbl_penjualan_header", $kd_penjualan);
        foreach ($bc->result() as $dph) {
            $sess_data['kd_penjualan'] = $dph->kd_penjualan;
            $this->session->set_userdata($sess_data);
        }

        $kode = explode("/", $_GET['kode']);
        if ($kode[0] == "tambah") {
            $data = array(
                'rowid' => $kode[1],
                'qty' => 0
            );
            $this->cart->update($data);
        } else if ($kode[0] == "edit") {
            $data = array(
                'rowid' => $kode[1],
                'qty' => 0
            );
            $this->cart->update($data);
            $hps['kd_penjualan'] = $kode[2];
            $hps['kd_barang'] = $kode[3];
            $this->model_app->deleteData("tbl_penjualan_detail", $hps);

            $key_barang['kd_barang'] = $hps['kd_barang'];
            $d_u['stok'] = $kode[4] + $kode[5];
            $this->model_app->updateData("tbl_barang", $d_u, $key_barang);
        }
        redirect('penjualan/pages_edit/' . $this->session->userdata('kd_penjualan'));
    }

    function hapus() {
        $hapus['kd_penjualan'] = $this->uri->segment(3);
        $q = $this->model_app->getSelectedData("tbl_penjualan_detail", $hapus);
        foreach ($q->result() as $d) {
            $d_u['stok'] = $this->model_app->getTambahStok($d->kd_barang, $d->qty);
            $key['kd_barang'] = $d->kd_barang;
            $this->model_app->updateData("tbl_barang", $d_u, $key);
        }
        $this->model_app->deleteData("tbl_penjualan_header", $hapus);
        $this->model_app->deleteData("tbl_penjualan_detail", $hapus);
        redirect('penjualan');
    }

    // UPDATE STATUS
    function status_terbayar() {
        $kd_penjualan = $this->uri->segment(3);
        $data = array(
            'status' => "Terbayar"
        );
        $this->model_master->updateStatus($kd_penjualan, $data);
		redirect("af");
		}
	function status_terkirim() {
        $kd_penjualan = $this->uri->segment(3);
        $data = array(
            'status' => "Terkirim"
        );
        $this->model_master->updateStatus($kd_penjualan, $data);
      
//        $d_detail['kd_barang'] = $kode_barang_rusak;
//        $d_detail['kd_pembelian'] = $this->model_app->getKodePembelianById($kode_barang_rusak);
//        $d_detail['kd_supplier'] = $this->model_app->getKodeSupplierById($kode_barang_rusak);
//        $d_detail['jumlah_barang_rusak'] = $this->input->post('qty');
//
//        $this->model_app->insertData("tbl_barang_rusak", $d_detail);
//
//        $d_u['saldo'] = $this->model_app->getTambahSaldo($d_detail['jumlah_barang_rusak']);
//        $key['kd_barang'] = $d_detail['kd_barang'];
//        $this->model_app->updateData("tbl_barang", $d_u, $key);
//
//        $this->session->unset_userdata('limit_add_cart');
//        $this->cart->destroy();
//        redirect('barang_rusak');
        redirect("af_delivery");
    }

}

