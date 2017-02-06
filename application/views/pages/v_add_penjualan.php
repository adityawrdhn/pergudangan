<?php $this->load->view('modal/modal_add_penjualan_barang')?>

<!--========================= Header + Navbar ==============================-->
<?php $this->load->view('subelement/v_navbar')?>

<!--================ Content Wrapper===========================================-->

<div class="container spacer">
<div class="well">
    <form class="form-horizontal" method="post" action="<?php echo site_url('penjualan/update_penjualan_barang')?>">

        <div class="control-group">
            <label class="control-label">Kode Penjualan</label>
            <div class="controls">
                <input type="text" class="uneditable-input input-xlarge" name="kd_penjualan" value="<?php echo $kd_penjualan; ?>" readonly="true">
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>penjualan</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th class="span3">
                    <a href="#modalAddPenjualanBarang" class="btn btn-inverse btn-block" data-toggle="modal">
                        <i class="icon-th icon-plus-sign icon-white"></i> Tambah Barang
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; $no=1;?>
            <?php foreach($this->cart->contents() as $items): ?>
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr class="gradeX">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['qty']; ?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td>
                        <a class="btn btn-mini btn-danger btn-block delbutton" href="#" class="delbutton"
                           id="<?php echo 'tambah/'.$items['rowid'].'/'.$kd_penjualan.'/'.$items['id'].'/'.$items['qty']; ?>">
                            <i class="icon-trash icon-white"></i> Hapus Barang</a>
                    </td>
                </tr>

                <?php $i++; $no++;?>
            <?php endforeach; ?>
            </tbody>
        </table>

    </form>

    <form action="<?php echo site_url('penjualan/tambah_penjualan') ?>" method="post">
        <div class="row-fluid">
            
            <div class="span4 badge pull-right">
                <div class="control-group">
                    <label class="control-label" style="text-align: center"><h4>Total Harga</h4></label>
                    <div class="controls">
                        <input type="text" class="uneditable-input input-block-level" name="total"
                               value="Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>">
                    </div>
                </div>

                <input id="tanggal_penjualan" type="hidden" name="tanggal_penjualan" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">

            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="icon-ok-sign icon-white"></i> Save</button>
            <a href="<?php echo site_url('penjualan')?>" class="btn"><i class="icon-remove-sign"></i> Cancel</a>
        </div>

    </form>
</div></div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });
    })
</script>