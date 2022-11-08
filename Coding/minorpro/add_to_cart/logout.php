<?php
include('object.php');
session_start();
    // print_r($_SESSION);
    // echo "<br>";
    session_destroy();
    // print_r($_SESSION);echo "<br>";

    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    // print_r($_SESSION)
    header('location:iindex.php');
?>