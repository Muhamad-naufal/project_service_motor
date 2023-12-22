<?php
// include koneksi database
include "../components/config/conn.php";

if (isset($_GET['booking_id']) && isset($_GET['selected_status'])) {
    $bookingId = $_GET['booking_id'];
    $selectedStatus = $_GET['selected_status'];

    // Update nilai status di database
    $updateQuery = "UPDATE booking SET id_status = '$selectedStatus' WHERE id_booking = '$bookingId'";
    $updateResult = mysqli_query($connect, $updateQuery);

    if ($updateResult) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($connect);
    }
} else {
    echo "Invalid parameters";
}

// Tutup koneksi
mysqli_close($connect);
