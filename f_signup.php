<?php
include "components/config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nohp = $_POST["nohp"];

    // SQL query to fetch user from the database
    $sql = "INSERT INTO `user` (`nama_lengkap`, `username_user`, `password`, `alamat`, `no_hp`) 
    VALUES ('$nama','$username', '$password' , '$alamat', '$nohp')";
    $result = $connect->query($sql);
    if ($result) {
        // Jika berhasil, arahkan ke halaman login.php
        // Jika berhasil, set pesan notifikasi
        session_start();
        $_SESSION['success_message'] = "Registrasi Berhasi, Silahkan Login.";
        header('Location: index.php');
        exit(); // Penting untuk memastikan tidak ada kode ekstra yang dijalankan setelah header
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan atau lakukan sesuai kebutuhan Anda
        session_start();
        $_SESSION['error_message'] = "Registrasi Gagal, Silahkan Coba Lagi.";
        echo "Error: " . $connect->error;
    }
}

// Tutup koneksi
$connect->close();
