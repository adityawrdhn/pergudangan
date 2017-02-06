<!--========================= Header + Navbar ==============================-->
<?php if ($this->session->userdata('LEVEL') == 'admin'){ ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
                    <a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a>
                </li>
                 <li class="<?php if(isset($active_pembelian)){echo $active_pembelian ;}?>">
                    <a href="<?php echo site_url('pembelian')?>"><i class="icon-barcode"></i> Pembelian</a>
                </li>
                <li class="<?php if(isset($active_penjualan)){echo $active_penjualan ;}?>">
                    <a href="<?php echo site_url('penjualan')?>"><i class="icon-barcode"></i> Penjualan</a>
                </li>
                <li class="<?php if(isset($active_master)){echo $active_master ;}?>">
                    <a href="<?php echo site_url('master')?>"><i class="icon-cog"></i> Master Data</a>
                </li>
                <li class="<?php if(isset($active_barang_rusak)){echo $active_barang_rusak ;}?>">
                    <a href="<?php echo site_url('barang_rusak')?>"><i class="icon-cog"></i> Barang Rusak</a>
                </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Gaji</a>
                    </li>
                <li><a href="<?php echo site_url('login/logout')?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>
<?php }else if ($this->session->userdata('LEVEL') == 'pergudangan'){ ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
                    <a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a>
                </li>
                <li class="<?php if(isset($active_master)){echo $active_master ;}?>">
                    <a href="<?php echo site_url('master_pergudangan')?>"><i class="icon-cog"></i> Master Data</a>
                </li>
                <li class="<?php if(isset($active_barang_rusak)){echo $active_barang_rusak ;}?>">
                    <a href="<?php echo site_url('barang_rusak')?>"><i class="icon-cog"></i> Barang Rusak</a>
                </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Gaji</a>
                    </li>
                                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">

                <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                    <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i>lihat Izin Cuti</a>
                    </li>
                    <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                        <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i>Lihat Izin Cuti</a>
                    </li>
</ul></li>                <li><a href="<?php echo site_url('login/logout')?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>

<?php } else if ($this->session->userdata('LEVEL') == 'af') { ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                    <li class="<?php if (isset($active_dashboard)) {echo $active_dashboard;} ?>">
                        <a href="<?php echo site_url('dashboard') ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <li class="<?php if (isset($active_penjualan)) {echo $active_penjualan;} ?>">
                        <a href="<?php echo site_url('af') ?>"><i class="icon-barcode"></i>  Lihat Data Penjualan</a>
                    </li>
                    <li class="<?php if (isset($active_keuangan)) {echo $active_keuangan;} ?>">
                        <a href="<?php echo site_url('af/tampil_anggaran') ?>"><i class="icon-barcode"></i> Keuangan</a>
                    </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Gaji</a>
                    </li>
                                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">

                    <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                        <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i> Buat Izin Cuti</a>
                    </li>
                    <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                        <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i>Lihat Izin Cuti</a>
                    </li>
</ul></li>                    <li><a href="<?php echo site_url('login/logout') ?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>



<?php } else if ($this->session->userdata('LEVEL') == 'delivery') { ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                    <li class="<?php if (isset($active_dashboard)) {echo $active_dashboard;} ?>">
                        <a href="<?php echo site_url('dashboard') ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <li class="<?php if (isset($active_penjualan)) {echo $active_penjualan;} ?>">
                        <a href="<?php echo site_url('af_delivery') ?>"><i class="icon-barcode"></i>Lihat Data Penjualan</a>
                    </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Gaji</a>
                    </li>
                              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">
          
                    <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                        <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i> Buat Izin Cuti</a>
                    </li>
                    <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                        <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i>Lihat Izin Cuti</a>
                    </li>
</ul></li>                    <li><a href="<?php echo site_url('login/logout') ?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>

<?php }else if ($this->session->userdata('LEVEL') == 'scm'){ ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
                    <a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a>
                </li>
                
                <li class="<?php if(isset($active_master)){echo $active_master ;}?>">
                    <a href="<?php echo site_url('master_scm')?>"><i class="icon-cog"></i> Supply chain Management</a>
                </li>
                 <li class="<?php if(isset($active_pembelian)){echo $active_pembelian ;}?>">
                    <a href="<?php echo site_url('pembelian')?>"><i class="icon-barcode"></i> Pembelian</a>
                </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Gaji</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">

                 <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                        <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i> Buat Izin Cuti</a>
                    </li>
                    <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                        <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i>Lihat Izin Cuti</a>
                    </li>
</ul></li>                <li><a href="<?php echo site_url('login/logout')?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>


<?php }else if ($this->session->userdata('LEVEL') == 'penjualan'){ ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                <li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>">
                    <a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i> Dashboard</a>
                </li>
                <li class="<?php if(isset($active_penjualan)){echo $active_penjualan ;}?>">
                    <a href="<?php echo site_url('penjualan')?>"><i class="icon-barcode"></i> Penjualan</a>
                </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Gaji</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">

                 <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                        <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i> Buat Izin Cuti</a>
                    </li>
                    <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                        <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i>Lihat Izin Cuti</a>
                    </li>
</ul></li>                <li><a href="<?php echo site_url('login/logout')?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>



<?php } if ($this->session->userdata('LEVEL') == 'hr') { ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                    <li class="<?php if (isset($active_dashboard)) {echo $active_dashboard;} ?>">
                        <a href="<?php echo site_url('dashboard') ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gaji ⋁ </a>
                        <ul class="dropdown-menu">
                          <li class="<?php if (isset($active_gajipegawai)) {echo $active_gajipegawai;} ?>">
                              <a href="<?php echo site_url('gaji') ?>"><i class="icon-barcode"></i>Data Gaji </a>
                          </li>
                          <li class="<?php if (isset($active_MasukkanGaji)) {echo $active_MasukkanGaji;} ?>">
                              <a href="<?php echo site_url('gaji/tampil_gaji_hrd') ?>"><i class="icon-barcode"></i>Masukkan Gaji </a>
                          </li>
                          <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                              <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Konfirmasi Pengambilan Gaji</a>
                          </li>
                        </ul>
                      </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">
                    
                          <li class="<?php if (isset($active_cutipegawai)) {echo $active_cutipegawai;} ?>">
                              <a href="<?php echo site_url('c_cuti') ?>"><i class="icon-barcode"></i>Konfirmasi Cuti </a>
                          </li>
                          <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                              <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i> Buat Izin Cuti</a>
                          </li>
                          <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                              <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i> Lihat Izin Cuti</a>
                          </li>
                      </ul>
                    </li>
                    <li><a href="<?php echo site_url('login/logout') ?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>
 <?php } if ($this->session->userdata('LEVEL') == 'manager') { ?>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="<?php echo base_url('images/logo.png')?>" alt="logo" width="50px"></a>              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                    <li class="<?php if (isset($active_dashboard)) {echo $active_dashboard;} ?>">
                        <a href="<?php echo site_url('dashboard') ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gaji ⋁ </a>
                        <ul class="dropdown-menu">
                    
                    <li class="<?php if (isset($active_gajipegawai)) {echo $active_gajipegawai;} ?>">
                        <a href="<?php echo site_url('gaji') ?>"><i class="icon-barcode"></i>Data Gaji </a>
                    </li>
                    <li class="<?php if (isset($active_konfirmasigaji)) {echo $active_konfirmasigaji;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_manager') ?>"><i class="icon-barcode"></i>Konfirmasi Gaji</a>
                    </li>
                    <li class="<?php if (isset($active_konfirmasigajip)) {echo $active_konfirmasigajip;} ?>">
                        <a href="<?php echo site_url('gaji/tampil_gaji_pegawai') ?>"><i class="icon-barcode"></i>Konfirmasi Pengambilan Gaji</a>
                    </li>
                    </ul></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuti ⋁ </a>
                        <ul class="dropdown-menu">
                    
                    <li class="<?php if (isset($active_tambahcuti)) {echo $active_tambahcuti;} ?>">
                        <a href="<?php echo site_url('c_tambah_cuti') ?>"><i class="icon-barcode"></i> Buat Izin Cuti</a>
                    </li>
                    <li class="<?php if (isset($active_tampilcuti)) {echo $active_tampilcuti;} ?>">
                        <a href="<?php echo site_url('c_cuti/tampil_cuti/') ?>"><i class="icon-barcode"></i>Lihat Izin Cuti</a>
                    </li>
                    </ul>
                    </li>
                    <li><a href="<?php echo site_url('login/logout') ?>"><i class="icon-remove-sign"></i>  Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>

 <br>

<?php } ?>