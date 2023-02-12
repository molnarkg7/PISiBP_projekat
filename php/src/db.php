<?php

//konfiguracija
$servername = "db";
$username = "root";
$password = "12345";
$dbname = "turisticka_agencija";

//kreiraj konekciju
$con = new mysqli($servername, $username, $password, $dbname);

//provera konekcije
if($con->connect_error) {
	die("Connection Failed: ". $con->connect_error);
}
?>