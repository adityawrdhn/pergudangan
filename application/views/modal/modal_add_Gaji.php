<!-- Modal -->
<div id="modalAddGaji" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Gaji</h3>
    </div>
    <div class="modal-body">
        <form id="frm" name="frm" class="form-horizontal" method="post" action="<?php echo site_url('Gaji/AddGajiPegawai')?>">
                                <input class="form-control" type="hidden" name="kd_gaji" id="" />

             <div class="control-group">
                <label class="control-label">Daftar Pegawai</label>
                <div class="controls">
                    <select id="kd_pegawai" class="chzn-select" name="kd_pegawai" value="" data-placeholder="Pilih Pegawai">
                        <option value=""></option>
                        <?php
                        if(isset($tbl_pegawai)){
                            foreach($tbl_pegawai as $row){
                                ?>
                                <option value="<?php echo $row->kd_pegawai?>"><?php echo $row->nama?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div id="tbl_pegawai" name="tbl_pegawai"></div>
            <hr/>
                    <div class="control-group">
                        <label class="control-label" >Tanggal Mulai</label>
                        <div class="controls">
                            <input name="tgl_mulai" id="tgl_mulai" id="tgl_mulai" type="date" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Tanggal Akhir</label>
                        <div class="controls">
                            <input name="tgl_akhir" id="tgl_akhir" id="tgl_selesai"type="date" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Gaji Pokok</label>
                        <div class="controls">
                            <input type="text" name="gaji_pokok" size="30" id="gaji" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Bonus</label>
                        <div class="controls">
                            <input type="text" name="bonus" size="30" required>
                        </div>
                    </div>
                    

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
            </div>

        </form>
    </div>
</div>

<script type="text/javascript">
    $("#kd_pegawai").change(function(){
        var kd_pegawai = $("#kd_pegawai").val();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url('gaji/get_data_pegawai'); ?>",
            data: "kd_pegawai="+kd_pegawai,
            cache:false,
            success: function(data){
                $('#tbl_pegawai').html(data);
                document.frm.add.disabled=false;
            }
        });
    });

</script>