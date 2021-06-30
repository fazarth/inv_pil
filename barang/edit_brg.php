<?php 
$id = $_GET["id"];
$brg = query("SELECT * FROM pil_brg 
              INNER JOIN pil_ktgr 
              ON pil_brg.id_ktgr = pil_ktgr.id_ktgr 
              INNER JOIN pil_satuan
              ON pil_brg.id_satuan = pil_satuan.id_satuan WHERE id_brg = $id")[0];


// $ktgr = query("SELECT * FROM pil_ktgr WHERE id_ktgr")[0];
// $satuan = query("SELECT * FROM pil_satuan WHERE id_satuan")[0];

if(isset($_POST["submit"])) {
  if(edit_brg($_POST) > 0 ) {
    echo "
    <script> alert('data berhasil diubah');
    document.location.href = '?halaman=barang';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal diubah');
    document.location.href = '?halaman=barang';
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
          <h3 class="card-title"><h2>Form Edit Barang</h2></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id_brg" id="id_brg" required value="<?= $brg["id_brg"]; ?>">
                  <label for="">Kode Barang</label>           
                  <input type="text" disabled="disabled" class="form-control" name="kd_brg" id="kd_brg" required value="<?= $brg["kd_brg"]; ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="">Nama Barang</label>
                  <input type="text" class="form-control" name="nm_brg" id="nm_brg" required value="<?= $brg["nm_brg"]; ?>">
                </div>
                <div class="form-group">
                  <label for="">Kategori Barang</label>
                  <select name="id_ktgr" id="id_ktgr" class="form-control select2">
                    <option value="<?= $brg["id_ktgr"]; ?>"><?= $brg["ktgr_brg"]; ?></option>
                    <?php foreach ($ktgr as $row ) : ?>
                    <option value="<?= $row["id_ktgr"]; ?>"><?= $row["ktgr_brg"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Jumlah Barang</label>
                  <input type="number" class="form-control" name="jml_brg" id="jml_brg" required value="<?= $brg["jml_brg"]; ?>">          
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="">Satuan Barang</label>
                  <select name="id_satuan" id="id_satuan" class="form-control select2">
                    <option value="<?= $brg["id_satuan"]; ?>"><?= $brg["satuan_brg"]; ?></option>
                    <?php foreach ($satuan as $row ) : ?>
                    <option value="<?= $row["id_satuan"]; ?>"><?= $row["satuan_brg"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Harga Barang</label>
                  <input type="text" class="form-control" name="harga_brg" id="harga_brg" required value="<?= $brg["harga_brg"]; ?>">          
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
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