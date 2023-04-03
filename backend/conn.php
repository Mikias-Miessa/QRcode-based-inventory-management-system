<?php
$Hostname = "localhost";
$Hostuser = "root";
$Password = "";
$Database_name = "Inventory_db";

$con = mysqli_connect($Hostname, $Hostuser, $Password, $Database_name);

if ($con->connect_error) {
   die("Connectioin failed: " . $con->connect_error);
}
