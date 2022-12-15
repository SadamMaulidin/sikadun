<?php
// include database connection file
include_once("connection/conn.php");

// Get id from URL to delete that user
$id_pmk = $_GET['id_pmk'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM pemesanan_mk WHERE id_pmk='$id_pmk'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:list-pesan-mk.php");
