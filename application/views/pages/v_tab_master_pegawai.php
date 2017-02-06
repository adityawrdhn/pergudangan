<?php $this->load->view('modal/modal_add_pegawai')?>
<?php $this->load->view('modal/modal_edit_pegawai')?>
</br>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Pegawai</th>
        <th>User ID</th>
        <th>Nama Pegawai</th>
        <th>Level</th>
        <th class="span2">
            <a href="#modalAddPegawai" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data
            </a>
        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($data_pegawai)){
        foreach($data_pegawai as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_pegawai; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->level; ?></td>
                <td>
                    <a class="btn btn-mini" href="#modalEditPegawai<?php echo $row->kd_pegawai?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
                    <a class="btn btn-mini" href="<?php echo site_url('master/hapus_pegawai/'.$row->kd_pegawai);?>"
                       onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
                </td>
            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>