<?php
class Model_master extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//  ================= CREATE CODE ==================
    //    KODE BARANG
    function getKodeBarang()
	{
        $q = $this->db->query("select MAX(RIGHT(kd_barang,3)) as kd_max from tbl_barang");
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
        return "B-".$kd;
    }

    //    KODE PELANGGAN
    public function getKodeSupplier(){
        $q = $this->db->query("select MAX(RIGHT(kd_supplier,3)) as kd_max from tbl_supplier");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "SP-".$kd;
    }

    //    KODE PEGAWAI
    public function getKodePegawai(){
        $q = $this->db->query("select MAX(RIGHT(kd_pegawai,3)) as kd_max from tbl_pegawai");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "K-".$kd;
    }

//  ============= GET DATA =================
    function getAllBarang(){
        return $this->db->query("select * from tbl_barang ")->result();
    }
	function getAllBarangRusak(){
        return $this->db->query("select * from tbl_barang_rusak ")->result();
    }
    function getAllSupplier(){
        return $this->db->query("select * from tbl_supplier ")->result();
    }
    function getAllContact(){
        return $this->db->query("select * from tbl_contact ")->result();
    }
    function getAllPegawai(){
        return $this->db->query("select * from tbl_pegawai ")->result();
    }

//  =========== GET DATA BY ID ============
    public function getBarangById($id){
        $this->db->where('kd_barang',$id);
        $query = $this->db->get('tbl_barang');
        return $query->result();
    }
    public function getSupplierById($id){
        $this->db->where('kd_supplier',$id);
        $query = $this->db->get('tbl_supplier');
        return $query->result();
    }
    public function getPegawaiById($id){
        $this->db->where('kd_pegawai',$id);
        $query = $this->db->get('tbl_pegawai');
        return $query->result();
    }


//  ============ INSERT DATA ==============
    function insertBarang($data){
       $this->db->insert("tbl_barang",$data);
       return $query;
    }
	function insertPembelianDetail($data){
        $query = $this->db->insert('tbl_pembelian_detail',$data);
        return $query;
    }
    function insertSupplier($data){
        $query = $this->db->insert('tbl_supplier',$data);
        return $query;
    }
    function insertPegawai($data){
        $query = $this->db->insert('tbl_pegawai',$data);
        return $query;
    }
    function insertGaji($data){
        $query = $this->db->insert('tb_gaji',$data);
        return $query;
    }


//  =========== UPDATE DATA ==============
    function updatePembelianBarang($id,$data){
        $this->db->where('kd_barang',$id);
        $update = $this->db->update('tbl_pembelian_detail',$data);
        return $update;
    }
	function updatePembelian($id,$data){
        $this->db->where('kd_pembelian',$id);
        $update = $this->db->update('tbl_pembelian',$data);
        return $update;
    }
	function updateBarang($id,$data){
        $this->db->where('kd_barang',$id);
        $update = $this->db->update('tbl_barang',$data);
        return $update;
    }
	function updateBarangRusak($id,$data){
        $this->db->where('kd_barang',$id);
        $update = $this->db->update('tbl_barang_rusak',$data);
        return $update;
    }
    function updateSupplier($id,$data){
        $this->db->where('kd_supplier',$id);
        $update = $this->db->update('tbl_supplier',$data);
        return $update;
    }
    function updateContact($id,$data){
        $this->db->where('id',$id);
        $update = $this->db->update('tbl_contact',$data);
        return $update;
    }
    function updatePegawai($id,$data){
        $this->db->where('kd_pegawai',$id);
        $update = $this->db->update('tbl_pegawai',$data);
        return $update;
    }
	function updateStatus($id,$data){
        $this->db->where('kd_penjualan',$id);
        $update = $this->db->update('tbl_penjualan_header',$data);
        return $update;
    }
//  ========== DELETE DATA ================
    function deleteBarang($id){
        $this->db->where('kd_barang',$id);
        $delete = $this->db->delete('tbl_barang');
        return $delete;
    }
	function deletePembelian($id){
        $this->db->where('kd_barang',$id);
        $delete = $this->db->delete('tbl_pembelian_detail');
        return $delete;
    }
    function deleteSupplier($id){
        $this->db->where('kd_supplier',$id);
        $delete = $this->db->delete('tbl_supplier');
        return $delete;
    }
    function deletePegawai($id){
        $this->db->where('kd_pegawai',$id);
        $delete = $this->db->delete('tbl_pegawai');
        return $delete;
    }

 function manualQuery($q)
    {
        return $this->db->query($q);
    }
    
     function updateStatusIzin($id,$data) {
        $this->db->where('no_izin',$id);
        $update = $this->db->update('cuti_pegawai',$data);
        return $update;
    }
     function updateStatusGaji($id,$data) {
        $this->db->where('kd_gaji',$id);
        $update = $this->db->update('tb_gaji',$data);
        return $update;
    }
    function setGaji($id,$data) {
        $this->db->where('kd_gaji',$id);
        $update = $this->db->update('tb_gaji',$data);
        return $update;
    }
    function createIzin($data){
        $query = $this->db->insert('cuti_pegawai',$data);
        return $query;
    }
    
}