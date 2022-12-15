<?php 
 
include 'connection/conn.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['logged'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM mahasiswa WHERE email_mhs='$email' AND pass='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged'] = true;
        $_SESSION['nim_mhs'] = $row['nim_mhs'];
        $_SESSION['nama_mhs'] = $row['nama_mhs'];
        $_SESSION['tgl_lahir'] = $row['tgl_lahir'];
        $_SESSION['email_mhs'] = $row['email_mhs'];
        $_SESSION['rombel'] = $row['rombel'];
        $_SESSION['smt_now'] = $row['smt_now'];
        $_SESSION['id_dosen'] = $row['id_dosen'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/loginstyle.css">

    <title>Login</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('assets/img/gb.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>SIKADUN</strong></h3>
            
            <form action="#" method="post">
              <div class="form-group first">
                <label for="email_mhs">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan logged" id="emai_mhs">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password"class="form-control" placeholder="Masukkan Password" id="pass">
              </div>

              <div class="input-group">
                <button name="submit" class="btn btn-block btn-primary">Login</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>