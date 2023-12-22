<?php
session_start();
include 'components/config/conn.php';
function formatTanggal($tanggal)
{
    // Convert the date to a timestamp
    $timestamp = strtotime($tanggal);

    // Format the date as "l, j F Y" (hari, tanggal bulan tahun)
    $formattedDate = date('l, j F Y', $timestamp);

    return $formattedDate;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="components/public/assets/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Wandi Motor</title>
    <!-- Add this script tag to include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to handle print button click
        function handlePrintButtonClick(nama, harga, content, kodeh) {
            // You can customize the print pop-up here
            Swal.fire({
                title: 'Nota Pembayaran',
                html: '<img src="img/logo.jpg" style="width: 100px; margin-left: 170px; margin-bottom: 20px;">' +
                    '<p><strong>No Antrian:</strong> ' + kodeh + '</p>' +
                    '<p><strong>Nama:</strong> ' + nama + '</p>' +
                    '<p><strong>Detail Service:</strong> ' + content + '</p>' +
                    '<p><strong>Harga: Rp.</strong> ' + harga + '</p>',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText: 'Confirm',
                confirmButtonColor: '#28a745',
            }).then((result) => {});
        }

        // Wait for the DOM content to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Get all print buttons
            var printButtons = document.querySelectorAll('.btn-print');

            // Attach click event listener to each print button
            printButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Extract the code, content, nama, and harga from the button's data attributes
                    var kode = button.getAttribute('data-kode');
                    var content = button.getAttribute('data-content');
                    var nama = button.getAttribute('data-nama');
                    var harga = button.getAttribute('data-harga');
                    var kodeh = button.getAttribute('data-kodeh');

                    // Call the function to handle the print button click
                    handlePrintButtonClick(nama, harga, content, kodeh);
                });
            });
        });
    </script>

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown img {
            width: 70px;
            cursor: pointer;
            border-radius: 50%;
            /* Optional: Add a border radius for a circular image */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            width: 100px;
            padding: 8px;
            z-index: 1;
            margin-left: -15px;
        }

        a {
            text-decoration: none;
        }

        .dropdown-content a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .table-container {
            overflow-x: auto;
            /* Jika tabel melebihi lebar container, tambahkan scrollbar horizontal */
        }

        .mantap-table {
            margin-left: 10px;
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .mantap-table th {
            border: 1px solid #ddd;
            /* Garis tepi */
            padding: 12px;
            text-align: left;
        }

        .mantap-table td {
            border: 1px solid #ddd;
            /* Garis tepi */
            padding: 12px;
            text-align: left;
            color: white;
        }

        .mantap-table th {
            background-color: #f2f2f2;
            /* Warna latar header */
        }

        /* Hover effect */
        .mantap-table tbody tr:hover {
            background-color: #333;
            /* Warna latar saat dihover */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body style="background-color: #333;">
    <nav>
        <div class="nav__bar">
            <div class="logo nav__logo"><a href="#">
                    <h1>Wandi Motor</h1>
                </a>
            </div>
            <div class="nav__menu__btn" id="menu-btn"><i class="ri-menu-3-line"></i></div>
        </div>
        <ul class="nav__links" id="nav-links">
            <li><a href="home.php">HOME</a></li>
            <li><a href="booking.php">BOOKING</a></li>
            <li><a href="histori.php">HISTORY</a></li>
            <li>
                <div class="dropdown">
                    <div style="display: flex; margin-left:10px">
                        <img src="components/public/assets/images/profil.png" style="width: 70px;" onclick="toggleDropdown()">
                        <h4 style="margin-top: 22px; font-size:18px; color:white; font-weight:100"><?php echo $_SESSION['username_user'] ?></h4>
                    </div>

                    <div class="dropdown-content">
                        <a href="signout.php">Sign Out</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="section__container header__container" id="home">
        <div class="header__content">
            <h1 style="margin-left:430px; margin-top:-170px">History</h1>
        </div>
    </div>
    <div class="mantap" style="margin-left: 100px; margin-top:-150px; margin-bottom:70px;">
        <div class="mantap1">
            <div class="table-container">
                <table class="mantap-table">
                    <thead>
                        <tr>
                            <th>No Antriean</th>
                            <th>Username</th>
                            <th>Tanggal</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_SESSION['username_user'];
                        $sql2 = mysqli_query($connect, "SELECT * FROM booking as b 
                        join user as u on b.id_user = u.id_nama_user 
                        join turun_mesin as k on b.id_turun_mesin = k.id_nama_turun_mesin
                        join paket_service as s on b.id_paket_service = s.id_paket
                        join `status` as st on b.id_status = st.id_nama_status
                        where username_user='$id' order by kode_book desc");
                        while ($data2 = mysqli_fetch_array($sql2)) {
                            $idstatus = $data2['id_nama_status'];
                            $kode = $data2['kode_book'];
                            $idbok = $data2['id_booking'];
                        ?>
                            <tr>
                                <td><?php echo $data2['kode_book'] ?></td>
                                <td><?php echo $data2['username_user'] ?></td>
                                <td><?php echo $data2['tanggal'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $kode ?>">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>
                                    <?php
                                    $dooo = mysqli_query($connect, "SELECT * FROM booking as b 
                                    join user as u on b.id_user = u.id_nama_user 
                                    join turun_mesin as k on b.id_turun_mesin = k.id_nama_turun_mesin
                                    join paket_service as s on b.id_paket_service = s.id_paket
                                    join `status` as st on b.id_status = st.id_nama_status
                                    join nota as n on b.id_booking = n.id_booking_data
                                    where id_booking_data='$idbok'");
                                    $doyoo = mysqli_fetch_array($dooo);
                                    $idnot = isset($doyoo['id_nota']) ? $doyoo['id_nota'] : null;
                                    $content = isset($doyoo['content']) ? $doyoo['content'] : null;
                                    $nama = isset($doyoo['nama_lengkap']) ? $doyoo['nama_lengkap'] : null;
                                    $harga = isset($doyoo['harga']) ? $doyoo['harga'] : null;
                                    $kode_book = isset($doyoo['kode_book']) ? $doyoo['kode_book'] : null;

                                    // Check if id_nota is null
                                    if ($idnot !== null) {
                                    ?>
                                        <button type="button" class="btn btn-success btn-print" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $idnot ?>" data-kode="<?php echo $idnot ?>" data-kodeh="<?php echo $kode_book ?>" data-content="<?php echo htmlspecialchars($content) ?>" data-nama="<?php echo $nama ?>" data-harga="<?php echo number_format($harga, 0, ',', '.') ?>">
                                            <i class="fa-solid fa-print"></i>
                                        </button>
                                    <?php
                                    } // No need for else in this case, as we simply don't render the button when id_nota is null
                                    ?>

                                <?php
                            } ?>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <?php
                            $usernamenya = $_SESSION['username_user'];

                            $query1 = mysqli_query($connect, "SELECT * FROM booking as b 
                            join user as u on b.id_user = u.id_nama_user 
                            join turun_mesin as k on b.id_turun_mesin = k.id_nama_turun_mesin
                            join paket_service as s on b.id_paket_service = s.id_paket
                            join `status` as st on b.id_status = st.id_nama_status 
                            where username_user='$usernamenya' group by kode_book order by kode_book desc");   //melakukan query pada database
                            while ($uhuy = mysqli_fetch_array($query1)) {
                                $kode = $uhuy['kode_book'];
                            ?>
                                <div class="modal fade" id="exampleModal_<?php echo $kode ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Antrian Online</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="text-center">Informasi Booking Antrian</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>No Antrian</p>
                                                        <p>Nama Lengkap</p>
                                                        <p>Plat Nomor</p>
                                                        <p>Nama Motor</p>
                                                        <p>Tahun Kendaraan</p>
                                                        <p>Service</p>
                                                        <p>Turun Mesin</p>
                                                        <p>Tanggal Booking</p>
                                                        <p>Jam</p>
                                                        <P>Status</P>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $uhuy['kode_book'] ?></p>
                                                        <p><?php echo $uhuy['nama_lengkap'] ?></p>
                                                        <p><?php echo $uhuy['plat_no'] ?></p>
                                                        <p><?php echo $uhuy['nama_motor'] ?></p>
                                                        <p><?php echo $uhuy['tahun_kendaraan'] ?></p>
                                                        <p><?php echo $uhuy['nama_paket'] ?></p>
                                                        <p><?php echo $uhuy['nama_turun_mesin'] ?></p>
                                                        <p><?php echo formatTanggal($uhuy['tanggal_book']); ?></p>
                                                        <p><?php echo $uhuy['jam'] ?></p>
                                                        <p><?php echo $uhuy['status'] ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php
                                                if ($uhuy['id_nama_status'] == 1) {
                                                ?>
                                                    <p class="text-center">Selamat, Service Sudah Selesai, Silahkan Diambil</p>
                                                <?php
                                                } else if ($uhuy['id_nama_status'] == 2) {
                                                ?>
                                                    <p class="text-center">Silahkan Tunggu sampai Status Menjadi Selesai dan dapat diambil</p>
                                                <?php
                                                } else if ($uhuy['id_nama_status'] == 3) {
                                                ?>
                                                    <p class="text-center">Silahkan Menunggu, Masih dalam Antrean</p>
                                                <?php
                                                } else if ($uhuy['id_nama_status'] == 4) {
                                                ?>
                                                    <p class="text-center">Tunggu Sebentar sampai Admin Merespon</p>
                                                <?php } ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="components/public/assets/main.js"></script>
    <script>
        function toggleDropdown() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
        }
    </script>
    <script src="https://kit.fontawesome.com/25db4f44a1.js" crossorigin="anonymous"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

</body>

</html>