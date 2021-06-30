<?php 
$id = $_GET["id"];
if( hapus_brg($id) > 0) {
    echo "
    <script> alert('data berhasil dihapus');
    document.location.href = '?halaman=barang';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal dihapus');
    document.location.href = '?halaman=barang';
    </script>
    ";
}
?>