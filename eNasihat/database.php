<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a182132";
$password = "littleblacklion";
$dbname = "a182132";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>