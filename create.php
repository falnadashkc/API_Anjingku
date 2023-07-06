<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = $_POST["Nama"];
    $warna = $_POST["Warna"];
    $tentang = $_POST["Tentang"];
    $asal = $_POST["Asal"];
    $keunikan = $_POST["keunikan"];
    
    $perintah = "INSERT INTO Anjing (Nama, Warna, Tentang, Asal, keuinkan) VALUES('$nama','$warna','$tentang','$asal','$keunikan')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses menyimpan data!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal meyimpan data!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data yang dikirim!";
}
echo json_encode($response);
mysqli_close($konek);