<?php
$homedir= "sim";
$template="default";
$home_uri="http://".$_SERVER["HTTP_HOST"]."/$homedir/";
$template_uri=$home_uri."templates/$template/";
$home=$home_uri."home.php/";
$dashboard=$home_uri."home.php";

$servername = "localhost";
$username = "sim";
$password = "sim";
$dbname="sim";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Koneksi ke basisdata gagal: " . $conn->connect_error);
}
?>