<?php
  session_start();
  require 'connection/conn.php';
  $hasil = mysqli_query($conn, "SELECT * FROM pemesanan_mk Where nim_mhs = '".$_SESSION['nim_mhs']."'")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Praktikum Antar Muka</title>
</head>

<body>
  <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">SIKADUN</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="list-dsn.php">Dosen</a></li>
          <li><a href="list-mhs.php">Rombel</a></li>
          <li><a href="kurikulum.php">Kurikulum</a></li>
          <li><a href="jadwal.php">Jadwal</a></li>
          <li><a class="active" href="list-pesan-mk.php">Pemesanan MK</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="profile.php" class="get-started-btn">Profile</a>

    </div>
  </header><!-- End Header -->

  <div class="container" style="margin-top: 100px">
    <center>
      <h2>
        Pemesanan Mata Kuliah
      </h2>
    </center>
    <a href="pesan-matkul.php" class="btn btn-success" tabindex="-1" role="button" style="margin-bottom: 25px" aria-disabled="true">Pesan Mata Kuliah</a>
    <table class="table table-hover-dark">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">id_pmk</th>
          <th scope="col">nim_mhs</th>
          <th scope="col">kode_matkul</th>
          <th scope="col">status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($hasil)) {
          echo "<tr>";
          echo "<th>" . $no . "</th>";        
          echo "<td>" . $data['id_pmk'] . "</td>";
          echo "<td>" . $data['nim_mhs'] . "</td>";
          echo "<td>" . $data['kode_matkul'] . "</td>";
          echo "<td>" . $data['stat'] . "</td>";          
          echo "<td>
            <a href='delete-pmk.php?id_pmk=$data[id_pmk] ' class='btn btn-danger btn-sm' style='font-weight: 600;'>Delete</a>
            </td>";
          echo "</tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>