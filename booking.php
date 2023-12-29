<?php
session_start();
include('components/config/conn.php');
$query = mysqli_query($connect, "SELECT * FROM booking where tanggal_book = CURDATE()");
$jumlah = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Booking</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>
    <?php
    // Check the status parameter in the URL
    $status = isset($_GET['status']) ? $_GET['status'] : '';

    if ($status == 'full') {
        echo "<script>alert('Maaf, tanggal yang anda pilih sudah penuh. Silahkan pilih tanggal lain.')</script>";
    } elseif ($status == 'success') {
        $kode_book = isset($_GET['kode_book']) ? $_GET['kode_book'] : '';
        echo "<script>alert('Booking berhasil! Kode Booking: $kode_book')</script>";
    }
    ?>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="form-header">
                            <h1>Book Service</h1>
                        </div>
                        <form action="f_booking.php" method="post">
                            <?php
                            $query = "SELECT * FROM user WHERE username_user = '" . $_SESSION['username_user'] . "'";
                            $result = mysqli_query($connect, $query);
                            $row = mysqli_fetch_array($result);
                            $username = $_SESSION['username_user'];
                            $result_user = mysqli_query($connect, "SELECT nama_lengkap FROM user WHERE username_user = '$username'");
                            $row_user = mysqli_fetch_assoc($result_user);
                            $id_user = $row_user['nama_lengkap'];
                            ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Nama Lengkap</span>
                                        <input class="form-control" name="username" id="nama_leng" type="text" value="<?php echo $id_user ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Phone</span>
                                        <input class="form-control" name="phone" type="text" value="<?php echo $row['no_hp'] ?>">
                                        <?php
                                        $query1 = mysqli_query($connect, "SELECT tanggal FROM `booking`");
                                        $row1 = mysqli_fetch_array($query1);
                                        ?>
                                        <input class="form-control" name="tanggal" id="tanggal" type="hidden" value="<?php echo $row1['tanggal'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Alamat</span>
                                        <input class="form-control" name="alamat" type="text" value="<?php echo $row['alamat'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Plat Nomor</span>
                                        <input class="form-control" name="plat" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Nama Motor</span>
                                        <input class="form-control" name="nama" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Tahun Kendaraan</span>
                                        <input class="form-control" name="tahun" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Paket Service</span>
                                        <select class="form-control" name="paket" id="paket">
                                            <?php
                                            $query = mysqli_query($connect, "SELECT * FROM paket_service");
                                            $idpaket = $data['id_paket'];
                                            ?>
                                            <option value='' <?php if ($idpaket == '') echo 'selected'; ?>>Pilih Paket</option>
                                            <?php
                                            // Fetch data from the "items" table
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($data = mysqli_fetch_array($query)) {

                                                    $selected = ($data['id_paket'] == $idpaket) ? 'selected' : '';
                                                    echo "<option value='" . $data["id_paket"] . "'$selected>" . $data["nama_paket"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Turun Mesin (Overhoul)</span>
                                        <select class="form-control" name="turun" id="turun">
                                            <?php
                                            $query = mysqli_query($connect, "SELECT * FROM turun_mesin");
                                            $idturun = $data['id_nama_turun_mesin'];
                                            ?>
                                            <option value='' <?php if ($idturun == '') echo 'selected'; ?>>Pilih Turun Mesin</option>
                                            <?php
                                            // Fetch data from the "items" table
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $selected = ($data['id_nama_turun_mesin'] == $idturun) ? 'selected' : '';
                                                    echo "<option value='" . $data["id_nama_turun_mesin"] . "'$selected>" . $data["nama_turun_mesin"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span class="form-label">Tanggal</span>
                                        <input class="form-control" name="tanggal" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Keluhan</span>
                                        <input class="form-control" name="keluhan" type="text">
                                        <?php
                                        $query = mysqli_query($connect, "SELECT * FROM `status`");
                                        $data = mysqli_fetch_array($query);
                                        $idstatus = $data['id_nama_status'];
                                        ?>
                                        <input type="hidden" name="status" id="status" value="<?php echo $idstatus = 4 ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Jam</span>
                                        <input class="form-control" name="jam" type="time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the URL contains the kode_book parameter
            var urlParams = new URLSearchParams(window.location.search);
            var kodeBook = urlParams.get('kode_book');

            if (kodeBook) {
                var fullName = document.getElementById('nama_leng').value;
                var currentDate = document.getElementById('tanggal').value;
                // If kode_book parameter is present, display the modal
                var modal = document.createElement("div");
                modal.innerHTML = '<div class="card modal-card">' +
                    '<div class="card-header" style="background-color: #007BFF; color: #fff;">Ticket Booking</div>' +
                    '<div class="card-body">' +
                    '<p style="font-size: 18px;">Nomor Antrian: ' + kodeBook + '</p>' +
                    '<p style="font-size: 18px;">Nama: ' + fullName + '</p>' +
                    '<p style="font-size: 18px;">Tanggal: ' + currentDate + '</p>' +
                    '<button id="closeModalBtn" style="background-color: #dc3545; color: #fff; border: none; padding: 10px; cursor: pointer;">Close</button>' +
                    '</div></div>';

                modal.style.position = "fixed";
                modal.style.top = "50%";
                modal.style.left = "50%";
                modal.style.transform = "translate(-50%, -50%)";
                modal.style.zIndex = "1000";
                modal.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
                modal.style.color = "#fff";
                modal.style.padding = "20px";
                modal.style.borderRadius = "10px";
                modal.style.boxShadow = "0px 0px 10px rgba(0, 0, 0, 0.5)";

                document.body.appendChild(modal);

                // Add an event listener to the close button
                var closeModalBtn = document.getElementById("closeModalBtn");
                closeModalBtn.addEventListener("click", function() {
                    // Remove the modal when the close button is clicked
                    document.body.removeChild(modal);
                    window.location.href = 'home.php';
                });
            }
        });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>