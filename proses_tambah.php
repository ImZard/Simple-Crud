<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'databarang'; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ambil data dari database
$jenisproduk = $_POST['jenisproduk'];
$deskripsi = $_POST['deskripsi'];
$gambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name'])); 

// menambahkan data baru ke dalam tabel
$query = "INSERT INTO tbproduk (jenisproduk, deskripsi, gambar) VALUES ('$jenisproduk', '$deskripsi', '$gambar')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil ditambahkan.";
    echo "<br><br>";
    echo "<a href='uas.php'><button>OK</button></a>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>
