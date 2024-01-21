<?php
$con= new mysqli('localhost','root','','mithaqwatan') or 
die ("connection erorr".mysqli_error($con));
$con->query('SET NAMES UTF8');
$con->query('SET CHARACTER SET UTF8');
?>