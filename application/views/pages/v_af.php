<?php $this->load->view('subelement/v_navbar')?>

<!--================ Content Wrapper===========================================-->
<div class="container spacer">

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Penjualan</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th></th>
        <th>Status</th>
       
        <th>Update Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_penjualan)){
        foreach($data_penjualan as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo date("d M Y",strtotime($row->tanggal_penjualan)); ?></td>
                <td><?php echo $row->kd_penjualan; ?></td>
                <td><?php echo $row->jumlah; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->kd_penjualan)?>">
                        <i class="icon-eye-open"></i> View</a>
                    <a class="btn btn-mini btnPrint" href="<?php echo site_url('cetak/print_penjualan/'.$row->kd_penjualan)?>">
                        <i class="icon-print"></i> Print</a>
                </td>
                  <td><?php echo $row->status; ?></td>
                  <td>
                 <a class="btn btn-mini" href="<?php echo site_url('af/status_terbayar/' . $row->kd_penjualan); ?>"
                           onclick="return confirm('Anda yakin?')"> 
                            <i class="icon-upload"></i> Terbayar</a>
                       
                  </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>



</div>