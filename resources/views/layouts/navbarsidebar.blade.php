<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->

    <!-- Messages Dropdown Menu -->


    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>

      </a>



      <!-- Sidebar -->
      <!-- <div class="sidebar">
       Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sandi Permadi</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->



          <li class="nav-item">
            <a href="dasbor.php" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="listing.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Halaman Listing Produk

              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="crud2.php" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Halaman CRUD
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="pencarian.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Halaman Pencarian Produk
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>




          <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard Listing new product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Right navbar links -->
  <!-- Right navbar links -->
  <!-- Right navbar links -->
  <!-- Right navbar links -->
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
      <!-- ... (other navbar items) ... -->
      <li class="nav-item">
          <span id="clock" class="nav-link"></span>
      </li>
  </ul>

  <script>
      function updateClock() {
          var now = new Date();
          var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
          var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
          var day = days[now.getDay()];
          var month = months[now.getMonth()];
          var date = now.getDate();
          var year = now.getFullYear();
          var hours = now.getHours();
          var minutes = now.getMinutes();
          var seconds = now.getSeconds();
          var ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours ? hours : 12;
          minutes = minutes < 10 ? '0' + minutes : minutes;
          seconds = seconds < 10 ? '0' + seconds : seconds;
          var timeString = day + ', ' + date + ' ' + month + ' ' + year + ', ' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
          document.getElementById("clock").textContent = timeString;
      }


      updateClock();


      setInterval(updateClock, 1000);
  </script>

  <?php

      date_default_timezone_set('Asia/Jakarta');


      $namaHari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");


      $namaBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


      $currentTimestamp = time();
      $currentDay = $namaHari[date('w', $currentTimestamp)];
      $currentMonth = $namaBulan[date('n', $currentTimestamp) - 1];
      $currentDateTime = date('d', $currentTimestamp) . ' ' . $currentMonth . ' ' . date('Y, H:i:s a', $currentTimestamp);
      echo "<script>document.getElementById('clock').textContent = '$currentDay, $currentDateTime';</script>";
  ?>







