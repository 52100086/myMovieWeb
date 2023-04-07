<?php
session_start();
include "db_conn.php";
$name= $_GET['username'];
$pass= $_GET['password'];
$_SESSION["username"]= $name;
$_SESSION["password"]=$pass;
check($name,$pass);
?>