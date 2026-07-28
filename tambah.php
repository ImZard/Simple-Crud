<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link href="css/bootstrap.css" rel="stylesheet">
   
</head>
<body>
    <div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // koneksi
        $host = 'localhost'; 
        $username = 'root'; 
        $password = ''; 
        $database = 'databarang'; 

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // mengambil data dari tabel
        $jenisProduk = $_POST['jenisproduk'];
        $deskripsi = $_POST['deskripsi'];

        // untuk memasukkan gambar
        $gambar = $_FILES['gambar']['tmp_name'];
        $gambarData = addslashes(file_get_contents($gambar));

        // ini query buat nambahin data
        $query = "INSERT INTO tbproduk (jenisproduk, deskripsi, gambar) VALUES ('$jenisProduk', '$deskripsi', '$gambarData')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            mysqli_close($conn);
            echo "<div class='notification'>Product berhasil ditambahkan.</div>";
            echo "<br><br>";
            echo "<button onclick=\"window.location.href='tabelProduk.php'\">OK</button>";
            exit; 
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($conn);
            mysqli_close($conn);
        }
    }
    // tampilan form tambah data
    ?>
        <h2>Tambah Produk Baru</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="jenisproduk">Jenis Produk:</label>
            <input type="text" name="jenisproduk" id="jenisproduk" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>

            <label for="gambar">Gambar:</label>
            <div class="file-input">
                <input type="file" name="gambar" id="gambar-file">
            </div>
            <div id="gambar-preview"></div>

            <div class="button-container">
                <button type="submit" class="button tambah" name="tambah">Save</button>
                <button class="button back" onclick="window.location.href='tabelProduk.php'">Kembali</button>
            </div>
        </form>

    <script>
        function showPreview(input) {
            var previewContainer = document.getElementById("gambar-preview");
            previewContainer.innerHTML = "";

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var preview = document.createElement("img");
                    preview.setAttribute("src", e.target.result);
                    preview.setAttribute("width", "200");
                    preview.setAttribute("height", "200");

                    previewContainer.appendChild(preview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        var fileInput = document.getElementById("gambar-file");

        fileInput.addEventListener("change", function() {
            showPreview(this);
        });
    </script>

    </div>
</body>
</html>
