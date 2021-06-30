<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="card-title"><h2>Laporan Stock Barang</h2></h3>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="tbl_in" class="table table-bordered table-striped" width="100px">
              <thead>
                <tr>
                  <th width="30px">No.</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Stock Barang</th>
                  <th>Stock Masuk</th>
                  <th>Stock Keluar</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($opname as $row ) : ?>
                <tr>
                  <td class="text-center"><?= $i; ?></td>
                  <td><?= $row["kd_brg"]; ?></td>
                  <td><?= $row["nm_brg"]; ?></td>
                  <td><?= $row["stock_barang"]; ?></td>
                  <td><?= $row["stock_masuk"]; ?></td>
                  <td><?= $row["stock_keluar"]; ?></td>
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