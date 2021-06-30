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
$brg_list = $db->query('SELECT * FROM pil_in '.$sql_name.' '.$sql_limit);
$in = array();
$in['info'] = 'success';
$in['num'] = count($brg_list);
$in['result'] = $brg_list;
$json = json_encode(array($in));

if (file_put_contents("JSON/BarangMasuk.json", $json)){
    echo "File JSON sukses dibuat...";
} else {
    echo "Oops! Terjadi error saat membuat file JSON...";
}
?>