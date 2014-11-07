<?php

// function form tambah data BEGIN
function trans_add_form($conn) {
	?>
<div id="dataform">
	<form method="post">
		<div id="inputlabel">Tanggal</div>
		<div id="inputform">
			<select name="tanggal"><?php
	for($tgl = 1; $tgl <= 31; $tgl ++) {
		echo "<option value=\"$tgl\" ";
		if ($tgl == date ( "j" )) {
			echo "selected=\"selected\"";
		}
		echo ">$tgl</option>";
	}
	?></select> <select name="bulan"><?php
	$bulan [1] = "Januari";
	$bulan [2] = "Februari";
	$bulan [3] = "Maret";
	$bulan [4] = "April";
	$bulan [5] = "Mei";
	$bulan [6] = "Juni";
	$bulan [7] = "Juli";
	$bulan [8] = "Agustus";
	$bulan [9] = "September";
	$bulan [10] = "Oktober";
	$bulan [11] = "November";
	$bulan [12] = "Desember";
	for($bln = 1; $bln <= 12; $bln ++) {
		echo "<option value=\"$bln\" ";
		if ($bln == date ( "n" )) {
			echo "selected=\"selected\"";
		}
		echo ">$bulan[$bln]</option>";
	}
	?></select> <input type="number" value="<?php echo date("Y"); ?>"
				name="tahun" id="year">
		</div>
		<div id="inputlabel">Jumlah</div>
		<div id="inputform">
			<input type="number" name="jumlah" id="amount" min=0
				max=9999999999999>
		</div>
		<div id="inputlabel">Keterangan</div>
		<div id="inputform">
			<input type="text" name="keterangan" id="remark">
		</div>
		<div id="inputlabel">Jenis transaksi</div>
		<div id="inputform">
			<select name="jenis"><?php
	$transtypesql = "select * from transaction_types";
	$transtyperes = $conn->query ( $transtypesql );
	while ( $transtype = $transtyperes->fetch_assoc () ) {
		echo "<option value=\"" . $transtype ['trans_type_id'] . "\">" . $transtype ['trans_type_id'] . " - " . $transtype ['description'] . "</option>";
	}
	?></select>
		</div>
		<div id="inputlabel">Petugas</div>
		<div id="inputform"><?php echo $_SESSION['user']?><input type="hidden"
				name="petugas" value="<?php echo $_SESSION['uid']; ?>">
		</div>
		<div id="inputlabel">&nbsp;</div>
		<div id="inputform">
			<input type="submit" value="Simpan" name="tambah" id="savebutton"> <input type="button" onclick="batal()" value="Batal" id="cancelbutton">
		</div>
	</form>
</div>
<?php
}
// function form tambah data END

// function form edit data BEGIN
function trans_edit_form($conn) {
	$editsql = "select * from transactions where trans_id='" . $_POST ['trans_id'] . "' limit 1";
	$editres = $conn->query ( $editsql );
	$data = $editres->fetch_assoc ();
	$date = new DateTime ( $data ['day'] );
	$day = $date->format ( 'j' );
	$month = $date->format ( 'n' );
	$year = $date->format ( 'Y' );
	?>
<div id="dataform">
	<form method="post">
		<div id="inputlabel">Tanggal</div>
		<div id="inputform">
			<select name="tanggal"><?php
	for($tgl = 1; $tgl <= 31; $tgl ++) {
		echo "<option value=\"$tgl\" ";
		if ($tgl == $day) {
			echo "selected=\"selected\"";
		}
		echo ">$tgl</option>";
	}
	?></select> <select name="bulan"><?php
	$bulan [1] = "Januari";
	$bulan [2] = "Februari";
	$bulan [3] = "Maret";
	$bulan [4] = "April";
	$bulan [5] = "Mei";
	$bulan [6] = "Juni";
	$bulan [7] = "Juli";
	$bulan [8] = "Agustus";
	$bulan [9] = "September";
	$bulan [10] = "Oktober";
	$bulan [11] = "November";
	$bulan [12] = "Desember";
	for($bln = 1; $bln <= 12; $bln ++) {
		echo "<option value=\"$bln\" ";
		if ($bln == $month) {
			echo "selected=\"selected\"";
		}
		echo ">$bulan[$bln]</option>";
	}
	?></select> <input type="number" value="<?php echo $year; ?>"
				name="tahun" id="year">
		</div>
		<div id="inputlabel">Jumlah</div>
		<div id="inputform">
			<input type="number" name="jumlah" id="amount" min=0
				max=9999999999999 value="<?php echo $data['amount']; ?>">
		</div>
		<div id="inputlabel">Keterangan</div>
		<div id="inputform">
			<input type="text" name="keterangan" id="remark"
				value="<?php echo $data['remarks']; ?>">
		</div>
		<div id="inputlabel">Jenis transaksi</div>
		<div id="inputform">
			<select name="jenis"><?php
	$transtypesql = "select * from transaction_types";
	$transtyperes = $conn->query ( $transtypesql );
	while ( $transtype = $transtyperes->fetch_assoc () ) {
		echo "<option value=\"" . $transtype ['trans_type_id'] . "\"";
		if ($transtype ['trans_type_id'] == $data ['trans_type']) {
			echo "selected=\"selected\"";
		}
		echo ">" . $transtype ['trans_type_id'] . " - " . $transtype ['description'] . "</option>";
	}
	?></select>
		</div>
		<div id="inputlabel">Petugas</div>
		<div id="inputform"><?php echo $_SESSION['user']?><input type="hidden"
				name="petugas" value="<?php echo $_SESSION['uid']; ?>">
		</div>
		<div id="inputlabel">&nbsp;</div>
		<div id="inputform">
			<input type="hidden" name="trans_id"
				value="<?php echo $data['trans_id']; ?>"><input type="submit"
				value="Simpan" name="perbaiki" id="savebutton"> <input type="button" onclick="batal()" value="Batal" id="cancelbutton">
		</div>
	</form>
</div>
<?php
}
// function form edit data END

