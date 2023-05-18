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
			<a class="navbar-brand" href="/komoditas">komoditas</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			</ul>
			</div>
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
                <form action="editProses.php" method="post" onSubmit="return validasi()">
                   
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text">NAMA</label>
                        <?php
               
                        $id = $_GET['id'];
                   
                        $sql = "SELECT * FROM dataKomoditas where kode = '$id'";
                        $query = mysqli_query($db, $sql);
                        $data = mysqli_fetch_array($query);

                       echo ' <input type="text" value='.$data['nama'].' class="form-control border border-primary" name="nama" id="nama" aria-describedby="emailHelp">';

                            ?>
                       
                        <input type="hidden" value="<?php echo $id ?>"  class="form-control border border-primary" name="id" id="kode" aria-describedby="emailHelp">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" value="Daftar" name="daftar">tambah</button>
                    </div>
                </form>
               
            </div>
        </div>

 </body>

</html>