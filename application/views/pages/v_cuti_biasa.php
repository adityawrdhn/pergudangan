<?php $this->load->view('subelement/v_navbar') ?>
<div class="container spacer" >
    <h2 class="center" style="margin-bottom:0px; text-align: center">Permohonan Cuti Pegawai</h2></br>
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
                                            <td><?php echo $row->deskripsi; ?></td>
                                            <td><?php echo $row->tipecuti; ?></td>
                                          
                                        </tr>
                                        <?php
                                    }
                                }
                                ?> 
                            </tbody>
    </table>
</div>

<hr>
    <div class="footer">
            <p>&copy; Copyright Kelompok 3 ERP-C (Informatika - FILKOM - Universitas Brawijaya)</p>
        </div>
    <!-- /. PAGE INNER  -->

<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.printPage.js')?>"></script>

<script>
                                                       $(document).ready(function () {
                                                           $('#dataTables-example').dataTable();
                                                       });
</script>
<!-- CUSTOM SCRIPTS -->
</body>
</html>
