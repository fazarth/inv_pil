<?php 

$id = $_GET["id"];
$ktgr = query("SELECT * FROM pil_ktgr WHERE id_ktgr = $id")[0];

if(isset($_POST["submit"])) {
  if(edit_ktgr($_POST) > 0 ) {
    echo "
    <script> alert('data berhasil diubah');
    document.location.href = '?halaman=kategori';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal diubah');
    document.location.href = '?halaman=kategori';
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
          <h3 class="card-title"><h2>Form Edit Kategori</h2></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id_ktgr" id="edit_ktgr" required value="<?= $ktgr["id_ktgr"]; ?>">
                  <label for="">Kategori Barang</label>           
                  <input type="text" class="form-control" name="edit_kategori" id="edit_kategori" required value="<?= $ktgr["ktgr_brg"]; ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a class="btn btn-secondary" href="?halaman=kategori">Batal</a>
            <button type="submit" name="submit" class="btn btn-success float-right">Perbaharui Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>