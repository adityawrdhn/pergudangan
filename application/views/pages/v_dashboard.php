<?php $this->load->view('subelement/v_navbar')?>

<!--========================= Content Wrapper ==============================-->


<div class="container spacer" >
    <h2 class="center" style="margin-bottom:0px; text-align: center">Aplikasi Enterprise Resource Planing</h2></br>
<?php if(isset($dt_contact)){
foreach($dt_contact as $row){
?>
    <div class="row well" style="text-align: center">
        <h3><?php echo $row->nama?></h3>
        <h4><?php echo $row->desc?></h4>
        <h5 class="muted"><?php echo $row->alamat?></h5>
        <h5 class="muted"><?php echo $row->email?> || <?php echo $row->telp?> || <?php echo $row->website?></h5>

    </div>
<?php }
}
?>
</div>


