<?php $this->load->view('subelement/v_navbar')?>

<!--========================= Content Wrapper ==============================-->
<div class="container spacer">
<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tabBarang" data-toggle="tab"><strong>BARANG</strong></a></li>
        <li><a href="#tabPelanggan" data-toggle="tab"><strong>SUPPLIER</strong></a></li>
        <li><a href="#tabContact" data-toggle="tab"><strong>CONTACT</strong></a></li>
        
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tabBarang">
            <?php $this->load->view('pages/v_tab_master_barang_pergudangan')?>
        </div>
        <div class="tab-pane" id="tabPelanggan">
            <?php $this->load->view('pages/v_tab_master_supplier_pergudangan')?>
        </div>
        <div class="tab-pane" id="tabContact">
            <?php $this->load->view('pages/v_tab_master_contact')?>
        </div>
        
    </div>
</div></div>