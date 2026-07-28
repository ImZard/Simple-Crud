<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Penjualan</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container">
<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'databarang'; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// mengecek parameter ID
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    
    $query = "SELECT * FROM tbproduk WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['back'])) {
                
                header("Location: tabelProduk.php");
                exit;
            } else {
                
                $jenisproduk = $_POST['jenisproduk'];
                $deskripsi = $_POST['deskripsi'];
                $gambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name'])); // Ambil data gambar

                
                $updateQuery = "UPDATE tbproduk SET jenisproduk = '$jenisproduk', deskripsi = '$deskripsi', gambar = '$gambar', updatedate = NOW() WHERE id = '$id'";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "Product berhasil diupdate";
                    echo "<br><br>";
                    echo "<button class='back-button' onclick=\"window.location.href='tabelProduk.php'\">OK</button>";
                    exit; 
                } else {
                    echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
                }
            }
        } else {
            // tampilan form update data
            echo "<h2>Edit Produk</h2>";
            echo "<form action='' method='POST' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<label for='jenisproduk'>Jenis Produk:</label><br>";
            echo "<input type='text' name='jenisproduk' value='" . $row['jenisproduk'] . "'><br><br>";

            echo "<label for='deskripsi'>Deskripsi:</label><br>";
            echo "<textarea name='deskripsi'>" . $row['deskripsi'] . "</textarea><br><br>";

            echo "<label for='gambar'>Gambar:</label><br>";
            echo "<div class='file-input'>";
            echo "<input type='file' name='gambar' onchange='previewImage(event)'><br><br>";
            if ($row['gambar']) {
                echo "<img id='preview-image' src='data:image/jpeg;base64," . base64_encode($row['gambar']) . "' alt='Gambar Produk' width='200' height='200'><br><br>";
            } else {
                echo "<img id='preview-image' src='' alt='Gambar Produk' width='200' height='200'><br><br>";
            }
            echo "</div>";
            echo "<div class='button-container'>";
            echo "<button class='button tambah' type='submit'>Save</button>";
            echo "<button class='button back' name='back'>Kembali</button>";
            echo "</div>";
            echo "</form>";
        }
    } else {
        echo "Data tidak ditemukan.";
    }
}

mysqli_close($conn);
?>

<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var imgElement = document.getElementById("preview-image");
            imgElement.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
</div>
</body>
</html>
