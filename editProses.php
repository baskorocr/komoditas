<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $id = $_POST['id'];
   
    $nama = $_POST['nama'];

    // buat query update
    $sql = "UPDATE dataKomoditas SET nama ='$nama' WHERE kode= '$id'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        echo "sukses";
    } else {
        // kalau gagal tampilkan pesan
        echo "gagal";
    }


} else {
    die("Akses dilarang...");
}

?>