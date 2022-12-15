<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['rombel']);
session_destroy();
header("Location:index.php");
?>