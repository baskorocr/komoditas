<?php

include("config.php");



    // ambil id dari query string
    $id = $_GET['id'];
    // buat query hapus
    $sql = "SELECT * FROM dataKomoditas WHERE kode = '$id'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($query);
    $kode = $data['kode'];

   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="/komoditas/">Komoditas</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			</ul>
			<a class="btn btn-primary" href="/datamhs/login.php" role="button">login</a>
			</div>
		</div>
		</nav>
    </header>
<div class="mt-5 ms-5"> 
        <p>Detail Komoditas</p>
        <p>kode : <?php echo $data['kode'] ?></p>
        <p>nama : <?php echo $data['nama'] ?></p>
        
</div>
</body>
</html>