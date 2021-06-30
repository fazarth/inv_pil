<?php
header('Content-Type: application/json');
include dirname(dirname(__FILE__)).'/api/db/Db.class.php';
$db = new Db();
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$name = isset($_GET['name']) ? $_GET['name'] : '';
$sql_limit = '';
if (!empty($limit)) {
    $sql_limit = ' LIMIT 0,'.$limit;
}
$sql_name = '';
if (!empty($name)) {
    $sql_name = ' WHERE nm_brg LIKE \'%'.$name.'%\' ';
}

$brg_list = $db->query('SELECT * FROM pil_brg '.$sql_name.' '.$sql_limit);
$brg = array();
$brg['info'] = 'success';
$brg['num'] = count($brg_list);
$brg['result'] = $brg_list;
$json = json_encode($brg);
// json_decode($json, true);

if (file_put_contents("JSON/Barang.json", $json)){
    echo "File JSON sukses dibuat...";
} else {
    echo "Oops! Terjadi error saat membuat file JSON...";
}
?>