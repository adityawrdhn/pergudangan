<?php
if (isset($tb_gaji)){
    foreach($tb_gaji as $row){
        ?>
        <div id="modalSetGaji<?php echo $row->kd_gaji?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Set Gaji Pegawai</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo site_url('gaji/setgaji')?>">
                    <div class="control-group">
                        <label class="control-label">Kode Gaji</label>
                        <div class="controls">
                            <input name="kd_gaji" type="text" value="<?php echo $row->kd_gaji; ?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kode Pegawai</label>
                        <div class="controls">
                            <input name="kd_pegawai" type="text" value="<?php echo $row->kd_pegawai; ?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Nama</label>
                        <div class="controls">
                            <input name="nama" type="text" value="<?php echo $row->nama?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Divisi</label>
                        <div class="controls">
                            <input name="divisi" type="text" value="<?php echo $row->divisi?>" class="uneditable-input" readonly="true">
                        </div>
                    </div>

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
                    <!--            ACTION BUTTON -->
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    <?php }
}
?>