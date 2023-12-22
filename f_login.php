<?php
include "components/config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["pass"];

    // SQL query to fetch user from the database
    $sql = "SELECT * FROM `user` WHERE username_user = '$username' AND password = '$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        session_start();
        $_SESSION["username_user"] = $username;
        echo '<script>alert("Login berhasil"); window.location.href = "home.php";</script>';
        exit();
    } else {
        // Login failed
        echo '<script>alert("Invalid username or password"); window.location.href = "index.php";</script>';
    }
}

// Tutup koneksi
$connect->close();