// function hapus data BEGIN
function trans_del($conn){
	$trans_id = $_POST ['trans_id'];
	$sql = "delete from transactions where trans_id='$trans_id'";
	if ($conn->query ( $sql )) {
		$msg = "Data dengan nomor transaksi " . $trans_id . " telah dihapus dari basisdata";
	} else {
		$msg = "Proses menghapus data gagal" . $conn->error;
	}
	return $msg;
}
	
// function hapus data END

// Tambah data BEGIN
function trans_add($conn){
	$day = $_POST ['tahun'] . "-" . $_POST ['bulan'] . "-" . $_POST ['tanggal'];

	$sql = "insert into transactions (day,amount,remarks,trans_type,user) values('$day','" . $_POST ['jumlah'] . "','" . $_POST ['keterangan'] . "','" . $_POST ['jenis'] . "','" . $_POST ['petugas'] . "')";

	if ($conn->query ( $sql )) {
		$msg = "Penambahan data berhasil!";
	} else
		$msg = "Proses penyimpanan ke basisdata gagal. Pesan kegagalan:" . $conn->error;
	
	return $msg;
}
// Tambah Data END

// Edit data BEGIN
function trans_edit($conn){
	$day = $_POST ['tahun'] . "-" . $_POST ['bulan'] . "-" . $_POST ['tanggal'];

	$sql = "update transactions set day='$day',amount='" . $_POST ['jumlah'] . "',remarks='" . $_POST ['keterangan'] . "',trans_type='" . $_POST ['jenis'] . "',user='" . $_POST ['petugas'] . "' where trans_id='" . $_POST ['trans_id'] . "'";
	if ($conn->query ( $sql )) {
		$msg = "Pemutakhiran data berhasil!";
	} else
		$msg = "Proses penyimpanan ke basisdata gagal. Pesan kegagalan:" . $conn->error;
	
	return $msg;
}
// Edit Data END



// function form edit data flow BEGIN
function  flow_edit_form($conn) {
	$editsql = "select * from cashflow_types where flow='" . $_POST ['flow_id'] . "' limit 1";
	$editres = $conn->query ( $editsql );
	$data = $editres->fetch_assoc ();
	?>
<div id="dataform">
	<form method="post">
		<div id="inputlabel">Aliran</div>
		<div id="inputform"><input type="text" name="flow" value="<?php echo $data['flow']; ?>"></div>
		<div id="inputlabel">Keterangan</div>
		<div id="inputform"><input type="text" name="desc" value="<?php echo $data['description']; ?>"></div>
		<div id="inputlabel">&nbsp;</div>
		<div id="inputform"><input type="hidden" name="flow_id" value="<?php echo $_POST['flow_id']; ?>"><input type="submit" value="Simpan" name="perbaiki" id="savebutton"> <input type="button" onclick="batal()" value="Batal" id="cancelbutton">
		</div>
	</form>
</div>
<?php
}
// function form edit data flow END

// function form add data flow BEGIN
function  flow_add_form($conn) {

	?>
<div id="dataform">
	<form method="post">
		<div id="inputlabel">Aliran</div>
		<div id="inputform"><input type="text" name="flow"></div>
		<div id="inputlabel">Keterangan</div>
		<div id="inputform"><input type="text" name="desc"></div>
		<div id="inputlabel">&nbsp;</div>
		<div id="inputform"><input type="submit" value="Simpan" name="tambah" id="savebutton"> <input type="button" onclick="batal()" value="Batal" id="cancelbutton">
		</div>
	</form>
</div>
<?php
}
// function form add data flow END

