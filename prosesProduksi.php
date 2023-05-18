<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['date'];
    $komoditas = $_POST['komoditas'];

    

    $sql = "SELECT * FROM dataKomoditas WHERE nama = '$komoditas' ORDER BY kode DESC LIMIT 1"  ;
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($query);
    $kode = $data['kode'];
    
    $cek = check($tanggal, $kode);

    if($cek == 1){
        echo 'data anda sudah ada';
    }
    else{
        $input = "INSERT INTO produksi (date,komoditas_kode,jumlah ) VALUE ('$tanggal','$kode', '$jumlah')";
        $query = mysqli_query($db, $input);
        if($query){
            echo "sukses";
        }
 
            if(mysqli_error($db)){
                echo "error";
            }
  
    }

} else {
    die("Akses dilarang...");
}


function check($tanggal, $kode){

    include("config.php");

    $cek = "SELECT * FROM produksi where date= '$tanggal' and komoditas_kode = '$kode'"  ;
    $query = mysqli_query($db, $cek);
    $data = mysqli_fetch_array($query);
    

    if($tanggal != $data['date'] && $kode !=$data['komoditas_kode'] ){
        return 0;
    }
    else{
        return 1;
    }
   
}



?>