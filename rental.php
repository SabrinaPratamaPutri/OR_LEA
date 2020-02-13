<?php 
session_start();

include 'koneksi.php';

if(!isset($_SESSION['login'])){
  header('Location: login.php');
}

if(isset($_POST['rental'])){

  $Nama = $_POST['Nama'];
  $No_KTP = $_POST['No_KTP'];
  $Alamat = $_POST['Alamat'];
  $No_HP = $_POST['No_HP'];
  $ID_Mobil = $_POST['ID_Mobil'];
  $Lama = $_POST['Lama'];
  $ID_Kasir = $_SESSION['Username'];

  $result = mysqli_query($conn, "INSERT INTO rentalmobil (Nama,No_KTP,Alamat,No_HP,ID_Kasir,ID_Mobil,Lama,Status) values ('$Nama','$No_KTP','$Alamat','$No_HP','$ID_Kasir','$ID_Mobil',$Lama,'DISEWA')");

  $StatusMobil = mysqli_query($conn, " UPDATE mobil SET Status='DISEWA' WHERE ID_Mobil = '$ID_Mobil' ");

  header('Location: home.php');
  }

?>


<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Rental Mobil
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="rental.php">
              <i class="ni ni-planet text-blue"></i> Rental
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mobil.php">
              <i class="ni ni-delivery-fast text-orange"></i> Mobil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pengembalian.php">
              <i class="ni ni-check-bold text-yellow"></i> Pengembalian
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html"></a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['Username']; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      
    <div class="container-fluid"> 

      <div class="card mb-3">
        <div class="card-body">

        <div class="card-body">


        <form action="" method="post">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Peminjam</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="Nama" placeholder="Nama Peminjam" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No KTP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="No_KTP" placeholder="No KTP" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="Alamat" placeholder="Alamat" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="No_HP" placeholder="Nomor HP" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobil</label>
                <div class="col-sm-10">
                  <select name="ID_Mobil" class="form-control" id="exampleFormControlSelect1">
                    <?php 

                    $koderesult = mysqli_query($conn,"SELECT * FROM mobil WHERE Status='Ready' ORDER BY ID_Mobil");
                    while($kode = mysqli_fetch_assoc($koderesult))  : ;  ?>

                         <option value="<?php echo $kode['ID_Mobil'];?>"><?php echo $kode['ID_Mobil']; ?> - <?php echo $kode['Merk']; ?></option>

                   <?php endwhile; ?>

                 </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lama ( Hari )</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="Lama" placeholder="Lama" autocomplete="off">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="rental">Submit</button>

            <br>
            <br>
        
        </form>

        </div>
        </div>
      </div>
      </div>

    </div>
  </div>
  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.1"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>