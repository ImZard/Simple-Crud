<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>List Data Produk</title>
</head>
<body>
    <div class="container">
        <button onclick="window.location.href='tambah.php'" class="button button-add">ADD NEW</button>
        <br></br>
        <h2>Semua Produk</h2>

        <?php
            //koneksi
            $host = 'localhost'; 
            $username = 'root'; 
            $password = ''; 
            $database = 'databarang'; 

            $conn = mysqli_connect($host, $username, $password, $database);

            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
            $query = "SELECT * FROM tbproduk";
            $result = mysqli_query($conn, $query);
        ?>

        <table>
            <tr>
                <th>ID</th>
                <th>Jenis Produk</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            <?php
                // tampilan tabel data produk
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['jenisproduk'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['gambar']) . "' alt='Gambar Produk' width='200' height='200'></td>";
                        echo "<td>" . date('d-m-Y H:i:s', strtotime($row['createdate'])) . "</td>";
                        echo "<td>" . date('d-m-Y H:i:s', strtotime($row['updatedate'])) . "</td>";
                        echo "<td>";
                        echo "<button onclick=\"window.location.href='edit.php?id=" . $row['id'] . "'\" class=\"button button-edit\">Edit Produk</button><br></br><br>";
                        echo "<button onclick=\"window.location.href='delete.php?id=" . $row['id'] . "'\" class=\"button button-delete\">Hapus</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data penjualan</td></tr>";
                }

                // untuk menutup koneksi
                mysqli_close($conn);
            ?>
        </table>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </div>
</body>
</html>
