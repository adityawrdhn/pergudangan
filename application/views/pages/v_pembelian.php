<?php $this->load->view('subelement/v_navbar')?>
<div class="container spacer">
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Pembelian</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th class="span3">
            <a href="<?php echo site_url('pembelian/pages_tambah_pembelian')?>" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data
            </a>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_pembelian)){
        foreach($data_pembelian as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo date("d M Y",strtotime($row->tanggal_pembelian)); ?></td>
                <td><?php echo $row->kd_pembelian; ?></td>
                <td><?php echo $row->jumlah; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('pembelian/detail_pembelian/'.$row->kd_pembelian)?>">
                        <i class="icon-eye-open"></i> View</a>
                    <a class="btn btn-mini" href="<?php echo site_url('pembelian/hapus/'.$row->kd_pembelian)?>"
                       onclick="return confirm('Anda Yakin ?');">
                        <i class="icon-trash"></i> Hapus</a>
                    <a class="btn btn-mini btnPrint" href="<?php echo site_url('cetak/print_pembelian/'.$row->kd_pembelian)?>">
                        <i class="icon-print"></i> Print</a>
                </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>
</div>


