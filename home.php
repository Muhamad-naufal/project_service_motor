<?php
session_start();
include "components/config/conn.php";
$query = mysqli_query($connect, "SELECT * FROM booking where tanggal_book = CURDATE()");
$jumlah = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="components/public/assets/styles.css" />
  <title>Wandi Motor</title>
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
  </style>

</head>

<body>
  <header class="header">
    <nav>
      <div class="nav__bar">
        <div class="logo nav__logo"><a href="#">
            <h1>Wandi Motor</h1>
          </a>
        </div>
        <div class="nav__menu__btn" id="menu-btn"><i class="ri-menu-3-line"></i></div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">HOME</a></li>
        <li><a href="booking.php" <?php echo ($jumlah >= 20) ? 'disabled' : ''; ?>>BOOKING</a></li>
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
        <h1>Detail,
          Dedikasi,
          dan Kepuasan Pelanggan</h1>
        <div class="header__btn"><a href="booking.php"><button class="btn">BOOK NOW</button></a></div>
      </div>
    </div>
  </header>
  <section class="banner__container">
    <div class="banner__card">
      <h4>Layanan Service Untuk</h4>
      <?php
      if ($jumlah < 20) {
        echo "<h4 class='text-light'>Hari ini: " . $jumlah . " sedang dalam pelayanan.</h4>";
      } else if ($jumlah >= 20) {
        echo "<h4 class='text-light'>Hari ini: PENUH</h4>";
      }
      ?>
    </div>
    <div class="banner__card">
      <h4>Layanan Pemesanan Online</h4>
    </div>
    <div class="banner__image"><img src="components/public/assets/images/diskus.jpeg" alt="banner" /></div>
  </section>
  <section class="service" id="service">
    <div class="section__container service__container">
      <p class="section__subheader">WHY CHOOSE US</p>
      <h2 class="section__header">Service Motor Terbaik</h2>
      <p class="section__description">Percayakan kepada kami untuk menjaga mobil Anda tetap berjalan lancar dan andal. </p>
      <div class="service__grid">
        <div class="service__card"><img src="components/public/assets/images/gantioli.jpeg" alt="service" />
          <h4>Pelayanan Oli dan Flushing</h4>
          <p>Layanan penggantian oli mesin dan sistem flush untuk menjaga performa mesin. </p>
        </div>
        <div class="service__card"><img src="components/public/assets/images/rutin.jpg" alt="service" />
          <h4>Pemeriksaan Rutin</h4>
          <p>Penawaran pemeriksaan rutin atau perawatan berkala untuk memastikan bahwa motor berfungsi optimal. </p>
        </div>
        <div class="service__card"><img src="components/public/assets/images/listrik.jpg" alt="service" />
          <h4>Perbaikan Elektronik</h4>
          <p>Kemampuan untuk memperbaiki dan mengatasi masalah elektronik pada motor,
            seperti sistem injeksi bahan bakar dan sensor elektronik lainnya. </p>
        </div>
        <div class="service__card"><img src="components/public/assets/images/perawatan.jpeg" alt="service" />
          <h4>Pembersihan dan Perawatan Motor</h4>
          <p>Fasilitas untuk mencuci dan merawat penampilan luar motor,
            termasuk pembersihan dan poles. </p>
        </div>
      </div>
    </div>
  </section>
  <div class="footer__bar">Copyright © 2023 FixMyRide. All rights reserved. </div>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="components/public/assets/main.js"></script>
  <script>
    function toggleDropdown() {
      var dropdownContent = document.querySelector('.dropdown-content');
      dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
    }
  </script>
</body>

</html>