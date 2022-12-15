<?php
 
 session_start();
 include "connection/conn.php";
 if(isset($_POST['save']))
 {
    $nim_mhs=$_SESSION['nim_mhs'];
    $telp_mhs=$_POST['telp_mhs'];
    $alamat=$_POST['almt_mhs'];
    $select= "select * from mahasiswa where nim_mhs='$nim_mhs'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['nim_mhs'];
    if($res === $nim_mhs)
    {
   
       $update = "update mahasiswa join kontak_mhs on nim_mhs = '$nim_mhs' set telp_mhs='$telp_mhs',almt_mhs='$alamat' where nim_mhs='$nim_mhs'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:profile.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:updt_prof.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:updt_mhs.php');
    }
 }
?>