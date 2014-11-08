<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo $template_uri; ?>styles.css">
<link rel="icon" type="image/png" href="<?php echo $template_uri?>images/favicon.png" />
<script type="text/javascript">
function batal(){
	window.location.assign("<?php echo $_SERVER['HTTP_REFERER'] ?>")
}
function toDashboard(){
	window.location.assign("<?php echo $dashboard; ?>")
}
</script>
<title>Sistem Informasi Manajemen Industri Kecil</title>
</head>
<body>
	<div id="menu">
		<ul id="level1">
			<li><a href="<?php echo $home_uri; ?>home.php"><img src="<?php echo $home_uri; ?>images/house.png" height="16px" width="16px"> Beranda</a></li>
			<li><a href="<?php echo $home; ?>cash/cash"><img src="<?php echo $home_uri; ?>images/money.png" height="16px" width="16px"> Kas</a></li>
			<li><a href="#"><img src="<?php echo $home_uri; ?>images/package.png" height="16px" width="16px"> Inventory</a>
				<ul id="level2">
					<li><a href="<?php echo $home; ?>inventory/"><img src="<?php echo $home_uri; ?>images/bricks.png" height="16px" width="16px"> Bahan Baku</a></li>
					<li><a href="<?php echo $home; ?>inventory/"><img src="<?php echo $home_uri; ?>images/package.png" height="16px" width="16px"> Produk</a></li>
				</ul>
			</li>
			<li><a href="<?php echo $home; ?>report/"><img src="<?php echo $home_uri; ?>images/report.png" height="16px" width="16px"> Laporan</a></li>
			<li><a href="#"><img src="<?php echo $home_uri; ?>images/table_multiple.png" height="16px" width="16px"> Data Master</a>
				<ul id="level2">
					<li><a href="<?php echo $home; ?>admin/cashflow"><img src="<?php echo $home_uri; ?>images/table_multiple.png" height="16px" width="16px"> Aliran Kas</a></li>
					<li><a href="<?php echo $home; ?>admin/trans_type"><img src="<?php echo $home_uri; ?>images/table_multiple.png" height="16px" width="16px"> Jenis Transaksi</a></li><?php 
					if ($_SESSION['user_id']=='1'){
						?>
					<li><a href="<?php echo $home; ?>master/"><img src="<?php echo $home_uri; ?>images/user_gray.png" height="16px" width="16px"> Pengguna</a></li>
						<?php 
					}
					?></ul>
			</li>
			<li><a href="#"><img src="<?php echo $home_uri; ?>images/user.png" height="16px" width="16px"> <?php echo $_SESSION['name'];?></a>
				<ul id="level2">
					<li><a href="<?php echo $home; ?>admin/chpass"><img src="<?php echo $home_uri; ?>images/user.png" height="16px" width="16px"> Ubah Katasandi</a></li>
					<li><form action="<?php echo $home_uri?>signin.php" method="post" id="inlineform"><input type="submit" value="Keluar" name="out" id="logoutbutton"></form></li>
				</ul>
			</li>
			<li><a href="#"><img src="<?php echo $home_uri; ?>images/information.png" height="16px" width="16px"> Info</a>
				<ul id="level2">
					<li><a href="<?php echo $home; ?>help/help"><img src="<?php echo $home_uri; ?>images/help.png" height="16px" width="16px"> Bantuan</a></li>
					<li><a href="<?php echo $home; ?>help/about"><img src="<?php echo $home_uri; ?>images/application.png" height="16px" width="16px"> Tentang</a></li>
					<li><a href="<?php echo $home; ?>help/license"><img src="<?php echo $home_uri; ?>images/application.png" height="16px" width="16px"> Lisensi</a></li>
				</ul>
			</li>
		</ul>
	</div>
	
	<div id="content"><?php 
	include "content.php";?>
	</div>
	<?php 
//tampilkan pesan kesalahan jika ada.
if (isset($msg)){
	echo "<div id=\"errmsg\">$msg</div>";
}
?>
	<div id="footer"><div><strong><a href="http://udariza.wordpress.com/cfm">SIM - Small Industry Manager</a></strong>.
		&copy; 2014 <a href="mailto:muhammadriza@gmail.com">Mohammad Riza
			Nurtam</a>. Licensed under MIT License</div></div>
</body>
</html>