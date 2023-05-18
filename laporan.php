<?php include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>

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

<p class="d-flex justify-content-center mt-4"><strong>DATA BARANG</strong></p>  
 <br>   

<?php  
$sql = "SELECT produksi.date, datakomoditas.nama, produksi.jumlah
FROM produksi
INNER JOIN datakomoditas ON produksi.komoditas_kode=datakomoditas.kode";
$query = mysqli_query($db, $sql);
$value = array();
$bulan = array();
$tahun = array();
while($data = mysqli_fetch_assoc($query)){
    $explode = explode("-",$data['date']);
    
    for($i=1; $i<=12; $i++ ){
        $dateObj   = DateTime::createFromFormat('!m', $explode[1]);
        if($i == $explode[1]){
            $value[$i] = $data['jumlah'];
            $bulan [$i] = $dateObj->format('F');
            $tahun [$i] = $explode[0];
            break;
        }
    }
    
    
}

$tahunFix = array_values(array_unique($tahun));
$datajumlah = array_values($value);
$dataBulan = array_values($bulan);


$bulan = array(
    'January',
    'February',
    'March',
    'April',
    'Mey',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
);

echo '<div class="container">';

echo '<table  class="table">';
echo '<tr><th>Bulan/Tahun</th>';

// Menampilkan nama bulan sebagai judul kolom
foreach ($bulan as $nama_bulan) {
    echo '<th>'.$nama_bulan.'</th>';
}

echo '</tr>';
$i=0;
$cek = count($dataBulan);
// Mengisi nilai acak untuk setiap tahun dan bulan
foreach ($tahunFix as $tahun_item) {
    echo '<tr><td>'.$tahun_item.'</td>';

    foreach ($bulan as $nama_bulan) {

        if($i<$cek){
            if(isset($dataBulan[$i])){
               
                    if ($dataBulan[$i] == $nama_bulan) {
                        $nilai = $datajumlah[$i];
                        $i++;
                        
                   
                    } else {
                        $nilai = '';
                        
                    }

            }
        }
        else{
           $nilai = '';
        }
       
        
        echo '<td>'.$nilai.'</td>';
    }

    echo '</tr>';
}

echo '</table>';

echo '</div>';
?>
<div  class="d-flex justify-content-center mt-4"><a class="btn btn-primary" href="cetak.php" role="button">Cetak Data</a>
 </div>
   
        
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>