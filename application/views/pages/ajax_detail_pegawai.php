<?php
if(isset($tbl_pegawai)){
    foreach($tbl_pegawai as $row){
        ?>

        <div class="control-group">
            <label class="control-label">Kode Pegawai</label>
            <div class="controls">
                <input name="kd_pegawai" type="text" value="<?php echo $row->kd_pegawai; ?>" readonly="readonly">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nama Pegawai</label>
            <div class="controls">
                <input name="nama" type="text" value="<?php echo $row->nama; ?>" readonly="readonly">
            </div>
        </div>

        <div class="control-group ">
            <label class="control-label">Divisi</label>
            <div class="controls ">
                <input name="divisi" type="text" value="<?php echo $row->level; ?>" readonly="readonly">
            </div>
        </div>
    <?php
    }
}
?>
