<?php $this->load->view('subelement/v_navbar')?>

<div class="container spacer">
<!--================ Content Wrapper===========================================-->
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kredit</th>
        <th>Debit</th>
        <th>Saldo</th>
        
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_anggaran)){
        foreach($data_anggaran as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo date("d M Y",strtotime($row->tanggal)); ?></td>
                <td>Rp. <?php echo $row->kredit; ?></td>
                <td>Rp. <?php echo $row->debit; ?></td>
                <td>Rp. <?php echo $row->saldo; ?></td>
                                      
                  </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>



</div>