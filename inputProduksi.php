<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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

    <?php if(isset($_GET['status'])): ?>
         <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "<div class='p-3 mb-2 bg-success text-white d-flex justify-content-center'>data telah ada</div>";
            } 
        ?>
        </p>
        <?php endif; ?>

  
    <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4 p-5 shadow-sm border rounded-3">
                <h2 class="text-center mb-4 text">Input produksi</h2>
                <form action="prosesProduksi.php" method="post" onSubmit="return validasi()">
                <?php
               
                    
  
                      ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text">Tanggal</label>
                       <?php 
                       $dt = date_create('16.10.2022');

                       echo '<input name="date" type="date" value="' . $dt->format('Y-m-d') . '" />';
                       ?>
                    </div>
                    <div class="mb-3">
                        <?php
                            $sql = "SELECT * FROM dataKomoditas";
                            $data = mysqli_query($db, $sql);
                           
                        ?>

                        <label for="exampleInputPassword1" class="form-label text">komoditas</label>
                       <select name = "komoditas" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option  >Pilih</option>
                        <?php 
                         while($datas = mysqli_fetch_array($data)){
                                                
                            echo "<option  value=".$datas['nama'].">".$datas['nama']." </option> | ";
                          
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text">Jumlah</label>
                        <input type="text"  class="form-control border border-primary" name="jumlah" id="kode" aria-describedby="emailHelp">
                        <input type="hidden" value="<?php echo $id ?>"  class="form-control border border-primary" name="id" id="kode" aria-describedby="emailHelp">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" value="Daftar" name="daftar">tambah</button>
                    </div>
                </form>
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 </body>

</html>