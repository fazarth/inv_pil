<?php 
$id = $_GET["id"];
if( hapus_satuan($id) > 0) {
    echo "
    <script> alert('data berhasil dihapus');
    document.location.href = '?halaman=satuan';
    </script>
    ";
  } else {
    echo "
    <script> alert('data gagal dihapus');
    document.location.href = '?halaman=satuan';
    </script>
    ";
}
?>