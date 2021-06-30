<?php 
$id = $_GET["id"];
if( hapus_ktgr($id) > 0) {
    echo "
    <script> alert('data berhasil dihapus');
    document.location.href = '?halaman=kategori';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal dihapus');
    document.location.href = '?halaman=kategori';
    </script>
    ";
}
?>