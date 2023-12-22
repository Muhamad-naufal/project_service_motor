<?php
include "../components/config/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="nota.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="laporan.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Laporan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Laporan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                <div class="tombol_print" style="margin-left: 10px;">
                    <button type="button" class="btn btn-primary" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1 class="text-center">Laporan Service</h1>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <h5 class="text-center">
                                    <?php
                                    $tanggal = mysqli_query($connect, "SELECT tanggal FROM booking");
                                    $data5 = mysqli_fetch_array($tanggal);
                                    // Ubah format tanggal
                                    $tanggalBaru = date('l, d F Y');

                                    // Tampilkan tanggal baru
                                    echo $tanggalBaru;
                                    ?>
                                </h5>
                                <th>No Booking</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Nama Kendaraan</th>
                                <th>Plat Nomor</th>
                                <th>Tahun</th>
                                <th>Service</th>
                                <th>Turun Mesin</th>
                                <th>Keluhan</th>
                                <th>Tanggal Book</th>
                                <th>Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2 = mysqli_query($connect, "SELECT * FROM booking as b 
                join user as u on b.id_user = u.id_nama_user 
                join turun_mesin as k on b.id_turun_mesin = k.id_nama_turun_mesin
                join paket_service as s on b.id_paket_service = s.id_paket
                left join `status` as st on b.id_status = st.id_nama_status");
                            while ($data2 = mysqli_fetch_array($sql2)) {
                                $idstatus = $data2['id_nama_status'];
                            ?>
                                <tr>
                                    <td><?php echo $data2['id_booking'] ?></td>
                                    <td><?php echo $data2['nama_lengkap'] ?></td>
                                    <td><?php echo $data2['tanggal'] ?></td>
                                    <td><?php echo $data2['nama_motor'] ?></td>
                                    <td><?php echo $data2['plat_no'] ?></td>
                                    <td><?php echo $data2['tahun_kendaraan'] ?></td>
                                    <td><?php echo $data2['nama_paket'] ?></td>
                                    <td><?php echo $data2['nama_turun_mesin'] ?></td>
                                    <td><?php echo $data2['keluhan'] ?></td>
                                    <td><?php echo $data2['tanggal_book'] ?></td>
                                    <td><?php echo $data2['jam'] ?></td>
                                    <td>
                                        <select class="form-control" id="statusDropdown_<?php echo $data2['id_booking']; ?>" onchange="updateStatus(this, <?php echo $data2['id_booking']; ?>)">
                                            <option value='' <?php if ($idstatus == '') echo 'selected'; ?>>pilih Status</option>
                                            <?php
                                            // Fetch data from the "items" table
                                            $query = mysqli_query($connect, "SELECT * FROM `status`");
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($data3 = mysqli_fetch_array($query)) {
                                                    $selected = ($data3['id_nama_status'] == $idstatus) ? 'selected' : '';
                                                    echo "<option value='" . $data3["id_nama_status"] . "'$selected>" . $data3["status"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>

                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <script src="https://kit.fontawesome.com/25db4f44a1.js" crossorigin="anonymous"></script>
</body>

</html>