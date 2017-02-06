<?php $this->load->view('subelement/v_navbar') ?>

<!-- /. NAV SIDE  -->
<div class="container spacer" >
    <h2 class="center" style="margin-bottom:0px; text-align: center;">Permohonan Cuti Pegawai</h2></br>

<div id="page-wrapper" >
    <div id="page-inner">
               
        <!-- /. ROW  -->
        <!-- <hr /> -->
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                            <thead>
                                <tr>
                                    <th>No Izin</th>
                                    <th>ID Pegawai</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Jam Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Tipe Cuti</th>
                                    <th>Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                $no = 1;
                                if (isset($cuti_pegawai)) {
                                    foreach ($cuti_pegawai as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->no_izin; ?></td>
                                            <td><?php echo $row->id_pegawai; ?></td>
                                            <td><?php echo $row->nm_pegawai; ?></td>
                                            <td><?php echo $row->divisi; ?></td>
                                            <td><?php echo date("d M Y", strtotime($row->tgl_mulai)); ?></td>
                                            <td><?php echo date("H:i:s", strtotime($row->jam_mulai)); ?></td>
                                            <td><?php echo date("d M Y", strtotime($row->tgl_selesai)); ?></td>
                                            <td><?php echo date("H:i:s", strtotime($row->jam_selesai)); ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><?php echo $row->deskripsi; ?></td>td>
                                            <td><?php echo $row->tipecuti; ?></td>
                                           
                                            <td>
                                                <a class="btn btn-mini" href="<?php echo site_url('c_cuti/terima_izin/' . $row->no_izin); ?>"
                                                   onclick="return confirm('Anda yakin mengizinkan cuti Saudara <?php echo $row->nm_pegawai; ?> ?')">YA</a>                 	
                                            		
                                                <a class="btn btn-mini" href="<?php echo site_url('c_cuti/tolak_izin/' . $row->no_izin); ?>"
                                                   onclick="return confirm('Anda yakin tidak mengizinkan cuti Saudara <?php echo $row->nm_pegawai; ?> ?')">TIDAK</a>                 	
                                            </td> 

                                        </tr>
                                        <?php
                                    }
                                }
                                ?> 


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
    <!-- /. ROW  -->           
    <!--  end  Context Classes  -->

    <!-- /. ROW  -->
    <hr>
    <div class="footer">
        <p>&copy; Copyright Kelompok 3 ERP-C (Informatika - FILKOM - Universitas Brawijaya)</p>
    </div>
    <!-- /. PAGE INNER  -->

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="http://localhost/simia/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="http://localhost/simia/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="http://localhost/simia/assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="http://localhost/simia/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="http://localhost/simia/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
                                                       $(document).ready(function () {
                                                           $('#dataTables-example').dataTable();
                                                       });
</script>
<!-- CUSTOM SCRIPTS -->
<script src="http://localhost/simia/assets/js/custom.js"></script>

</body>
</html>

