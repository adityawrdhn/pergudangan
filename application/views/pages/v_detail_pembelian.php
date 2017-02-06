<?php $this->load->view('subelement/v_navbar')?>
<?php $this->load->view('modal/modal_add_pembelian_barang')?>
<?php $this->load->view('modal/modal_edit_pembelian_barang')?>
<!--========================= Content Wrapper ==============================-->
<!-- <div class="container spacer"> -->
<div class="container spacer">

    <div class="well">
        <h4 class="alert alert-info" style="text-align: center">Keterangan</h4>
        <div class="row-fluid">
            <?php if(isset($dt_pembelian)){
                foreach($dt_pembelian as $row){
                    ?>
                    <div class="span6">
                        <dl class="dl-horizontal">
                            <dt>Kode Pembelian :</dt>
                            <dd><?php echo $row->kd_pembelian?></dd>
                            <br/>
                            <dt>Tanggal Pembelian :</dt>
                            <dd><?php echo date("d M Y",strtotime($row->tanggal_pembelian));?></dd>
                            <br/>
                            <dt>Total Harga :</dt>
                            <dd><strong><u><?php echo $row->total_harga; ?></u></strong></dd>
                        </dl>
                    </div>
                    <div class="span6">
                        <dl class="dl-horizontal">
                            <dt>Pegawai :</dt>
                            <dd><?php echo $row->nama?></dd>
							<dt>Supplier :</dt>
                            <dd><?php echo $row->nm_supplier?></dd>
                        </dl>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>


    <div class="well">
        <h4 class="alert alert-info" style="text-align: center"> Daftar Barang</h4>
        <div class="row-fluid">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
					<th>Kode Pembelian</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
					<th>Operasi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
							<td><?php echo $row->kd_pembelian?></td>
                            <td><?php echo $row->kd_barang?></td>
                            <td><?php echo $row->nm_barang?></td>
                            <td><?php echo $row->qty?></td>
                            <td><?php echo currency_format($row->harga)?></td>
							<td>
							<a class="btn btn-mini" href="#modalEditPembelianBarang<?php echo $row->kd_barang?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
							<a class="btn btn-mini" href="<?php echo site_url('pembelian/hapus_barang_pembelian/'.$row->kd_barang);?>"
							   onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
							</td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>

            <div class="form-actions">
                <a href="<?php echo site_url('pembelian')?>" class="btn btn-inverse">
                    <i class="icon-circle-arrow-left icon-white"></i> Back
                </a>
            </div>
        </div>
    </div>


</div>



