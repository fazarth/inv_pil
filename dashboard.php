<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $count_brg ?></h3>
            <p>Total Data Barang</p>
          </div>
          <div class="icon">
            <i class="fas fa-box-open"></i>
          </div>
          <a href="?halaman=barang" class="small-box-footer">Info lengkap  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $count_in ?></h3>
            <p>Total Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-pallet"></i>
          </div>
          <a href="?halaman=masuk" class="small-box-footer">Info lengkap  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?= $count_out ?></h3>
            <p>Total Barang Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-shipping-fast"></i>
          </div>
          <a href="?halaman=keluar" class="small-box-footer">Info lengkap  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $count_trx ?></h3>
            <p>Total Transaksi</p>
          </div>
          <div class="icon">
            <i class="fas fa-exchange-alt"></i>
          </div>
          <a href="#" class="small-box-footer">Info lengkap  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="pt-2 px-3"><h3 class="card-title">Daftar Terbaru</h3></li>
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Transaksi Masuk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Transaksi Keluar</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <!-- barang terakhir -->
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="card-title">Daftar Barang Terbaru</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="card-body">
                  <table id="tbl_last_brg" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center" width="30px">No.</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>      
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($last_brg as $row ) : ?>
                        <tr>
                          <td class="text-center"><?= $i; ?></td>
                          <td><?= $row["kd_brg"]; ?></td>
                          <td><?= $row["nm_brg"]; ?></td>
                          <td><?= $row["ktgr_brg"]; ?></td>
                          <td><?= $row["jml_brg"]; ?></td>
                          <td><?= $row["satuan_brg"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody> 
                  </table>
                </div>
              </div>
              <!-- end barang terakhir -->
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <!-- barang masuk -->
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="card-title">Daftar Transaksi Masuk Terbaru</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="tbl_last_in" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" width="30px">No.</th>
                      <th>Kode Transaksi</th>
                      <th>Tanggal</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Pengirim</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>      
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($last_in as $row ) : ?>
                    <tr>
                      <td class="text-center"><?= $i; ?></td>
                      <td><?= $row["kd_in"]; ?></td>
                      <td><?= $row["tgl_in"]; ?></td>
                      <td><?= $row["kd_brg"]; ?></td>
                      <td><?= $row["nm_brg"]; ?></td>
                      <td><?= $row["pengirim"]; ?></td>
                      <td><?= $row["jml_brg"]; ?></td>
                      <td><?= $row["satuan_brg"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- end barang masuk -->
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
            <!-- barang keluar -->
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="card-title">Daftar Transaksi Keluar Terbaru</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="tbl_last_in" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" width="30px">No.</th>
                      <th>Kode Transaksi</th>
                      <th>Tanggal</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Tujuan</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>      
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($last_out as $row ) : ?>
                    <tr>
                      <td class="text-center"><?= $i; ?></td>
                      <td><?= $row["kd_out"]; ?></td>
                      <td><?= $row["tgl_out"]; ?></td>
                      <td><?= $row["kd_brg"]; ?></td>
                      <td><?= $row["nm_brg"]; ?></td>
                      <td><?= $row["tujuan"]; ?></td>
                      <td><?= $row["jml_brg"]; ?></td>
                      <td><?= $row["satuan_brg"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- end barang keluar -->
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>

