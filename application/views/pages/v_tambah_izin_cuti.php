<?php $this->load->view('subelement/v_navbar') ?>
<!-- /. NAV SIDE  -->
<div class="container spacer" >
    <h2 class="center" style="margin-bottom:0px; text-align: center">Buat Permohonan Izin Cuti</h2></br>
            <div class=" panel panel-default">
                <?php
    
    if(isset($tbl_pegawai)){
        foreach($tbl_pegawai as $peg){
            ?>

                                <?php echo form_open(base_url('c_tambah_cuti/tambah_izin')); ?>
                                <br />
                                <label>ID Pegawai</label><br>
                                <input class="form-control" type="text" name="id_pegawai" id="id_pegawai" value="<?php echo $peg->kd_pegawai; ?>" class="uneditable-input" readonly="true"/><br>
                                <label>Nama</label><br>
                                <input class="form-control" type="text" name="nm_pegawai" id="nm_pegawai"  value="<?php echo $peg->nama; ?>" class="uneditable-input" readonly="true"/><br>
                                <label>Divisi</label>
                                <input class="form-control" id="divisi" type="text" name="divisi" value="<?php echo $peg->level; ?>" class="uneditable-input" readonly="true"/><br>
                                <label>Tanggal Mulai</label>
                                <input class="form-control" name="tgl_mulai" id="tgl_mulai" type="date" required/>
                                <br>
                                <label>Jam Mulai</label>
                                <input class="form-control" name="jam_mulai" id="jam_mulai" type="time" required/>
                                <br>
                                 <label>Tanggal Selesai</label>
                                <input class="form-control" name="tgl_selesai" id="tgl_selesai" type="date" required/>
                                <br>
                                <label>Jam Selesai</label>
                                <input class="form-control" name="jam_selesai" id="jam_selesai" type="time" required/>
                                <br>
            </div>
            <div class=" panel panel-default">
                                <td><?php echo form_label('Tipe Cuti', 'tipecuti')?></td>
                                            <td colspan="2"><?php $row = array(
                                                '' => 'Tipe Cuti',
                                                'Cuti Hamil' => 'Cuti Hamil',
                                                'Cuti Sakit' => 'Cuti Sakit',
                                                'Cuti Libur' => 'Cuti Libur'
                                                );
                                                echo form_dropdown('tipecuti', $row, 'Tipe Cuti'); ?></td>
                                </br>
                                <label>Deskripsi</label><br>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="9" required></textarea>


                                <br />   <button class="btn btn-danger square-btn-adjust" type="submit">Simpan</button>						
                                <?php echo form_close(); ?>
              <?php }
    }
    ?>
      </div>
        
</div>
<hr>
      <div class="footer">
        <p>&copy; Copyright Kelompok 3 ERP-C (Informatika - FILKOM - Universitas Brawijaya)</p>
    </div>
              <!-- /. WRAPPER  -->
                <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
                <!-- JQUERY SCRIPTS -->
                <script src="http://localhost/simia/assets/js/jquery-1.10.2.js"></script>
                <!-- BOOTSTRAP SCRIPTS -->
                <script src="http://localhost/simia/assets/js/bootstrap.min.js"></script>
                <!-- METISMENU SCRIPTS -->
                <script src="http://localhost/simia/assets/js/jquery.metisMenu.js"></script>
                <!-- CUSTOM SCRIPTS -->
                <script src="http://localhost/simia/assets/js/custom.js"></script>

                <script src="http://localhost/simia/assets/js/pemesanan.js"></script>


                </body>
                </html>
