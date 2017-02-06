
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
                
            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>