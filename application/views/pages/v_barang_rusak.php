<?php $this->load->view('subelement/v_navbar')?>
<?php $this->load->view('modal/modal_add_barang_rusak')?>
<?php $this->load->view('modal/modal_edit_barang_rusak')?>
<div class="container spacer">

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Kode Pembelian</th>
                <th>Kode Supplier</th>
                <th>Jumlah Barang Rusak</th>
                <th class="span3">
                    <a href="#modalAddBarangRusak" class="btn btn-inverse btn-block" data-toggle="modal">
                        <i class="icon-th icon-plus-sign icon-white"></i> Tambah Barang
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
           <?php
    		$no=1;
    		if(isset($data_barang_rusak)){
   			foreach($data_barang_rusak as $row){
    		?>
    		<tr>
        		<td><?php echo $no++; ?></td>
        		<td><?php echo $row->kd_barang; ?></td>
        		<td><?php echo $row->kd_pembelian; ?></td>
		  		<td><?php echo $row->kd_supplier; ?></td>
		    	<td><?php echo $row->jumlah_barang_rusak; ?></td>
		        <td>
        		    <!-- <a class="btn btn-mini" href="#modalEditBarangRusak<?php echo $row->kd_barang?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a> -->
            		<a class="btn btn-mini" href="<?php echo site_url('barang_rusak/hapus/'.$row->kd_barang);?>"
               		onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
        		</td>
    		</tr>

    		<?php }
    		}
    		?>

            </tbody>
        </table></div>