<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'connection/conn.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['pass'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data_login = mysqli_query($conn,"select * from mahasiswa where email_mhs ='$email' and pass ='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data_login);
 
if($cek > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:index.php");
}else{
	echo "salah";
}
?>