<?php
require 'function.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory Stock | PIL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- style -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

  <!-- My Css -->
  <link rel="stylesheet" href="assets/dist/css/style.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" data-toggle="tooltip" data-placement="right" title="Minimize Sidebar"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link">Welcome to Dashboard</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt" data-toggle="tooltip" data-placement="left" title="Fullscreen"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Sign Out"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="?halaman=dashboard" class="brand-link text-center">
        <span class="brand-text font-weight-light">INVN PIL</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="?halaman=dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?halaman=barang" class="nav-link">
                    <i class="fas fa-boxes nav-icon"></i>
                    <p>Daftar Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=kategori" class="nav-link">
                    <i class="fas fa-tags nav-icon"></i>
                    <p>Daftar Kategori Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=satuan" class="nav-link">
                    <i class="fas fa-box nav-icon"></i>
                    <p>Daftar Satuan Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-hands-helping"></i>
                <p>
                  Transaksi Barang
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?halaman=masuk" class="nav-link">
                    <i class="fas fa-shipping-fast fa-flip-horizontal nav-icon"></i>
                    <p>Daftar Barang Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=keluar" class="nav-link">
                    <i class="fas fa-shipping-fast nav-icon"></i>
                    <p>Daftar Barang Keluar</p>
                  </a>
                </li>
              </ul>
            </li>          
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?halaman=stockopname" class="nav-link">
                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                    <p>Laporan StockOpname</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=stock" class="nav-link">
                    <i class="fas fa-file-invoice nav-icon"></i>
                    <p>Laporan Stok Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="?halaman=api" class="nav-link">
                <i class="nav-icon fas fa-code"></i>
                <p>API</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <?php 
            if (isset($_GET['halaman'])) 
            {
              if ($_GET['halaman']=='dashboard') 
              {
                include 'dashboard.php';
              }
              elseif ($_GET['halaman']=='barang') 
              {
                if (isset($_GET['aksi'])) 
                {
                  if ($_GET['aksi']=='') 
                  {
                    include 'barang/barang.php';             
                  }
                  elseif ($_GET['aksi']=='edit_barang') 
                  {
                    include 'barang/edit_brg.php';
                  }
                  elseif ($_GET['aksi']=='hapus_barang') 
                  {
                    include 'barang/hapus_brg.php';
                  }
                  else
                  {
                    include 'barang/barang.php';
                  }
                }                
                else
                {
                  include 'barang/barang.php';
                }
              }
              elseif ($_GET['halaman']=='kategori') 
              {
                if (isset($_GET['aksi'])) 
                {
                  if ($_GET['aksi']=='') 
                  {
                    include 'kategori/kategori.php';             
                  }
                  elseif ($_GET['aksi']=='edit_kategori') 
                  {
                    include 'kategori/edit_ktgr.php';
                  }
                  elseif ($_GET['aksi']=='hapus_kategori') 
                  {
                    include 'kategori/hapus_ktgr.php';
                  }
                  else
                  {
                    include 'kategori/kategori.php';
                  }
                }                
                else
                {
                  include 'kategori/kategori.php';
                }
              }
              elseif ($_GET['halaman']=='satuan') 
              {
                if (isset($_GET['aksi'])) 
                {
                  if ($_GET['aksi']=='') 
                  {
                    include 'satuan/satuan.php';             
                  }
                  elseif ($_GET['aksi']=='edit_satuan') 
                  {
                    include 'satuan/edit_satuan.php';
                  }
                  elseif ($_GET['aksi']=='hapus_satuan') 
                  {
                    include 'satuan/hapus_satuan.php';
                  }
                  else
                  {
                    include 'satuan/satuan.php';
                  }
                }                
                else
                {
                  include 'satuan/satuan.php';
                }
              }
              elseif ($_GET['halaman']=='masuk') 
              {
                if (isset($_GET['aksi'])) 
                {
                  if ($_GET['aksi']=='') 
                  {
                    include 'masuk/in.php';             
                  }
                  elseif ($_GET['aksi']=='edit_barang_masuk') 
                  {
                    include 'masuk/in_edit.php';
                  }
                  elseif ($_GET['aksi']=='hapus_barang_masuk') 
                  {
                    include 'masuk/in_hapus.php';
                  }
                  else
                  {
                    include 'masuk/in.php';
                  }
                }                
                else
                {
                  include 'masuk/in.php';
                }
              }
              elseif ($_GET['halaman']=='keluar') 
              {
                if (isset($_GET['aksi'])) 
                {
                  if ($_GET['aksi']=='') 
                  {
                    include 'keluar/out.php';             
                  }
                  elseif ($_GET['aksi']=='edit_barang_keluar') 
                  {
                    include 'keluar/out_edit.php';
                  }
                  elseif ($_GET['aksi']=='hapus_barang_keluar') 
                  {
                    include 'keluar/out_hapus.php';
                  }
                  else
                  {
                    include 'keluar/out.php';
                  }
                }                
                else
                {
                  include 'keluar/out.php';
                }
              }
              elseif ($_GET['halaman']=='stock') 
              {
                  include 'laporan/laporan_stock.php';
              }
              elseif ($_GET['halaman']=='stockopname') 
              {
                  include 'laporan/laporan_stockopname.php';
              }
              elseif ($_GET['halaman']=='api') 
              {
              
                  include 'api/api.php';
                
              }
            } 
            else
            {
              include 'dashboard.php';
            }
          ?>

</div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; <script type="text/javascript">
      document.write(new Date().getFullYear());
      </script> Tezza Fazar Tri Hidayat </strong>
      <div class="float-right d-none d-sm-inline-block">
      Build with <a href="https://adminlte.io">AdminLTE.io</a>.
      All rights reserved.
      </div>
    </footer>
  </div>
<!-- ./wrapper -->

<!-- myscript -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="assets/dist/js/script.js"></script>

<script>
  $(function () {
    $("#tbl_brg").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tbl_brg_wrapper .col-md-6:eq(0)');

    $("#tbl_in").DataTable({
      "scrollX": true,
      "responsive": true, "lengthChange": false, "autoWidth": false, "orientation": "landscape",
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tbl_in_wrapper .col-md-6:eq(0)');

    $('[data-toggle="tooltip"]').tooltip()

    $("#tbl_last_brg, #tbl_last_in, #tbl_last_out").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "searching": false,
      "paging":   false,
      "ordering": false,
      "info":     false
    })

    });

    $(document).ready(function () {
        $("#id_satuan").select2({
            placeholder: "Silahkan Pilih"
        });
    });
    $(document).ready(function () {
        $("#id_ktgr").select2({
            placeholder: "Silahkan Pilih"
        });
    });
    $(document).ready(function () {
        $(".id_brg").select2({
            placeholder: "Silahkan Pilih"
        });
    });
</script>