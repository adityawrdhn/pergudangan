
<?php $this->load->view('modal/modal_add_supplier')?>
<?php $this->load->view('modal/modal_edit_supplier')?>
</br>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Supplier</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>Email</th>
        <th class="span2">
            <a href="#modalAddSupplier" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data
            </a>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_supplier)){
        foreach($data_supplier as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_supplier; ?></td>
                <td><?php echo $row->nm_supplier; ?></td>
                <td><?php echo $row->alamat; ?></td>
                <td><?php echo $row->email; ?></td>
                <td>
                    <a class="btn btn-mini" href="#modalEditSupplier<?php echo $row->kd_supplier?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
                    <a class="btn btn-mini" href="<?php echo site_url('master/hapus_supplier/'.$row->kd_supplier);?>"
                       onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
                </td>
            </tr>

        <?php }
    }
    ?>

    </tbody>
</table> 