<?php
  session_start();
  require 'connection/conn.php';
  $hasil = mysqli_query($conn, "SELECT m.nama_mhs, m.nim_mhs, m.rombel, k.telp_mhs, k.almt_mhs FROM mahasiswa m JOIN kontak_mhs k ON m.nim_mhs = k.nim_mhs WHERE m.nim_mhs = '".$_SESSION['nim_mhs']."'");
  $profil = mysqli_fetch_array($hasil);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>profile</title> 
        <link rel="stylesheet" href="assets/css/profstyle.css">  
    </head>
<body>
    <div class="container" style="background-image: url('assets/img/dasas.jpg');">
        <div class="avatar">
            <a href="home.php"> <img class="prev-icon" src="assets/icon/arrow.png" style="height: 25px; widht: 25px;"></a>
            <a href="updt_prof.php"> <img src="assets/icon/setting.png" class="setting-icon"></a>
            <img src="assets/icon/profile-pic.png" class="profile-pic">
        <head>
        <style>
            div.d {
            line-height: 1.6;,
            line-width: 2.0;
            }
        </style>
        </head>
        <body>
        <div class="d"><h3><?php echo $profil['nama_mhs']?><br></h3>
        <p><?php echo $profil['nim_mhs']?><br>
            Rombel <?php echo $profil['rombel']?><br> 
            No hp : <?php echo $profil['telp_mhs']?><br>
            Alamat : <?php echo $profil['almt_mhs']?></p><br>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</body>
</html>