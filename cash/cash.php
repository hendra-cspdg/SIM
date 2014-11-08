<?php
if (isset ( $_POST ['dele'] ) && isset ( $_POST ['trans_id'] )) {   //edit data
	$msg=cash_del($conn);
}
if (isset ( $_POST ['tambah'] )) {   //tambah data
	$msg=cash_add($conn);
}
if (isset ( $_POST ['perbaiki'] )) {   /// edit data
	$msg=cash_edit($conn);
}


// tampilkan form jika dibutuhkan
if (isset ( $_POST ['edit'] ) && isset ( $_POST ['trans_id'] )) {
	cash_edit_form($conn);
} elseif (isset ( $_POST ['add'] )) {
	cash_add_form($conn);
} else {
	echo "<form method=\"post\"><input type=\"submit\" name=\"add\" value=\"Tambah\" id=\"addbutton\" ></form>";
}

$sql = "select * from cash_view";
$transq = $conn->query ( $sql );
if ($transq->num_rows == 0) {
	$msg = "Belum ada data!";
} else {
	?>
<table id="data">
	<thead>
		<tr class="tabheader">
			<th>No<br>Urut
			</th>
			<th>No<br>Transaksi</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Keterangan</th>
			<th>Jenis Transaksi</th>
			<th>Petugas</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
<?php
	$line = 0;
	while ( $transdata = $transq->fetch_assoc () ) {
		$line ++;
		?>
		<tr class="<?php if($line & 1) {echo "oddline";} else{ echo"evenline";} ?>">
			<td><?php echo $line;?></td>
			<td><?php echo $transdata['cash_id'];?></td>
			<td><?php echo $transdata['day'];?></td>
			<td><?php echo $transdata['amount'];?></td>
			<td><?php echo $transdata['remarks'];?></td>
			<td><?php echo $transdata['description'];?></td>
			<td><?php echo $transdata['user'];?></td>
			<td><form method="post"><input type="hidden" name="trans_id" value="<?php echo $transdata['trans_id'];?>"><input type="submit" name="dele" value="Hapus" id="delbutton"> <input type="submit" name="edit" value="Perbaiki" id="editbutton"></form></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
<?php
}
?>