<?php 
$id = $_GET["id"];
$out = query("SELECT * FROM pil_out WHERE id = $id")[0];


if(isset($_POST["submit"])) {
  if(out_edit($_POST) > 0 ) {
    echo "
    <script> alert('data berhasil diubah');
    document.location.href = '?halaman=keluar';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal diubah');
    document.location.href = '?halaman=keluar';
    </script>
    ";
  }
}
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card card-default col-md-12">
        <div class="card-header">
          <h3 class="card-title"><h2>Form Edit Transaksi Barang Keluar</h2></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id" id="id" required value="<?= $out["id"]; ?>">
                  <label for="">ID Transaksi</label> 
                  <input class="form-control" disabled="disabled" type="text" name="id_transaksi" id="id_transaksi" required value="<?= $out["id_transaksi"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Tanggal Transaksi</label> 
                  <input class="form-control" type="date" name="tgl_transaksi" id="tgl_transaksi" required value="<?= $out["tgl_transaksi"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Kode Barang</label> 
                  <input class="form-control" type="text" name="kd_brg" id="kd_brg" required value="<?= $out["kd_brg"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Nama Barang</label>
                  <input class="form-control" type="text" name="nm_brg" id="nm_brg" required value="<?= $out["nm_brg"]; ?>">
                </div>
              </div>
              <div class="col-md-6">  
                <div class="form-group">
                  <label for="">Tujuan</label>
                  <input class="form-control" type="text" name="tujuan" id="tujuan" required value="<?= $out["tujuan"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Jumlah Barang</label>
                  <input class="form-control" type="number" name="jml_brg" id="jml_brg" required value="<?= $out["jml_brg"]; ?>">
                </div>
                <div class="form-group">
                  <label>Satuan Barang</label>
                  <select name="satuan_brg" id="satuan_brg" class="form-control select2">
                    <option value="<?= $out["satuan_brg"]; ?>"><?= $out["satuan_brg"]; ?></option>
                    <?php foreach ($satuan as $row ) : ?>
                    <option value="<?= $row["satuan_brg"]; ?>"><?= $row["satuan_brg"]; ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a class="btn btn-secondary" href="?halaman=barang">Batal</a>
            <button type="submit" name="submit" class="btn btn-success float-right">Perbaharui Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>