<?php
// Path: f_booking.php
session_start();
include 'components/config/conn.php';

function generateQueueNumber($connect)
{
    $currentQueueLetter = isset($_SESSION['current_queue_letter']) ? $_SESSION['current_queue_letter'] : 'A';
    $currentQueueNumber = isset($_SESSION['current_queue_number']) ? $_SESSION['current_queue_number'] : 1;

    $currentQueueNumber++;

    if ($currentQueueNumber > 20) {
        $currentQueueNumber = 1;
        $currentQueueLetter++;
    }

    if ($currentQueueLetter > 'Z') {
        $currentQueueLetter = 'A';
    }

    $_SESSION['current_queue_letter'] = $currentQueueLetter;
    $_SESSION['current_queue_number'] = $currentQueueNumber;

    return $currentQueueLetter . $currentQueueNumber;
}

// Validate if the selected date is full
$tanggal = $_POST["tanggal"];
$countQuery = mysqli_query($connect, "SELECT COUNT(*) as total FROM booking WHERE tanggal_book = '$tanggal'");
$countResult = mysqli_fetch_assoc($countQuery);
$jumlah = $countResult['total'];

if ($jumlah >= 20) {
    // The selected date is full, handle accordingly (redirect with a status parameter)
    header("Location: booking.php?status=full");
    exit(); // Stop further execution
}

$user_name = $_POST["username"];
$phone = $_POST["phone"];
$alamat = $_POST["alamat"];
$platnomor = $_POST["plat"];
$namamotor = $_POST["nama"];
$tahun = $_POST["tahun"];
$paket = $_POST["paket"];
$turun = $_POST["turun"];
$keluhan = $_POST["keluhan"];
$status = $_POST["status"];
$jam = date("H:i:s", strtotime($_POST["jam"]));
$username = $_SESSION['username_user'];

$result_user = mysqli_query($connect, "SELECT id_nama_user FROM user WHERE username_user = '$username'");
$row_user = mysqli_fetch_assoc($result_user);
$id_user = $row_user['id_nama_user'];

$queueNumber = generateQueueNumber($connect);

$result = mysqli_query($connect, "INSERT INTO `booking` (`id_booking`, `id_user`, `kode_book`, `tanggal_book`, `jam`, `plat_no`, `nama_motor`, `tahun_kendaraan`, `id_paket_service`, `id_turun_mesin`, `keluhan`, `id_status`) 
VALUES ('', '$id_user', '$queueNumber', '$tanggal', '$jam','$platnomor', '$namamotor', '$tahun', '$paket', '$turun', '$keluhan', '$status');");

if ($result) {
    // Booking is successful, redirect with a success status parameter
    header("Location: booking.php?status=success&kode_book=$queueNumber");
    exit(); // Stop further execution
} else {
    // Handle errors if needed
    echo "Error: " . mysqli_error($connect);
}

mysqli_close($connect);
