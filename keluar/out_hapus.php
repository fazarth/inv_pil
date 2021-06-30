<?php 
$id = $_GET["id"];
if( out_hapus($id) > 0) {
    echo "
    <script> alert('data berhasil dihapus');
    document.location.href = '?halaman=keluar';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal dihapus');
    document.location.href = '?halaman=keluar';
    </script>
    ";
}
?>