<?php
$homedir= "SIM";  //direktori SIM
$template="default";  //nama template
$home_uri="http://".$_SERVER["HTTP_HOST"]."/$homedir/";  //url SIM
$template_uri=$home_uri."templates/$template/";   //url template
$home=$home_uri."home.php/";  //alamat home.php, router bagi SIM dilengkapi dengan / (slash)
$dashboard=$home_uri."home.php";  //url dashboard

$servername = "localhost";  //alamat server database
$username = "sim";  //username database
$password = "sim";  //password database
$dbname="sim";  //database

$conn = new mysqli($servername, $username, $password, $dbname);   //koneksi ke database

if ($conn->connect_error) {
	die("Koneksi ke basisdata gagal: " . $conn->connect_error);   //tampilkan pesan kesalahan jika gagal koneksi ke database
}
?>
