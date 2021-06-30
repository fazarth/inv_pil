<?php 
$id = $_GET["id"];
if( in_hapus($id) > 0) {
    echo "
    <script> alert('data berhasil dihapus');
    document.location.href = '?halaman=masuk';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal dihapus');
    document.location.href = '?halaman=masuk';
    </script>
    ";
}
?>