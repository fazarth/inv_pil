<?php 

$id = $_GET["id"];
$satuan = query("SELECT * FROM pil_satuan WHERE id_satuan = $id")[0];

if(isset($_POST["submit"])) {
  if(edit_satuan($_POST) > 0 ) {
    echo "
    <script> alert('data berhasil diubah');
    document.location.href = '?halaman=satuan';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal diubah');
    document.location.href = '?halaman=satuan';
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
          <h3 class="card-title"><h2>Form Edit Satuan</h2></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id" id="id" required value="<?= $satuan["id"]; ?>">
                  <label for="">Satuan Barang</label>           
                  <input type="text" class="form-control" name="edit_satuan" id="edit_satuan" required value="<?= $satuan["satuan_brg"]; ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a class="btn btn-secondary" href="?halaman=satuan">Batal</a>
            <button type="submit" name="submit" class="btn btn-success float-right">Perbaharui Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>