<?php $this->load->view('modal/modal_edit_status')?>
<?php $this->load->view('subelement/v_navbar')?>


<!--================ Content Wrapper===========================================-->
<div class="container spacer">

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Penjualan</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
		<th class="span3">
            <a href="<?php echo site_url('penjualan/pages_tambah_penjualan')?>" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data
            </a>
        </th>
		<th>Status</th>
		<th>Edit Status </th>
    </tr>
	
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_penjualan)){
        foreach($data_penjualan as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo date("d M Y",strtotime($row->tanggal_penjualan)); ?></td>
                <td><?php echo $row->kd_penjualan; ?></td>
                <td><?php echo $row->jumlah; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->kd_penjualan)?>">
                        <i class="icon-eye-open"></i> View</a>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/hapus/'.$row->kd_penjualan)?>"
                       onclick="return confirm('Anda Yakin ?');">
                        <i class="icon-trash"></i> Hapus</a>
                    <a class="btn btn-mini btnPrint" href="<?php echo site_url('cetak/print_penjualan/'.$row->kd_penjualan)?>">
                        <i class="icon-print"></i> Print</a>
                </td>
				<td><?php echo $row->status; ?></td>
				<td>
					<a class="btn btn-mini" href="<?php echo site_url('penjualan/status_proses/'.$row->kd_penjualan);?>"
                       onclick="return confirm('Anda yakin?')"> 
					  <i class="icon-upload"></i> Proses</a>
					<a class="btn btn-mini" href="<?php echo site_url('penjualan/status_selesai/'.$row->kd_penjualan);?>"
                       onclick="return confirm('Anda yakin?')"> 
					  <i class="icon-upload"></i> Selesai</a>
					<a class="btn btn-mini" href="<?php echo site_url('penjualan/status_batal/'.$row->kd_penjualan);?>"
                       onclick="return confirm('Anda yakin?')"> 
					  <i class="icon-upload"></i> Batal</a>  
					  
				</td>
				
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });
    })
</script>



