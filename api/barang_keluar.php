<?php
include 'koneksi.php';

$sql = "SELECT * FROM pil_out 
        INNER JOIN pil_brg 
        ON pil_out.id_brg = pil_brg.id_brg 
        INNER JOIN pil_ktgr 
        ON pil_brg.id_ktgr = pil_ktgr.id_ktgr
        INNER JOIN pil_satuan
        ON pil_brg.id_satuan = pil_satuan.id_satuan";
$result = mysqli_query($conn, $sql);

$array = array();
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
        $data = array(
            'kd_out' => $row['kd_out'],
            'tgl_out' => $row['tgl_out'],
            'kd_brg' => $row['kd_brg'],
            'nm_brg' => $row['nm_brg'],
            'ktgr_brg' => $row['ktgr_brg'],
            'tujuan' => $row['tujuan'],
            'jml_brg_out' => $row['jml_brg_out'],
            'satuan_brg' => $row['satuan_brg'],
            'harga_brg' => $row['harga_brg'],            
        );
        array_push($array, $data);
    }
}

$json = json_encode($array);

if (file_put_contents("JSON/BarangKeluar.json", $json)){
    echo "File JSON sukses dibuat...
    <meta http-equiv='refresh' content='1; url= ../?halaman=api'/> ";
} else {
    echo "Oops! Terjadi error saat membuat file JSON...";
}
?>