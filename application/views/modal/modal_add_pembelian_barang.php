<!-- Modal -->
<div id="modalAddPembelianBarang" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Data Barang</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url('pembelian/tambah_pembelian_to_cart')?>">

            <div class="control-group">
                <label class="control-label">Pilih Barang</label>
                <div class="controls">
                    <select id="kd_barang" class="chzn-select" name="kd_barang" value="" data-placeholder="Pilih Barang">
                        <option value=""></option>
                        <?php
                        if(isset($data_barang)){
                            foreach($data_barang as $row){
                                ?>
                                <option value="<?php echo $row->kd_barang?>"><?php echo $row->nm_barang?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
<!--                 <div class="controls">
                    <input name="kd_barang" type="text" placeholder="Input Kode Barang..." required>*Kode Barang tidak boleh sama
                </div>
 -->        </div>

            <div id="detail_barang" name="detail_barang"></div>
<!--             <div class="control-group">
                <label class="control-label" >Nama Barang</label>
                <div class="controls">
                    <input name="nm_barang" type="text" placeholder="Input Nama Barang..."required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >Stok</label>
                <div class="controls">
                    <input name="qty" type="text" placeholder="Input Stok..."required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Harga</label>
                <div class="controls">
                    <input name="harga" type="text" placeholder="Input Harga..."required>
                </div>
            </div>
 -->
<!--            ACTION BUTTON -->
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="submit"class="btn btn-primary" >Save</button>
            </div>

        </form>
    </div>

</div>
<script type="text/javascript">
    $("#kd_barang").change(function(){
        var kd_barang = $("#kd_barang").val();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url('pembelian/get_detail_barang'); ?>",
            data: "kd_barang="+kd_barang,
            cache:false,
            success: function(data){
                $('#detail_barang').html(data);
                document.frm.add.disabled=false;
            }
        });
    });

</script>