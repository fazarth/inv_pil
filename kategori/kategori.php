<?php
if(isset($_POST["submit"])) {
  if(tambah_ktgr($_POST) > 0 ) {
    echo "
    <script> 
    alert('data berhasil ditambahkan');
    document.location.href = '?halaman=kategori';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal ditambahkan');
    document.location.href = '?halaman=kategori';
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
                <h3 class="card-title"><h2>Daftar Kategori Barang</h2></h3>
              </div>
              <div class="col-md-6">
                  <!-- modals -->
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_kategori">
                  <i class="fas fa-plus"> </i> Tambah Data
                </button>                  
              </div>
            </div>
          </div>
          <div class="card-body">
            <table id="tbl_brg" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" width="30px">No.</th>
                  <th>Kategori Barang</th>                  
                  <th class="text-center" width="80px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($ktgr as $row ) : ?>
                  <tr>
                    <td class="text-center"><?= $i; ?></td>
                    <td><?= $row["ktgr_brg"]; ?></td>
                    <td class="td-actions text-center">
                      <a rel="tooltip" data-toggle="tooltip"data-placement="top" title="Edit Kategori" class="btn btn-success" href="?halaman=kategori&aksi=edit_kategori&id=<?= $row["id_ktgr"]; ?>"><i class="fas fa-edit"></i></a>
                      <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Kategori" class="btn btn-danger" href="?halaman=kategori&aksi=hapus_kategori&id=<?= $row["id_ktgr"]; ?>" onclick="return confirm('Yakin?');"><i class="fas fa-eraser"></i></a> 
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
              </tbody>                
              <tfoot>
                <tr>
                  <th class="text-center">No.</th>
                  <th>Kategori Barang</th>
                  <th class="text-right">Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

        <!-- Modals tambah -->
      <div class="modal fade bd-example-modal-lg" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="tambah_kategoriTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Data Kategori Barang</h5>
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
                        <label>Kategori Barang</label>
                        <input type="text" name="tambah_kategori" id="tambah_kategori" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" name="submit" class="btn btn-success float-right"><i class="fas fa-save"> </i>Simpan Data</button>
                </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>