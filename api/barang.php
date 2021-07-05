<?php
include 'koneksi.php';

$sql = "SELECT * FROM pil_brg 
        INNER JOIN pil_ktgr 
        ON pil_brg.id_ktgr = pil_ktgr.id_ktgr 
        INNER JOIN pil_satuan
        ON pil_brg.id_satuan = pil_satuan.id_satuan";
$result = mysqli_query($conn, $sql);

$array = array();
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
        $data = array(
            'kd_brg' => $row['kd_brg'],
            'nm_brg' => $row['nm_brg'],
            'ktgr_brg' => $row['ktgr_brg'],
            'jml_brg' => $row['jml_brg'],
            'satuan_brg' => $row['satuan_brg'],
            'harga_brg' => $row['harga_brg'],
            
        );
        array_push($array, $data);
    }
}

$json = json_encode($array);

if (file_put_contents("JSON/Barang.json", $json)){
    echo "File JSON sukses dibuat...
    <meta http-equiv='refresh' content='1; url= ../?halaman=api'/> ";
} else {
    echo "Oops! Terjadi error saat membuat file JSON...";
}
?>