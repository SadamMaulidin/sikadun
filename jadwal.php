<?php
  session_start();
  // include 'cek_login.php';
  require 'connection/conn.php';
//   $hasil = mysqli_query($conn, "SELECT * FROM jadwal_kuliah WHERE rombel = '".$_SESSION['rombel']."'");
//   $matkul = mysqli_query($conn, "SELECT nama_matkul FROM mata_kuliah WHERE kode_matkul = '".$data['kode_matkul']."'");
  $hasil = mysqli_query($conn, "SELECT mata_kuliah.nama_matkul, mata_kuliah.sks, j.ruangan, j.jam_mulai, j.hari, dosen.nama_dsn FROM ((jadwal_kuliah j JOIN mata_kuliah ON j.kode_matkul = mata_kuliah.kode_matkul) JOIN dosen ON j.id_dosen = dosen.id_dosen) WHERE rombel = '".$_SESSION['rombel']."' ORDER BY hari DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIKADUN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
          <li><a class="active" href="jadwal.php">Jadwal</a></li>
          <li><a href="list-pesan-mk.php">Pemesanan MK</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="profile.php" class="get-started-btn">Profile</a>

    </div>
  </header><!-- End Header -->

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>List Mahasiswa</title>
</head>

<body style="padding-top: 5em">
  <div class="container">
    <center>
      <h2>
        Jadwal
      </h2>
    </center>
    <table class="table table-hover-dark">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Mata Kuliah</th>
          <th scope="col">Pengampu</th>
          <th scope="col">Ruangan</th>
          <th scope="col">Jam</th>
          <th scope="col">Hari</th>
          <th scope="col">SKS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($hasil)) {
        //   $datamatkul = mysqli_fetch_array($matkul);
          echo "<tr>";
          echo "<th>" . $no . "</th>";
          echo "<td>" . $data['nama_matkul'] . "</td>";
          echo "<td>" . $data['nama_dsn'] . "</td>";
          echo "<td>" . $data['ruangan'] . "</td>";
          echo "<td>" . $data['jam_mulai'] . "</td>";
          echo "<td>" . $data['hari'] . "</td>";
          echo "<td>" . $data['sks'] . "</td>";
          echo "<tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>