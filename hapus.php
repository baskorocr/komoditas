<?php

include("config.php");



    // ambil id dari query string
    $id = $_GET['id'];
  
    // buat query hapus
    $sql = "DELETE FROM dataKomoditas WHERE kode= '$id'";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        die("berhasil");
    } else {
        die("gagal menghapus...");
    }



?>