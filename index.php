<?php
include_once 'conf.php';
include_once 'base.php';
session_start ();
if (isset ( $_SESSION ['uid'] )) {
	header ( 'Location: home.php' );
} else {
	?>
<!DOCTYPE html>
<html>
<head>
<title>Sistem Informasi Akuntansi</title>
<link rel="stylesheet" href="<?php echo $template_uri?>styles.css">
<link rel="icon" type="image/png" href="<?php echo $template_uri?>images/favicon.png" />
</head>
<body>
<div align="center">
	<?php 
	if(isset($_GET['msg'])){
		echo "<div id=\"errmsg0\">".$_GET['msg']."</div>"; 
	}
	?>
<div id="login">
	<strong>Silakan masuk ke dalam aplikasi</strong>
	<form method="post" action="signin.php">
		<p></p>
		<div id="loginlabel">Pengguna</div>
		<div id="loginform">
			<img src="images/user.png" height="16px" width="16px"> <input type="text" name="username" autofocus="autofocus">
		</div>
		<p></p>
		<p></p>
		<div id="loginlabel">Katasandi</div>
		<div id="loginform">
			<img src="images/key.png" height="16px" width="16px"> <input type="password" name="password"><input type="hidden"
				name="in" value="&lt;?php echo rand(0, 1000000000); ?&gt;">
		</div>
		<p></p>
		<p></p>
		<div id="loginlabel">&nbsp;</div>
		<div id="loginbutton">
			<input type="submit" value="Masuk" id="loginsubmit"> <input type="reset" value="Batal" id="loginreset">
		</div>
	</form>
	</div>
	</div>
<?php
} ;
?>

<div id="footer"><div><strong><a href="http://udariza.wordpress.com/cfm">SIM - Small Industry Manager</a></strong>.
		&copy; 2014 <a href="mailto:muhammadriza@gmail.com">Mohammad Riza
			Nurtam</a>. Licensed under MIT License</div>
	<p>
		Disarankan menggunakan peramban dengan dukungan HTML5 seperti <a
			href="http://firefox.com"><img src="images/firefox.png"
			height="16px" width="16px"> Firefox</a>, <a
			href="http://chrome.google.com"><img src="images/chrome.png"
			height="16px" width="16px"> Chrome</a> atau <a
			href="http://opera.com"><img src="images/opera.png" height="16px"
			width="16px"> Opera</a>
	</p>
</div>
</body>
</html>