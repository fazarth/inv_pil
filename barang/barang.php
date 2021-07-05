<?php
if(isset($_POST["submit"])) {
  if(tambah_brg($_POST) > 0 ) {
  //   echo "
  //   <script> 
  //   alert('data berhasil ditambahkan');
  //   document.location.href = '?halaman=barang';
  //   </script>
  //   ";
  // } else {
  //   echo "
  //   <script> alert('data gagal ditambahkan');
  //   document.location.href = '?halaman=barang';
  //   </script>
  //   ";
  // }
    echo " 
      <div class='toastrDefaultSuccess'>
        <strong>Berhasil!</strong> Data berhasil ditambahkan.
      </div>
        ";
  } else { echo "
      <div class='toastrDefaultError'>
        <strong>Gagal!</strong> Data gagal ditambahkan.
      </div>
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
                <h3 class="card-title"><h2>Daftar Barang</h2></h3>
              </div>
              <div class="col-md-6">
                  <!-- modals -->
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_barang">
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
                  <th>Kode Barang</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga</th>      
                  <th class="text-center" width="80px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>                
                <?php foreach ($brg as $row ) : ?>
                <?php $angka = $row["harga_brg"];
                    $duit = number_format($angka,0,",","."); ?>
                  <tr>
                    <td class="text-center"><?= $i; ?></td>
                    <td><?= $row["kd_brg"]; ?></td>
                    <td><?= $row["nm_brg"]; ?></td>
                    <td><?= $row["ktgr_brg"]; ?></td>
                    <td><?= $row["jml_brg"]; ?></td>
                    <td><?= $row["satuan_brg"]; ?></td>
                    <td>Rp. <?=  $duit ?></td>
                    <td class="td-actions text-center">
                      <a rel="tooltip" data-toggle="tooltip"data-placement="top" title="Edit Barang" class="btn btn-success" href="?halaman=barang&aksi=edit_barang&id=<?= $row["id_brg"]; ?>"><i class="fas fa-edit"></i></a>
                      <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Barang" class="btn btn-danger" href="?halaman=barang&aksi=hapus_barang&id=<?= $row["id_brg"]; ?>" onclick="return confirm('Yakin?');"><i class="fas fa-eraser"></i></a> 
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
              </tbody>                
              <tfoot>
                <tr>
                  <th class="text-center">No.</th>
                  <th>Kode Barang</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga</th>      
                  <th class="text-right">Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

        <!-- Modals tambah -->
      <div class="modal fade bd-example-modal-lg" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="tambah_barangTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Data Barang</h5>
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
                        <label>Kode Barang</label>                                  
                        <input class="form-control" type="text" name="kd_brg" id="kd_brg" required>                                 
                      </div>
                      <div class="form-group">
                        <label>Nama Barang</label>                                  
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
                        <label>Jumlah Barang</label>
                        <input class="form-control" type="number" name="jml_brg" id="jml_brg" required>
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
                        <label>Harga Barang</label>
                        <input class="form-control" type="text" name="harga_brg" id="harga_brg" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" name="submit" class="btn btn-success float-right"><i class="fas fa-save"> </i> Simpan Data</button>
                </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
            <!-- end modals tambah-->