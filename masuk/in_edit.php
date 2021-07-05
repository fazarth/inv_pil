<?php 
$id = $_GET["id"];
$in = query("SELECT * FROM pil_in 
              INNER JOIN pil_brg 
              ON pil_in.id_brg = pil_brg.id_brg 
              INNER JOIN pil_ktgr 
              ON pil_brg.id_ktgr = pil_ktgr.id_ktgr
              INNER JOIN pil_satuan
              ON pil_brg.id_satuan = pil_satuan.id_satuan WHERE id_in = $id")[0]; 


if(isset($_POST["submit"])) {
  if(in_edit($_POST) > 0 ) {
    echo "
    <script> alert('data berhasil diubah');
    document.location.href = '?halaman=masuk';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal diubah');
    document.location.href = '?halaman=masuk';
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
          <h3 class="card-title"><h2>Form Edit Transaksi Barang Masuk</h2></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id_in" id="id_in" required value="<?= $in["id_in"]; ?>">
                  <input type="hidden" name="id_brg" id="id_brg" required value="<?= $in["id_brg"]; ?>">
                  <label for="">Kode Transaksi</label> 
                  <input class="form-control" disabled="disabled" type="text" name="kd_in" id="kd_in" required value="<?= $in["kd_in"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Tanggal Transaksi</label> 
                  <input class="form-control" type="date" name="tgl_in" id="tgl_in" required value="<?= $in["tgl_in"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Kode Barang</label> 
                  <input class="form-control" disabled="disabled" type="text" name="kd_brg" id="kd_brg" required value="<?= $in["kd_brg"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Nama Barang</label>
                  <input class="form-control" disabled="disabled" type="text" name="nm_brg" id="nm_brg" required value="<?= $in["nm_brg"]; ?>">
                </div>
                <div class="form-group">
                  <label>Kategori Barang</label>
                  <select name="id_ktgr" id="id_ktgr" class="form-control select2" disabled="disabled">
                    <option value="<?= $in["id_ktgr"]; ?>"><?= $in["ktgr_brg"]; ?> </option>
                    <?php foreach ($ktgr as $row ) : ?>
                    <option value="<?= $row["id_ktgr"]; ?>"><?= $row["ktgr_brg"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">  
                <div class="form-group">
                  <label for="">Pengirim</label>
                  <input class="form-control" type="text" name="pengirim" id="pengirim" required value="<?= $in["pengirim"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Jumlah Barang</label>
                  <input class="form-control" type="number" name="jml_brg_in" id="jml_brg_in" required value="<?= $in["jml_brg_in"]; ?>">
                </div>
                <div class="form-group">
                  <label>Satuan Barang</label>
                  <select name="id_satuan" id="id_satuan" class="form-control select2" disabled="disabled">
                    <option value="<?= $in["id_satuan"]; ?>"><?= $in["satuan_brg"]; ?></option>
                    <?php foreach ($satuan as $row ) : ?>
                    <option value="<?= $row["id_satuan"]; ?>"><?= $row["satuan_brg"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Harga Barang</label>
                  <input class="form-control" type="text" name="harga_brg" id="harga_brg" required value="<?= $in["harga_brg"]; ?>">
                </div>
              </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a class="btn btn-secondary" href="?halaman=masuk">Batal</a>
            <button type="submit" name="submit" class="btn btn-success float-right"><i class="fas fa-save"> </i>Perbaharui Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>