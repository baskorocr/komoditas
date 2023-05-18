<?php include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>

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
 </div>
   
       <script>
        window.print();
       </script> 
 
</body>
</html>