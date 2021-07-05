<?php 
$conn = mysqli_connect("localhost", "root", "", "pil_invn");

$brg = query("SELECT * FROM pil_brg 
              INNER JOIN pil_ktgr 
              ON pil_brg.id_ktgr = pil_ktgr.id_ktgr 
              INNER JOIN pil_satuan
              ON pil_brg.id_satuan = pil_satuan.id_satuan");
$count_brg = count($brg);
$satuan = query("SELECT * FROM pil_satuan");
$ktgr = query("SELECT * FROM pil_ktgr");
$in = query("SELECT * FROM pil_in 
              INNER JOIN pil_brg 
              ON pil_in.id_brg = pil_brg.id_brg 
              INNER JOIN pil_ktgr 
              ON pil_brg.id_ktgr = pil_ktgr.id_ktgr
              INNER JOIN pil_satuan
              ON pil_brg.id_satuan = pil_satuan.id_satuan");
$count_in = count($in);
$out = query("SELECT * FROM pil_out 
              INNER JOIN pil_brg 
              ON pil_out.id_brg = pil_brg.id_brg 
              INNER JOIN pil_ktgr 
              ON pil_brg.id_ktgr = pil_ktgr.id_ktgr
              INNER JOIN pil_satuan
              ON pil_brg.id_satuan = pil_satuan.id_satuan");
$count_out = count($out);
$count_trx = $count_in + $count_out;
$last_in= query("SELECT * FROM pil_in 
                INNER JOIN pil_brg 
                ON pil_in.id_brg = pil_brg.id_brg 
                INNER JOIN pil_ktgr 
                ON pil_brg.id_ktgr = pil_ktgr.id_ktgr
                INNER JOIN pil_satuan
                ON pil_brg.id_satuan = pil_satuan.id_satuan 
                ORDER BY id_in 
                DESC LIMIT 3");
$last_out= query("SELECT * FROM pil_out 
                  INNER JOIN pil_brg 
                  ON pil_out.id_brg = pil_brg.id_brg 
                  INNER JOIN pil_ktgr 
                  ON pil_brg.id_ktgr = pil_ktgr.id_ktgr
                  INNER JOIN pil_satuan
                  ON pil_brg.id_satuan = pil_satuan.id_satuan 
                  ORDER BY id_out 
                  DESC LIMIT 3");
$last_brg = query("SELECT * FROM pil_brg 
                INNER JOIN pil_ktgr 
                ON pil_brg.id_ktgr = pil_ktgr.id_ktgr 
                INNER JOIN pil_satuan
                ON pil_brg.id_satuan = pil_satuan.id_satuan
                ORDER BY id_brg 
                DESC LIMIT 3");

$opname = query("SELECT b.kd_brg, 
                        b.nm_brg, 
                        b.jml_brg AS stock_barang, 
                        b.harga_brg, 
                        m.pengirim, 
                        m.stock_masuk, 
                        b.harga_brg*m.stock_masuk AS total_masuk, 
                        tb.tujuan, 
                        tb.stock_keluar, 
                        tb.tout_p*b.harga_brg AS total_keluar 
                FROM pil_brg AS b 
                INNER JOIN (
                      SELECT SUM(jml_brg_in) AS stock_masuk, 
                      pengirim, 
                      id_brg 
                      FROM pil_in 
                      GROUP BY id_brg) AS m 
                      ON m.id_brg=b.id_brg 
                      INNER JOIN (SELECT tujuan, 
                                  SUM(jml_brg_out) AS stock_keluar, 
                                  SUM(jml_brg_out) AS tout_p, id_brg 
                                  FROM pil_out 
                                  GROUP BY id_brg) AS tb 
                                  ON tb.id_brg=b.id_brg");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; 
    if( $result ){
      while( $row = mysqli_fetch_assoc( $result ) ){
      $rows[] = $row;
      }
    }
    return $rows;
}
// funtion tambah
function tambah_brg($brg) {
  global $conn;
  $kd_brg = htmlspecialchars($brg["kd_brg"]);
  $nm_brg = htmlspecialchars($brg["nm_brg"]);
  $id_ktgr = htmlspecialchars($brg["id_ktgr"]);
  $jml_brg = htmlspecialchars($brg["jml_brg"]);
  $id_satuan = htmlspecialchars($brg["id_satuan"]);
  $harga_rp = htmlspecialchars($brg["harga_brg"]);

  $harga_str = preg_replace("/[^0-9]/", "", $harga_rp);
  $harga_brg = (int) $harga_str;
  

  $cekbrg = mysqli_num_rows (mysqli_query($conn, "SELECT * FROM pil_brg 
                                            WHERE kd_brg='$kd_brg'"));
  if ($cekbrg == 0){
    $query = "INSERT INTO pil_brg
              VALUES ('', '$kd_brg', 
              '$nm_brg', 
              '$id_ktgr', 
              '$jml_brg', 
              '$id_satuan', 
              '$harga_brg')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }else {
    echo "
    <script> 
    alert('Kode Barang Sudah Ada!');
    </script>
    "; 
  }
}

function tambah_ktgr($ktgr) {
  global $conn;
  $ktgr_brg = htmlspecialchars($ktgr["tambah_kategori"]);

  $cekktgr = mysqli_num_rows (mysqli_query($conn, "SELECT * FROM pil_ktgr 
                                            WHERE ktgr_brg='$ktgr_brg'"));
  if ($cekktgr == 0){
  $query = "INSERT INTO pil_ktgr
            VALUES ('', '$ktgr_brg')";
  mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }else {
    echo "
    <script> 
    alert('Kode Barang Sudah Ada!');
    </script>
    "; 
  }
}

// in_tambah

function in_tambah($in) {
  global $conn;
  $kd_in = htmlspecialchars($in["kd_in"]);
  $tgl_in = htmlspecialchars($in["tgl_in"]);
  $kd_brg = htmlspecialchars($in["kd_brg"]);
  $nm_brg = htmlspecialchars($in["nm_brg"]);
  $id_ktgr = htmlspecialchars($in["id_ktgr"]);
  $pengirim = htmlspecialchars($in["pengirim"]);
  $jml_brg = htmlspecialchars($in["jml_brg_in"]);
  $id_satuan = htmlspecialchars($in["id_satuan"]);
  $harga_rp = htmlspecialchars($in["harga_brg"]);

  $harga_str = preg_replace("/[^0-9]/", "", $harga_rp);
  $harga_brg = (int) $harga_str;

  $cekbrg = mysqli_num_rows (mysqli_query($conn, "SELECT * FROM pil_brg 
                                            WHERE kd_brg='$kd_brg'"));
  if ($cekbrg == 0){
    $new_brg = "INSERT INTO pil_brg 
    VALUES ('', '$kd_brg', '$nm_brg', '$id_ktgr', '$jml_brg', '$id_satuan', '$harga_brg')";
    if (mysqli_query($conn, $new_brg) && $cekbrg == 0) {
      $new_id = mysqli_insert_id($conn);
      $query = "INSERT INTO pil_in 
                VALUES ('', '$kd_in', '$tgl_in', '$new_id', '$pengirim', '$jml_brg')";
      mysqli_query($conn, $query);
    } else {
      echo "Error: " . $new_brg . "<br>" . mysqli_error($conn);
    }
  }else {
    echo "
    <script> 
    alert('Kode Barang Sudah Ada!');
    </script>
    "; 
  }
  return mysqli_affected_rows($conn);
}

// function in_tambah end


// in_update



// in_update



function out_tambah($out) {
  global $conn;

  $kd_out = htmlspecialchars($out["kd_out"]);
  $tgl_out = htmlspecialchars($out["tgl_out"]);
  $id_brg = htmlspecialchars($out["id_brg"]);
  $tujuan = htmlspecialchars($out["tujuan"]);
  $jml_brg_out = htmlspecialchars($out["jml_brg"]);


  $dt = mysqli_query($conn,"SELECT * FROM pil_brg WHERE id_brg='$id_brg'");
  $data = mysqli_fetch_array($dt);
  $sisa = $data['jml_brg']-$jml_brg_out;
  $query1 = "UPDATE pil_brg set jml_brg='$sisa' where id_brg='$id_brg'";

  $query2 = "INSERT INTO pil_out (kd_out, tgl_out, id_brg, tujuan, jml_brg_out) 
  values('$kd_out', '$tgl_out', '$id_brg', '$tujuan', '$jml_brg_out')";

  mysqli_query($conn, $query1);
  mysqli_query($conn, $query2);
  return mysqli_affected_rows($conn);
}

function tambah_satuan($satuan) {
  global $conn;
  $satuan_brg = htmlspecialchars($satuan["tambah_satuan"]);

  $ceksatuan = mysqli_num_rows (mysqli_query($conn, "SELECT * FROM pil_satuan 
                                              WHERE satuan_brg='$satuan_brg'"));
  if ($ceksatuan == 0){
    $query = "INSERT INTO pil_satuan
            VALUES ('', '$satuan_brg')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }else {
    echo "
    <script> 
    alert('Kode Barang Sudah Ada!');
    </script>
    "; 
  }
}
// end funtion tambah


// function hapus
function hapus_brg($id_brg) {
  global $conn;
  mysqli_query($conn, "DELETE FROM pil_brg WHERE id_brg = $id_brg");
  return mysqli_affected_rows($conn);    
}

function hapus_ktgr($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM pil_ktgr WHERE id_ktgr = $id");
  return mysqli_affected_rows($conn);    
}

function in_hapus($id) {
  global $conn;

  mysqli_query($conn, "DELETE FROM pil_in WHERE id_in = $id");
  return mysqli_affected_rows($conn);    
}

function out_hapus($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM pil_out WHERE id_out = $id");
  return mysqli_affected_rows($conn);    
}

function hapus_satuan($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM pil_satuan WHERE id_satuan = $id");
  return mysqli_affected_rows($conn);    
}
// end function hapus


// funtion edit
function edit_brg($brg) {
  global $conn;
  $id_brg = $brg["id_brg"];
  $nm_brg = htmlspecialchars($brg["nm_brg"]);
  $id_ktgr = htmlspecialchars($brg["id_ktgr"]);
  $jml_brg = htmlspecialchars($brg["jml_brg"]);
  $id_satuan = htmlspecialchars($brg["id_satuan"]);
  $harga_rp = htmlspecialchars($brg["harga_brg"]);

  $harga_str = preg_replace("/[^0-9]/", "", $harga_rp);
  $harga_brg = (int) $harga_str;

  $query = "UPDATE pil_brg SET 
            nm_brg = '$nm_brg', 
            id_ktgr = '$id_ktgr', 
            jml_brg = $jml_brg, 
            id_satuan = '$id_satuan',
            harga_brg = '$harga_brg'
            WHERE id_brg = $id_brg";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function edit_ktgr($ktgr) {
  global $conn;
  $id_ktgr = $ktgr["id_ktgr"];
  $ktgr_brg = htmlspecialchars($ktgr["edit_kategori"]);

  $cekktgr = mysqli_num_rows (mysqli_query($conn, "SELECT * FROM pil_ktgr 
                                            WHERE ktgr_brg='$ktgr_brg'"));
  if ($cekktgr == 0){
  $query = "UPDATE pil_ktgr SET ktgr_brg = '$ktgr_brg' WHERE id_ktgr = $id_ktgr"; 
  mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }else {
    echo "
    <script> 
    alert('Kode Barang Sudah Ada!');
    </script>
    "; 
  }
}

function in_edit($in) {
  global $conn;

  $id_in = $in["id_in"];
  $id_brg = $in["id_brg"];
  $tgl_transaksi = htmlspecialchars($in["tgl_in"]);
  $pengirim = htmlspecialchars($in["pengirim"]);
  $jml_brg_in = htmlspecialchars($in["jml_brg_in"]);
  // $satuan_brg = htmlspecialchars($in["satuan_brg"]);
  $harga_rp = htmlspecialchars($in["harga_brg"]);

  $harga_str = preg_replace("/[^0-9]/", "", $harga_rp);
  $harga_brg = (int) $harga_str;

  $lihatstock = mysqli_query($conn,"SELECT * FROM pil_brg WHERE id_brg='$id_brg'");
  $stocknya = mysqli_fetch_array($lihatstock);
  $stockskrg = $stocknya['jml_brg'];

  $lihatdataskrg = mysqli_query($conn,"SELECT * FROM pil_in WHERE id_in='$id_in'"); //lihat qty saat ini
  $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
  $qtyskrg = $preqtyskrg['jml_brg_in'];//jumlah skrg

  if ($jml_brg_in >= $qtyskrg) {
    $hitungselisih = $jml_brg_in-$qtyskrg;
    $tambahistock = $stockskrg+$hitungselisih;

      $query = "UPDATE pil_brg SET 
                jml_brg = $tambahistock,
                harga_brg = $harga_brg, 
                WHERE id_brg = '$id_brg'";
      $query2 = "UPDATE pil_in SET 
                tgl_in = '$tgl_transaksi',
                pengirim = '$pengirim', 
                jml_brg_in = $jml_brg_in, 
                WHERE id_in = $id_in";
  } else {
    $hitungselisih = $jml_brg_in - $qtyskrg;
    $kurangistock = $stockskrg - $hitungselisih;

      $query = "UPDATE pil_brg SET 
                jml_brg = $kurangistock,
                harga_brg = $harga_brg, 
                WHERE id_brg = '$id_brg'";
      $query2 = "UPDATE pil_in SET 
                tgl_transaksi = '$tgl_transaksi',
                pengirim = '$pengirim', 
                jml_brg_in = $jml_brg_in, 
                WHERE id_in = $id_in";

  mysqli_query($conn, $query);
  mysqli_query($conn, $query2);
  return mysqli_affected_rows($conn);
}
}

function out_edit($out) {
  global $conn;

  $id = $out["id"];
  $tgl_transaksi = htmlspecialchars($out["tgl_transaksi"]);
  $kd_brg = htmlspecialchars($out["kd_brg"]);
  $nm_brg = htmlspecialchars($out["nm_brg"]);
  $tujuan = htmlspecialchars($out["tujuan"]);
  $jml_brg = htmlspecialchars($out["jml_brg"]);
  $satuan_brg = htmlspecialchars($out["satuan_brg"]);

  $query = "UPDATE pil_out SET 
            tgl_transaksi = '$tgl_transaksi',
            kd_brg = '$kd_brg', 
            nm_brg = '$nm_brg', 
            tujuan = '$tujuan', 
            jml_brg = $jml_brg, 
            satuan_brg = '$satuan_brg'
            WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function edit_satuan($satuan) {
  global $conn;
  $id = $satuan["id"];
  $satuan_brg = htmlspecialchars($satuan["edit_satuan"]);

  $ceksatuan = mysqli_num_rows (mysqli_query($conn, "SELECT * FROM pil_satuan 
                                                WHERE satuan_brg='$satuan_brg'"));
  if ($ceksatuan == 0){
  $query = "UPDATE pil_satuan SET satuan_brg = '$satuan_brg' WHERE id_ktgr = $id"; 
  mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }else {
    echo "
    <script> 
    alert('Kode Barang Sudah Ada!');
    </script>
    "; 
  }
}
// end funtion edit


// update stock barang masuk
function in_update($in) {
  global $conn;

  $kd_in = htmlspecialchars($in["kd_in"]);
  $tgl_in = htmlspecialchars($in["tgl_in"]);
  $id_brg = htmlspecialchars($in["id_brg"]);
  $pengirim = htmlspecialchars($in["pengirim"]);
  $jml_brg_in = htmlspecialchars($in["jml_brg"]);


  $dt = mysqli_query($conn,"SELECT * FROM pil_brg WHERE id_brg='$id_brg'");
  $data = mysqli_fetch_array($dt);
  $sisa = $data['jml_brg']+$jml_brg_in;
  $query1 = "UPDATE pil_brg set jml_brg='$sisa' where id_brg='$id_brg'";

  $query2 = "INSERT INTO pil_in (kd_in, tgl_in, id_brg, pengirim, jml_brg_in) 
  values('$kd_in', '$tgl_in', '$id_brg', '$pengirim', '$jml_brg_in')";

  mysqli_query($conn, $query1);
  mysqli_query($conn, $query2);
  return mysqli_affected_rows($conn);
}

// end update stock barang masuk

?>