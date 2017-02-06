<?php
class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //    KODE PENJUALAN
    public function getKodePenjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_penjualan,3)) as kd_max from tbl_penjualan_header");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PJ-".$kd;
    }
	//KODE PEMBELIAN
	public function getKodePembelian()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pembelian,3)) as kd_max from tbl_pembelian");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PB-".$kd;
    }
	
	public function getKodeSupplierById($id)
	{
		$data = $this->model_app->manualQuery("select c.kd_supplier from tbl_barang a 
		right join tbl_pembelian_detail b 
		on a.kd_barang = b.kd_barang 
		join tbl_pembelian c 
		on b.kd_pembelian = c.kd_pembelian
		where a.kd_barang = '$id'
		")->result();
		foreach($data as $d)
        {
            $kd_supplier = $d->kd_supplier;
        }
		return $kd_supplier;
	}
	
	public function getKodePembelianById($id)
	{
		$data = $this->model_app->manualQuery("select b.kd_pembelian from tbl_barang a 
		right join tbl_pembelian_detail b 
		on a.kd_barang = b.kd_barang 
		join tbl_pembelian c 
		on b.kd_pembelian = c.kd_pembelian
		where a.kd_barang = '$id'
		")->result();
		foreach($data as $d)
        {
            $kd_pembelian = $d->kd_pembelian;
        }
		return $kd_pembelian;
	}
    public function getTambahStok($kd_barang,$tambah)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }
    public function getKurangStok($kd_barang,$kurangi)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok - $kurangi;
        }
        return $stok;
    }
	public function getTambahJumlahBarangRusak($kd_barang,$tambah)
    {
        $q = $this->db->query("select jumlah_barang_rusak from tbl_barang_rusak where kd_barang='".$kd_barang."'");
        $jumlah = "";
        foreach($q->result() as $d)
        {
            $jumlah = $d->jumlah_barang_rusak + $tambah;
        }
        return $jumlah;
    }
    public function getKembalikanStok($kd_barang)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok;
        }
        return $stok;
    }
	public function getTotalHargaPembelian($kd_pembelian)
    {
        $q = $this->db->query("select sum(qty*harga) as total from tbl_pembelian_detail where kd_pembelian='".$kd_pembelian."'");
        foreach($q->result() as $d)
        {
            $total = $d->total;
        }
        return $total;
    }

    public function getAllData($table)
    {
        return $this->db->get($table);
    }

    public function getAllDataLimited($table,$limit,$offset)
    {
        return $this->db->get($table, $limit, $offset);
    }

    public function getSelectedDataLimited($table,$data,$limit,$offset)
    {
        return $this->db->get_where($table, $data, $limit, $offset);
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function manualQuery($q)
    {
        return $this->db->query($q);
    }
}