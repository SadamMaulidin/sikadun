<?php

    $conn = mysqli_connect("localhost", "root", "", "sis_akad");

    if (!$conn) {
        echo "Koneksi Database Gagal : ".mysqli_connect_error();
    }

?>