# Simple-Crud

Aplikasi web CRUD (Create, Read, Update, Delete) sederhana untuk mengelola data barang atau produk. Proyek ini dibangun menggunakan PHP native (tanpa framework) dengan desain tampilan menggunakan CSS murni.

## 📋 Fitur & Fungsi File

Berdasarkan struktur file di dalam repositori, aplikasi ini memiliki alur kerja manajemen data produk sebagai berikut:

*   **Menampilkan Data (Read):** 
    *   `tabelProduk.php`: Halaman utama untuk melihat daftar seluruh produk yang tersimpan di database.
*   **Tambah Data (Create):**
    *   `tambah.php`: Formulir antarmuka untuk memasukkan data produk baru.
    *   `proses_tambah.php`: Skrip backend untuk memproses input dan menyimpannya ke database.
*   **Ubah Data (Update):**
    *   `edit.php`: Formulir antarmuka untuk mengubah data produk yang sudah ada (mengambil data lama berdasarkan ID).
    *   `update.php`: Skrip backend untuk memproses perubahan data dan memperbaruinya di database.
*   **Hapus Data (Delete):**
    *   `delete.php`: Skrip untuk menghapus data produk dari database berdasarkan ID yang dipilih.
*   **Tampilan & Database:**
    *   `css/` & `Style.css`: File pengatur gaya untuk mempercantik antarmuka halaman.
    *   `databarang.sql`: Berisi skema struktur tabel dan database awal.

## 🛠️ Teknologi yang Digunakan

*   **Bahasa Pemrograman:** PHP (82.8%)
*   **Styling Tampilan:** CSS (17.2%)
*   **Database:** MySQL (Skema via `databarang.sql`)

## 🚀 Panduan Instalasi (Localhost)

1.  **Persiapkan Web Server Lokal**
    Pastikan komputer Anda sudah terinstal XAMPP, Laragon, atau aplikasi server lokal sejenis yang mendukung PHP dan MySQL.
2.  **Unduh / Clone Repositori**
    Masuk ke direktori root server Anda (misal folder `htdocs` pada XAMPP) lalu clone repositori ini:
    ```bash
    git clone [https://github.com/ImZard/Simple-Crud.git](https://github.com/ImZard/Simple-Crud.git)
    ```
3.  **Impor Database**
    *   Buka browser dan akses `http://localhost/phpmyadmin`.
    *   Buat database baru dengan nama `databarang` (atau nama lain pilihan Anda).
    *   Buka tab **Import**, pilih file `databarang.sql` dari folder proyek, lalu klik **Go/Import**.
4.  **Konfigurasi Koneksi**
    Buka file PHP yang bertugas menghubungkan ke database (periksa kode di dalam `tabelProduk.php` atau file eksternal jika ada). Pastikan konfigurasi *host*, *username*, *password*, dan *nama database* sudah disesuaikan dengan server lokal Anda.
5.  **Jalankan Aplikasi**
    Buka browser Anda dan akses alamat berikut:
    ```text
    http://localhost/Simple-Crud/tabelProduk.php
    ```

## 👤 Pembuat

*   **Zard** - [@ImZard](https://github.com/ImZard)

# Simple-Crud

A simple CRUD (Create, Read, Update, Delete) web application to manage item or product data. This project is built using native PHP (without frameworks) and styled with pure CSS.

## 📋 Features & File Functions

Based on the repository's file structure, the application manages product records with the following workflow:

*   **Display Data (Read):** 
    *   `tabelProduk.php`: The main page displaying the table list of all products stored in the database.
*   **Create Data (Create):**
    *   `tambah.php`: The user interface form to input new product data.
    *   `proses_tambah.php`: The backend script that processes the form input and saves it into the database.
*   **Update Data (Update):**
    *   `edit.php`: The user interface form to edit existing product details (fetches data based on ID).
    *   `update.php`: The backend script that handles the edited input and updates the record in the database.
*   **Delete Data (Delete):**
    *   `delete.php`: The script responsible for removing a specific product from the database based on the selected ID.
*   **Styling & Database:**
    *   `css/` & `Style.css`: Stylesheet files used to design the user interface layout.
    *   `databarang.sql`: Contains the database schema and table structures needed for the app.

## 🛠️ Tech Stack

*   **Programming Language:** PHP (82.8%)
*   **Styling:** CSS (17.2%)
*   **Database:** MySQL (Schema provided via `databarang.sql`)

## 🚀 Installation Guide (Localhost)

1.  **Prepare the Local Web Server**
    Ensure you have a local web server environment installed (such as XAMPP, Laragon, or WAMP) that supports PHP and MySQL.
2.  **Clone the Repository**
    Navigate to your web server's root directory (e.g., the `htdocs` folder for XAMPP) and run:
    ```bash
    git clone [https://github.com/ImZard/Simple-Crud.git](https://github.com/ImZard/Simple-Crud.git)
    ```
3.  **Import the Database**
    *   Open your browser and navigate to `http://localhost/phpmyadmin`.
    *   Create a new database named `databarang` (or any name you prefer).
    *   Go to the **Import** tab, upload the `databarang.sql` file from the repository folder, and click **Go/Import**.
4.  **Configure Database Connection**
    Open the PHP files handling the database connection (check scripts inside `tabelProduk.php` or any config files). Ensure the connection credentials (*host*, *username*, *password*, and *database name*) match your local server environment setup.
5.  **Run the Application**
    Open your browser and visit:
    ```text
    http://localhost/Simple-Crud/tabelProduk.php
    ```

## 👤 Author

*   **Zard** - [@ImZard](https://github.com/ImZard)
