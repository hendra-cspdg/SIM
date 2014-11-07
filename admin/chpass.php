<?php
// var_dump($_SESSION);
// echo "<br>";
// var_dump($_POST);
// echo "<br>";
// var_dump($_GET);
// echo "<br>";

if (isset($_POST['change'])){
	$currq="select * from users where UID='".$_SESSION['uid']."' limit 1";
	$currres=$conn->query($currq);
	$currdata=$currres->fetch_assoc();
	if(md5($_POST['existingpass']) != $currdata['password']){
		$msg="Katasandi salah!";
	}
	elseif($_POST['newpass']==$_POST['passconfirm'] && md5($_POST['existingpass']) == $currdata['password'] ){
		$updateq="update users set password='".md5($_POST['newpass'])."' where uid='".$_SESSION['uid']."' and password='".$currdata['password']."'";
		if($conn->query($updateq)){
			$msg="Password berhasil diperbaharui";	
		}
	}
	else
		$msg="Konfirmasi password tidak cocok";
}
else
{
?>
<div id="dataform">
<form method="post">
<div id="inputlabel">Password saat ini</div><div id="inputform"><input type="password" name="existingpass"></div>
<div id="inputlabel">Password baru</div><div id="inputform"><input type="password" name="newpass"></div>
<div id="inputlabel">Konfirmasi password</div><div id="inputform"><input type="password" name="passconfirm"></div>
<div id="inputlabel">&nbsp;</div><div id="inputform"><input type="submit" name="change" value="Ubah" id="savebutton"> <input type="button" onclick="toDashboard()" value="Batal" id="cancelbutton"></div>
</form>
</div>
<?php 
}
?>