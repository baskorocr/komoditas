<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $count = str_word_count($nama);
    if($count == NULL || $count >30){
        echo "input anda error";
    }
    else{
        $sql = "INSERT INTO dataKomoditas (kode, nama) VALUE ('$kode', '$nama')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "data terinput";
        } else {
        echo "gagal";
        }
    }

} else {
    die("Akses dilarang...");
}

?>