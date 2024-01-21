<?php 
session_start();
if(isset($_SESSION['Admin_name'])){
    unset($_SESSION['Admin_name']);
}
header("location: index.php");
?>