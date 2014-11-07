<?php
include_once 'conf.php';
if(isset($_POST['in'])){
	$uname=$_POST['username'];
	$passwd=md5($_POST['password']);
	$sql="select * from users where username='$uname' and password='$passwd'";
	$res=$conn->query($sql);
	if($res->num_rows){
		$user = $res->fetch_assoc();
		session_start();
		$_SESSION['uid'] = $user['UID'];
		$_SESSION['name']=$user['realname'];
		$_SESSION['user'] = $user['username'];
				
		header('Location: home.php');
		
		}
	else{
		header('Location: index.php?msg=Maaf!+Kombinasi+pengguna+dan+katasandi+salah');
	} 
}
elseif(isset($_POST['out'])){
	session_start();
	session_destroy();
	header('Location: index.php?msg=Anda+telah+keluar+dari+aplikasi');
}
else{
	echo "Maaf! berkas yang anda cari tidak ditemukan";
}
	?>