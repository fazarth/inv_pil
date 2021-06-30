<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="card-title"><h2>Laporan Stock Opname</h2></h3>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="tbl_in" class="table table-bordered table-striped" width="100px">
              <thead>
              <tr class="text-center">
                  <th rowspan="2"  width="30px">No.</th>
                  <th colspan="4" >Stock Barang</th>
                  <th colspan="2" >Barang Masuk</th>
                  <th colspan="2" >Barang Keluar</th>
                </tr>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Stock Barang</th>
                  <th>Harga Barang</th>
                  <th>Stock Masuk</th>
                  <th>Total Masuk</th>
                  <th>Stock Keluar</th>
                  <th>Total Keluar</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($opname as $row ) : ?>
                <?php 
                  $duit = $row["harga_brg"];
                  $masuk = $row["total_masuk"];
                  $keluar = $row["total_keluar"];
                  $duit = number_format($duit,0,",",".");
                  $duit_masuk = number_format($masuk,0,",",".");
                  $duit_keluar = number_format($keluar,0,",","."); 
                ?>
                <tr>
                  <td class="text-center"><?= $i; ?></td>
                  <td><?= $row["kd_brg"]; ?></td>
                  <td><?= $row["nm_brg"]; ?></td>
                  <td><?= $row["stock_barang"]; ?></td>
                  <td>Rp. <?= $duit ?></td>
                  <td><?= $row["stock_masuk"]; ?></td>
                  <td>Rp. <?= $duit_masuk ?></td>
                  <td><?= $row["stock_keluar"]; ?></td>
                  <td>Rp. <?= $duit_keluar ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>