// function hapus data flow BEGIN
function flow_del($conn){
	$sql = "delete from cashflow_types where flow='".$_POST['flow_id']."'";
	if ($conn->query ( $sql )) {
		$msg = "Data dengan jenis aliran " . $_POST['flow_id'] . " telah dihapus dari basisdata";
	} else {
		$msg = "Proses menghapus data gagal! Pesan kegagalan: " . $conn->error;
	}
	return $msg;
}

// function hapus data flow END


// Tambah data flow BEGIN
function flow_add($conn){
	$sql = "insert into cashflow_types(flow,description) values('".$_POST['flow']."','".$_POST['desc']."')";
	if ($conn->query ( $sql )) {
		$msg = "Penambahan data berhasil!";
	} else
		$msg = "Proses penyimpanan ke basisdata gagal. Pesan kegagalan: " . $conn->error;

	return $msg;
}
// Tambah Data flow END

// Edit data flow BEGIN
function flow_edit($conn){
	$sql = "update cashflow_types set flow='".$_POST['flow']."',description='".$_POST['desc']."' where flow='" . $_POST ['flow_id'] . "'";
	if ($conn->query ( $sql )) {
		$msg = "Pemutakhiran data berhasil!";
	} else
		$msg = "Proses penyimpanan ke basisdata gagal. Pesan kegagalan:" . $conn->error;

	return $msg;
}
// Edit Data flow END

// function form add data trans type BEGIN
function  ttype_add_form($conn) {
	$flowsql="select * from cashflow_types";
	$flowres=$conn->query($flowsql);
	
	?>
<div id="dataform">
	<form method="post">
		<div id="inputlabel">Aliran</div>
		<div id="inputform">
		<select name="flow">
		<?php 
		while($flow=$flowres->fetch_assoc()){
			echo "<option value=\"".$flow['flow']."\">".$flow['flow']." - ".$flow['description']."</option>";
		}
		?>
		</select>
		</div>
		<div id="inputlabel">Keterangan</div>
		<div id="inputform"><input type="text" name="desc"></div>
		<div id="inputlabel">&nbsp;</div>
		<div id="inputform"><input type="submit" value="Simpan" name="tambah" id="savebutton"> <input type="button" onclick="batal()" value="Batal" id="cancelbutton">
		</div>
	</form>
</div>
<?php
}
// function form add data trans type END


// Tambah data flow BEGIN
function ttype_add($conn){
	$sql = "insert into transaction_types(flow,description) values('".$_POST['flow']."','".$_POST['desc']."')";
	if ($conn->query ( $sql )) {
		$msg = "Penambahan data berhasil!";
	} else
		$msg = "Proses penyimpanan ke basisdata gagal. Pesan kegagalan: " . $conn->error;

	return $msg;
}
// Tambah Data flow END

// function form edit data trans type BEGIN
function  ttype_edit_form($conn) {
	$ttypesql="select * from transaction_types where trans_type_id='".$_POST['ttype_id']."' limit 1";
	$ttyperes=$conn->query($ttypesql);
	$ttype=$ttyperes->fetch_assoc();
	?>
<div id="dataform">
	<form method="post">
		<div id="inputlabel">Aliran</div>
		<div id="inputform">
		<select name="flow">
		<?php 
		$flowsql="select * from cashflow_types";
		$flowres=$conn->query($flowsql);
		while($flow=$flowres->fetch_assoc()){
			echo "<option value=\"".$flow['flow']."\" ";
			if($flow['flow']==$ttype['flow']){
				echo "selected=\"selected\"";
			}
			echo ">".$flow['flow']." - ".$flow['description']."</option>";
		}
		?>
		</select>
		</div>
		<div id="inputlabel">Keterangan</div>
		<div id="inputform"><input type="text" name="desc" value="<?php echo $ttype['description'] ?>"></div>
		<div id="inputlabel">&nbsp;</div>
		<div id="inputform"><input type="hidden" name="trans_type" value="<?php echo $ttype['trans_type_id'] ?>"><input type="submit" value="Simpan" name="perbaiki" id="savebutton"> <input type="button" onclick="batal()" value="Batal" id="cancelbutton">
		</div>
	</form>
</div>
<?php
}
// function form edit data trans type END

// Edit transaction type BEGIN
function ttype_edit($conn){
	$sql = "update transaction_types set flow='".$_POST['flow']."' where trans_type_id='" . $_POST ['trans_type'] . "'";
	if ($conn->query ( $sql )) {
		$msg = "Pemutakhiran data berhasil!";
	} else
		$msg = "Proses penyimpanan ke basisdata gagal. Pesan kegagalan:" . $conn->error;

	return $msg;
}
// Edit transaction type END

?>



