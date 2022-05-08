<?php
session_start();
unset($_SESSION['username']); // unset session variable
session_destroy(); // destroy session
header("location:index.php");
?>