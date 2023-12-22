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
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea#default-editor'
    });
  </script>
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
                <a href="index.php" class="nav-link active">
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
                <a href="laporan.php" class="nav-link">
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  $sql1 = mysqli_query($connect, "SELECT COUNT(id_booking) as count_book FROM booking");
                  $data1 = mysqli_fetch_array($sql1);
                  echo $data1['count_book'];
                  ?>
                </h3>
                <p>New Booking</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $sql = mysqli_query($connect, "SELECT COUNT(id_nama_user) as count_user FROM user");
                  $data = mysqli_fetch_array($sql);
                  echo $data['count_user'];
                  ?>
                </h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Kode Booking</th>
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
                join `status` as st on b.id_status = st.id_nama_status order by kode_book desc");
            while ($data2 = mysqli_fetch_array($sql2)) {
              $idstatus = $data2['id_nama_status'];
              $idbook = $data2['id_booking'];
            ?>
              <tr>
                <td><?php echo $data2['kode_book'] ?></td>
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
                    <?php
                    // Fetch data from the "items" table
                    $query = mysqli_query($connect, "SELECT * FROM `status` ORDER BY id_nama_status DESC");
                    if (mysqli_num_rows($query) > 0) {
                      while ($data3 = mysqli_fetch_array($query)) {
                        $selected = ($data3['id_nama_status'] == $idstatus) ? 'selected' : '';
                        echo "<option value='" . $data3["id_nama_status"] . "'$selected>" . $data3["status"] . "</option>";
                      }
                    }
                    ?>
                  </select>

                  <!-- Update your button code -->
                  <input class="btn btn-success mt-1" type="button" data-toggle="modal" data-target="#buatNotaModal_<?php echo $idbook ?>" value="Buat Nota">

                </td>
              </tr>
              <!-- ... (your existing HTML code) ... -->

              <!-- Modal for "Buat Nota" -->
              <div class="modal fade" id="buatNotaModal_<?php echo $idbook ?>" tabindex="-1" role="dialog" aria-labelledby="buatNotaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="buatNotaModalLabel">Buat Nota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <?php
                      $query3 = mysqli_query($connect, "SELECT * FROM booking as b 
                            join user as u on b.id_user = u.id_nama_user 
                            join turun_mesin as k on b.id_turun_mesin = k.id_nama_turun_mesin
                            join paket_service as s on b.id_paket_service = s.id_paket
                            join `status` as st on b.id_status = st.id_nama_status
                            join `nota` as n on n.id_booking_data = b.id_booking 
                            "); //melakukan query pada database
                      $uhuy2 = mysqli_fetch_array($query3);
                      ?>
                      <!-- Add your modal content here -->
                      <form action="create_nota.php" method="POST">
                        <div class="form-group">
                          <label for="name">Nama:</label>
                          <input name="id_book" type="hidden" value="<?php echo $idbook ?>">
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $data2['nama_lengkap'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="plat_no">Plat Nomor:</label>
                          <input type="text" class="form-control" id="plat_no" name="plat_no" value="<?php echo $data2['plat_no'] ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="keluhan">Keluhan:</label>
                          <textarea class="form-control" rows="3" required><?php echo $data2['keluhan'] ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="detail_service">Detail Service:</label>
                          <textarea id="default-editor" class="form-control" name="service_details" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="harga">Harga:</label>
                          <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <!-- Add any additional buttons or actions here -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- ... (your existing HTML code) ... -->
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
  <script>
    function updateStatus(dropdown, bookingId) {
      var selectedStatus = dropdown.value;

      // Check if the selected status is "Selesai" (id_nama_status = 4)
      if (selectedStatus == 4) {
        // Show the Nota modal
        $('#createNotaModal').modal('show');
      } else {
        // Continue with the status update
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Response from the server
            location.reload();
            console.log(this.responseText);
          }
        };
        xhr.open("GET", "update_status.php?booking_id=" + bookingId + "&selected_status=" + selectedStatus, true);
        xhr.send();
      }
    }

    function submitNota() {
      // Handle nota submission here
      // For example, using AJAX to submit the form data
      var formData = new FormData(document.getElementById('createNotaForm'));

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Handle the response, e.g., close the modal, show a success message, etc.
          $('#createNotaModal').modal('hide');
          console.log(this.responseText);
        }
      };

      xhr.open("POST", "create_nota.php", true);
      xhr.send(formData);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>