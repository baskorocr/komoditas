<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".hapus").click(function(){
        return confirm('Are you sure?');
    });
    });
    </script>

</script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="z">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
        <a class="navbar-brand" href="/komoditas/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/komoditas/daftarProduksi.php">daftar Produksi</a>
            <a class="nav-link" href="/komoditas/laporan.php">Laporan Produksi</a>
       
        </div>
        </div>`
  </div>
</nav>
    </header>

    <div class="d-flex justify-content-center mt-5">
        <div class="text">
        <h3 class="d-flex justify-content-center">Daftar Produksi</h3>
        
        <table class="table text mt-5 ">
            <thead>
                <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $sql = "SELECT produksi.date, datakomoditas.nama, produksi.jumlah
                    FROM produksi
                    INNER JOIN datakomoditas ON produksi.komoditas_kode=datakomoditas.kode";
                    $query = mysqli_query($db, $sql);
                    while($data = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td>".$data['date']."</td>";
                        echo "<td>".$data['nama']."</td>";
                        echo "<td>".$data['jumlah']."</td>";
                        echo "<td>";
                       
                        echo "<div class='btn-group'>";
                        echo "<a  href='hapusProduksi.php?id=".$data['date']."' class='hapus btn btn-danger'>Hapus</a>";
                        echo "<a  href='detailProduksi.php?id=".$data['date']."' class='btn btn-success'>Detail</a>";
                        echo "<a  href='inputProduksi.php' class='btn btn-primary'>Edit</a>";
                        echo '</div>';

                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
                
                
               
            </tbody>
            </table>  
            <a class="btn btn-primary" href="inputProduksi.php" role="button">Tambah Data</a> 
    </div>

    

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>




</html>