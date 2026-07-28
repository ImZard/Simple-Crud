<?php
// untuk koneksi ke database
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'databarang'; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// untuk ngecek parameter query menggunakan metode POST
if (isset($_POST['query'])) {
    // Mendapatkan query update dari parameter 'query'
    $updateQuery = $_POST['query'];

    // ini untuk query update
    if (mysqli_query($conn, $updateQuery)) {
        echo "success";
    } else {
        echo "error";
    }
}

// untuk menutup koneksi
mysqli_close($conn);
?>
