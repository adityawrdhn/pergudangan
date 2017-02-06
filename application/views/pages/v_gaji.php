<?php $this->load->view('subelement/v_navbar') ?>

<!-- /. NAV SIDE  -->
<div class="container spacer" >
    <h2 class="center" style="margin-bottom:0px; text-align: center;">Gaji Pegawai</h2></br>

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
                                    <th>Kode Gaji</th>
                                    <th>Nama Pegawai</th>
                                    <th>Periode</th>
                                    <th>Gaji</th>
                                    <th>Bonus</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                $no = 1;
                                if (isset($tb_gaji)) {
                                    foreach ($tb_gaji as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->kd_gaji; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo date("d M Y", strtotime($row->tgl_mulai)); ?>/<?php echo date("d M Y", strtotime($row->tgl_akhir)); ?>
                                            </td>
                                            <td><?php echo $row->gaji_pokok; ?></td>
                                            <td><?php echo $row->bonus; ?></td>
                                            <td><?php echo $row->status; ?></td>

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

