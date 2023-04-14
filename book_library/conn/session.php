<?php
session_start();
if (!isset($_SESSION['user_data']))
    header('location:../view/user_login.view.php');
?>

