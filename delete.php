<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'databarang'; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $checkQuery = "SELECT * FROM tbproduk WHERE id = '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // untuk menampilkan konfirmasi penghapusan
        echo "<script>
            var confirmed = confirm('Yakin Menghapus Produk ?');
            if (confirmed) {
                // Menghapus data berdasarkan ID
                var deleteQuery = 'DELETE FROM tbproduk WHERE id = $id';
                var xhttp = new XMLHttpRequest();
                xhttp.open('POST', 'delete.php?id=$id&confirmed=true', true);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.send('query=' + deleteQuery);
                window.location.href = 'tabelProduk.php';
            } else {
                window.location.href = 'tabelProduk.php';
            }
        </script>";
    } else {
        echo "<button onclick=\"window.location.href='tabelProduk.php'\">OK</button>";
        exit;
    }
}


if (isset($_GET['confirmed']) && $_GET['confirmed'] === 'true') {
    
    $id = $_GET['id'];

    
    $deleteQuery = $_POST['query'];
    if (mysqli_query($conn, $deleteQuery)) {
        
        $updateQuery = "SET @count = 0";
        mysqli_query($conn, $updateQuery);
        $updateQuery = "UPDATE tbproduk SET tbproduk.id = @count:= @count + 1";
        mysqli_query($conn, $updateQuery);
        $updateQuery = "ALTER TABLE tbproduk AUTO_INCREMENT = 1";
        mysqli_query($conn, $updateQuery);

        echo "Data berhasil dihapus.";
        echo "<br><br>";
        echo "<button onclick=\"window.location.href='tabelProduk.php'\">OK</button>";
        exit; 
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
