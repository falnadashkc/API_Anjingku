<?php
require("koneksi.php");

$perintah = "SELECT * FROM Anjing";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia!";
        $response["Data"] = array();
        
        while($get = mysqli_fetch_object($eksekusi)){
            $var["Id"] = $get->Id;
            $var["Nama"] = $get->Nama;
            $var["Warna"] = $get->Warna;
            $var["Tentang"] = $get->Tentang;
            $var["Asal"] = $get->Asal;
            $var["keunikan"] = $get->keunikan;
            
            array_push($response["Data"], $var);
        }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "tidak ada data";
}
echo json_encode($response);
mysqli_close($konek);