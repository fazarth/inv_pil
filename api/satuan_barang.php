<?php
include 'koneksi.php';

$sql = "SELECT * FROM pil_satuan";
$result = mysqli_query($conn, $sql);

$array = array();
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
        $data = array(
            'id_satuan' => $row['id_satuan'],
            'satuan_brg' => $row['satuan_brg'],
            
        );
        array_push($array, $data);
    }
}

$json = json_encode($array);

if (file_put_contents("JSON/SatuanBarang.json", $json)){
    echo "File JSON sukses dibuat...
    <meta http-equiv='refresh' content='1; url= ../?halaman=api'/> ";
} else {
    echo "Oops! Terjadi error saat membuat file JSON...";
}
?>