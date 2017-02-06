
<!-- Modal -->
<?php
if (isset($tbl_penjualan_header)){
    foreach($tbl_penjualan_header as $row){
        ?>
        


             
        <div id="modalEditStatus<?php echo $row->kode_penjualan?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
         	<div class="modal-content">
         <div class="modal-header">         	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Status Pemesanan</h3>
            </div>
            
            <div class="modal-body">      
                <form class="form-horizontal" method="post" action="<?php echo site_url('penjualan/edit_status')?>">
                    <div class="control-group">
                        <label class="control-label" >Kode Penjualan</label>
                        <div class="controls">
                            <input name="kode_penjualan" type="text" value="<?php echo $row->kode_penjualan?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Jumlah</label>
                        <div class="controls">
                            <input name="jumlah" type="text" value="<?php echo $row->jumlah?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Total Harga</label>
                        <div class="controls">
                            <input name="golongan_darah" type="text" value="<?php echo $row->total_harga?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>

                    <hr/>
                    <div class="control-group">
                        <label class="control-label">Status Pemesanan</label>
                        <div class="controls">
                    <select name="status" id="status">
                        <option value=""> = Pilih Status = </option>
                        <option value="menunggu">Menunggu</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
						<option value="gagal">Gagal</option>
                    </select>
                </div>
                    </div>
</div>
<div class="modal-footer">
	  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                       <button class="btn btn-primary">Save</button>
                    </div>

                </form>
                </div>
            </div>
        </div>
    <?php }
}
?>