<?php 
// include database connection file
session_start();
require 'connection/conn.php'; 
include_once("connection/conn.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
  $telp = $_POST['telp_mhs'];
  $alamat = $_POST['almt_mhs'];

  // update user data
  $result = mysqli_query($conn, "UPDATE kontak_mhs SET telp_mhs='$telp',almt_mhs='$alamat' WHERE nim_mhs='".$_SESSION['nim_mhs']."'");

  // Redirect to homepage to display updated user in list
  header("Location: profile.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
// $NIS = $_GET['NIS'];
// echo $id_barang;
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT m.nama_mhs, m.nim_mhs, m.rombel, k.telp_mhs, k.almt_mhs FROM mahasiswa m JOIN kontak_mhs k ON m.nim_mhs = k.nim_mhs WHERE m.nim_mhs = '".$_SESSION['nim_mhs']."'");

while ($data = mysqli_fetch_array($result)) {
    $nim_mhs = $data['nim_mhs'];
    $nama_mhs = $data['nama_mhs'];
    $rombel = $data['rombel'];
    $nama_mhs = $data['nama_mhs'];
    $telp_mhs = $data['telp_mhs'];
    $almt_mhs = $data['almt_mhs'];
}
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
            <a href="profile.php"> <img class="prev-icon" src="assets/icon/arrow.png" style="height: 25px; widht: 25px;"></a>
        <head>
        <style>
            div.d {
            line-height: 1.6;,
            line-width: 2.0;
            }
        </style>
        </head>
        <body>
        <center>
        <form action="updt_prof.php" method="post" name="form1" class="d">
        <table width="50%" border="0">
        <h3><?php echo $nama_mhs?><br></h3>
        <p><?php echo $nim_mhs?><br>
        <p>Rombel <?php echo $rombel?><br> 
          <tr>
            <td>No Telp</td>
            <td><input type="text" name="telp_mhs" value=<?php echo $telp_mhs; ?>></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><input type="text" name="almt_mhs" value=<?php echo $almt_mhs; ?>></td>
          </tr>
          <td></td>
          <td><input class="logout-btn" type="submit" name="update" value="Update Data"></td>
          </tr>
        </table>
      </form>
        </center>
    </div>
</body>
</html>