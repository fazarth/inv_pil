<?php
if(isset($_POST["submit"])) {
  if(in_tambah($_POST) > 0 ) {
    echo "
    <script> 
    alert('data berhasil ditambahkan');
    document.location.href = '?halaman=masuk';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal ditambahkan');
    document.location.href = '?halaman=masuk';
    </script>
    ";
  }
} elseif(isset($_POST["update"])) {
  if(in_update($_POST) > 0 ) {
    echo "
    <script> 
    alert('data berhasil ditambahkan');
    document.location.href = '?halaman=masuk';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal ditambahkan');
    document.location.href = '?halaman=masuk';
    </script>
    ";
  }
}
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="card-title"><h2>Transaksi Barang Masuk</h2></h3>
              </div>
              <div class="col-md-6">
                  <!-- modals -->
                  <!-- Button trigger modal -->
                <div class="row">
                  <div class="col-md 6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_in">                 
                      Tambah Transaksi
                    </button>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_in">                 
                      Update Stock Barang
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="tbl_in" class="table table-bordered table-striped" width="100px">
              <thead>
                <tr>
                  <th class="text-center" width="30px">No.</th>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Pengirim</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th class="text-center" width="80px">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($in as $row ) : ?>
                <?php $angka = $row["harga_brg"];
                    $duit = number_format($angka,0,",","."); ?>
                <tr>
                  <td class="text-center"><?= $i; ?></td>
                  <td><?= $row["kd_in"]; ?></td>
                  <td><?= $row["tgl_in"]; ?></td>
                  <td><?= $row["kd_brg"]; ?></td>
                  <td><?= $row["nm_brg"]; ?></td>
                  <td><?= $row["ktgr_brg"]; ?></td>
                  <td><?= $row["pengirim"]; ?></td>
                  <td><?= $row["jml_brg_in"]; ?></td>
                  <td><?= $row["satuan_brg"]; ?></td>
                  <td>Rp. <?= $duit ?></td>
                  <td class="td-actions text-center">
                    <a rel="tooltip" data-toggle="tooltip"data-placement="top" title="Edit Transaksi" class="btn btn-success" href="?halaman=masuk&aksi=edit_barang_masuk&id=<?= $row["id_in"]; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Transaksi" class="btn btn-danger" href="?halaman=masuk&aksi=hapus_barang_masuk&id=<?= $row["id_in"]; ?>" onclick="return confirm('Yakin?');"><i class="fas fa-trash-alt"></i></a> 
                  </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

        <!-- Modals tambah -->
      <div class="modal fade bd-example-modal-lg" id="tambah_in" tabindex="-1" role="dialog" aria-labelledby="tambah_inTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Transaksi Barang Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <!-- form start -->
              <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Kode Transaksi</label> 
                        <input class="form-control" type="text" name="kd_in" kd="kd_in" required>
                      </div>
                      <div class="form-group">
                        <label for="">Tanggal Transaksi</label> 
                        <input class="form-control" type="date" name="tgl_in" id="tgl_in" required>
                      </div>
                      <div class="form-group">
                        <label for="">Kode Barang</label> 
                        <input class="form-control" type="text" name="kd_brg" id="kd_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input class="form-control" type="text" name="nm_brg" id="nm_brg" required>
                      </div>
                      <div class="form-group">
                        <label>Kategori Barang</label>
                        <select name="id_ktgr" id="id_ktgr" class="form-control select2">
                          <option> </option>
                          <?php foreach ($ktgr as $row ) : ?>
                          <option value="<?= $row["id_ktgr"]; ?>"><?= $row["ktgr_brg"]; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="">Pengirim</label>
                        <input class="form-control" type="text" name="pengirim" id="pengirim" required>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah Barang</label>
                        <input class="form-control" type="number" name="jml_brg_in" id="jml_brg_in" required>
                      </div>
                      <div class="form-group">
                        <label>Satuan Barang</label>
                        <select name="id_satuan" id="id_satuan" class="form-control select2">
                          <option> </option>
                          <?php foreach ($satuan as $row ) : ?>
                          <option value="<?= $row["id_satuan"]; ?>"><?= $row["satuan_brg"]; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Harga Barang Masuk</label>
                        <input class="form-control" type="text" name="harga_brg" id="harga_brg" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-success float-right">Simpan Data</button>
                  </div>
                </form>          
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- update_in -->
      <div class="modal fade bd-example-modal-lg" id="update_in" tabindex="-1" role="dialog" aria-labelledby="update_inTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Transaksi Barang Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <!-- /.card-header -->
                <!-- form start -->
              <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Kode Transaksi</label> 
                        <input class="form-control" type="text" name="kd_in" kd="kd_in" required>
                      </div>
                      <div class="form-group">
                        <label for="">Tanggal Transaksi</label> 
                        <input class="form-control" type="date" name="tgl_in" id="tgl_in" required>
                      </div>                      
                    </div>
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="">Pengirim</label>
                        <input class="form-control" type="text" name="pengirim" id="pengirim" required>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah Barang Masuk</label>
                        <input class="form-control" type="text" name="jml_brg" id="jml_brg" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="">Kode Barang</label> 
                          <!-- <input class="form-control" type="text" name="kd_brg" id="kd_brg" required> -->
                          <select name="id_brg" id="id_brg" class="form-control select2">
                            <option> </option>
                            <?php foreach ($brg as $row ) : ?>
                            <option value="<?= $row["id_brg"]; ?>"><?= $row["kd_brg"]; ?>, <?= $row["nm_brg"]; ?>, Rp. <?= $duit ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="update" class="btn btn-success float-right">Update Barang</button>
                  </div>
                </form>          
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end update_in -->

    </div>
  </div>
</div>