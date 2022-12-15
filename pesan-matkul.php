<?php
session_start();
require 'connection/conn.php';
include_once("connection/conn.php");

// $kode_matkul = $_GET['kode_matkul'];

if (isset($_POST['pesan'])) {
    // $nim_mhs = $_POST['nim_mhs'];
    $kode_matkul = $_POST['kode_matkul'];
    
    //insert data
    $insert = mysqli_query($conn, "INSERT INTO pemesanan_mk(id_pmk, nim_mhs, kode_matkul, stat) VALUES('','".$_SESSION['nim_mhs']."', '$kode_matkul','Belum Disetujui')");
}

$hasil = mysqli_query($conn, "SELECT * FROM mata_kuliah WHERE smt='".$_SESSION['smt_now']."' + 1 AND kode_matkul NOT IN (SELECT kode_matkul FROM pemesanan_mk)");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Praktikum Antar Muka</title>
</head>

<body>
  <div class="container" style="margin-top: 50px">
    <center>
      <h2>
        Ajukan Pemesanan Mata Kuliah
      </h2>
    </center>
    <a href="list-pesan-mk.php" class="btn btn-success" tabindex="-1" role="button" style="margin-bottom: 25px" aria-disabled="true">Kembali</a>
    <form action="pesan-matkul.php" method="post" name="form1">
    <table class="table table-hover-dark">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Kode Matkul</th>
          <th scope="col">Semester</th>
          <th scope="col">Nama Mata Kuliah</th>
          <th scope="col">SKS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($hasil)) {
          echo "<tr>";
          echo "<th>" . $no . "</th>";        
          echo "<td>" . $data['kode_matkul'] . "</td>";
          echo "<td>" . $data['smt'] . "</td>";
          echo "<td>" . $data['nama_matkul'] . "</td>";
          echo "<td>" . $data['sks'] . "</td>";          
          echo "</tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
    <center>
    <table width="50%" border="0">
          <tr>
            <td>Kode Mata Kuliah</td>
            <td><input type="text" name="kode_matkul"></td>
          </tr>
          <td></td>
          <td><input class="btn btn-success" type="submit" name="pesan" value="Pesan Mata Kuliah" style="margin-top: 25px"></td>
          </tr>
    </table>
    </center>
    </form>
  </div>

</body>

</html>