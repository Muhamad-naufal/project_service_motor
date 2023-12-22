<?php
include "../components/config/conn.php"; // Make sure to include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your nota content is passed through POST
    $idbok = $_POST['id_book'];
    $harga = $_POST['harga'];
    $notaContent = $_POST['service_details'];

    // You may want to perform additional validation and sanitation here

    // Insert nota into the database
    $insertNotaQuery = "INSERT INTO nota (id_booking_data, content, harga) VALUES ('$idbok','$notaContent','$harga')";
    $result = mysqli_query($connect, $insertNotaQuery);
    header("Location: index.php");
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($connect);
