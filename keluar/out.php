<?php
if(isset($_POST["submit"])) {
  if(out_tambah($_POST) > 0 ) {
    echo "
    <script> 
    alert('data berhasil ditambahkan');
    document.location.href = '?halaman=keluar';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal ditambahkan');
    document.location.href = '?halaman=keluar';
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
                <h3 class="card-title"><h2>Daftar Transaksi Barang Keluar</h2></h3>
              </div>
              <div class="col-md-6">
                  <!-- modals -->
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_out">
                  Tambah Transaksi
                </button>                  
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="tbl_in" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" width="30px">No.</th>
                  <th>Kode Transaksi</th>
                  <th>Tanggal</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Tujuan</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th class="text-center" width="80px">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($out as $row ) : ?>
               <?php $angka = $row["harga_brg"];
                    $duit = number_format($angka,0,",","."); ?>
                <tr>
                  <td class="text-center"><?= $i; ?></td>
                  <td><?= $row["kd_out"]; ?></td>
                  <td><?= $row["tgl_out"]; ?></td>
                  <td><?= $row["kd_brg"]; ?></td>
                  <td><?= $row["nm_brg"]; ?></td>
                  <td><?= $row["ktgr_brg"]; ?></td>
                  <td><?= $row["tujuan"]; ?></td>
                  <td><?= $row["jml_brg_out"]; ?></td>
                  <td><?= $row["satuan_brg"]; ?></td>
                  <td>Rp. <?= $duit ?></td>
                  <td class="td-actions text-center">
                    <a rel="tooltip" data-toggle="tooltip"data-placement="top" title="Edit Transaksi" class="btn btn-success" href="?halaman=keluar&aksi=edit_barang_keluar&id=<?= $row["id_out"]; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Transaksi" class="btn btn-danger" href="?halaman=keluar&aksi=hapus_barang_keluar&id=<?= $row["id_out"]; ?>" onclick="return confirm('Yakin?');"><i class="fas fa-trash-alt"></i></a> 
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
      <div class="modal fade bd-example-modal-lg" id="tambah_out" tabindex="-1" role="dialog" aria-labelledby="tambah_outTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Transaksi Barang Keluar</h5>
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
                        <input class="form-control" type="text" name="kd_out" kd="kd_out" required>
                      </div>
                      <div class="form-group">
                        <label for="">Tanggal Transaksi</label> 
                        <input class="form-control" type="date" name="tgl_out" id="tgl_out" required>
                      </div>                      
                    </div>
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="">Tujuan</label>
                        <input class="form-control" type="text" name="tujuan" id="tujuan" required>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah Barang Keluar</label>
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
                            <?php $angka = $row["harga_brg"];
                            $duit = number_format($angka,0,",","."); ?> 
                            <option value="<?= $row["id_brg"]; ?>"><?= $row["kd_brg"]; ?>, <?= $row["nm_brg"]; ?>, Rp. <?= $duit ?>, <?= $row["jml_brg"]; ?> <?= $row["satuan_brg"]; ?></option>
                            <?php endforeach; ?>
                          </select>
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
  </div>
</div>
