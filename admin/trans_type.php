<?php
var_dump($_POST);

if (isset ( $_POST ['dele'] ) && isset ( $_POST ['ttype_id'] )) {   //edit data
	$msg=ttype_del($conn);
}
if (isset ( $_POST ['tambah'] )) {   //tambah data
	$msg=ttype_add($conn);
}
if (isset ( $_POST ['perbaiki'] )) {   /// edit data
	$msg=ttype_edit($conn);
}

// tampilkan form jika dibutuhkan
if (isset ( $_POST ['edit'] ) && isset ( $_POST ['ttype_id'] )) {
	ttype_edit_form($conn);
} elseif (isset ( $_POST ['add'] )) {
	ttype_add_form($conn);
} else {
	echo "<form method=\"post\"><input type=\"submit\" name=\"add\" value=\"Tambah\" id=\"addbutton\" ></form>";
}



$ttypesql="select type.trans_type_id as id, type.description as type_desc,flow.flow, flow.description as flow_desc from transaction_types as type left join cashflow_types as flow on type.flow=flow.flow";
$ttypeq=$conn->query($ttypesql);
if ($ttypeq->num_rows == 0) {
	$msg = "Belum ada data!";
} else {
	?>
<table id="data">
	<thead>
		<tr class="tabheader">
			<!-- header baris pertama -->
			<th>Kode<br>transaksi</th>
			<th>Aliran</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
<?php
	$line = 0;
	while ( $ttype = $ttypeq->fetch_assoc() ) {
		$line ++;
		?>
		<tr class="<?php if($line & 1) {echo "oddline";} else{ echo"evenline";} ?>">
			<td><?php echo $ttype['id']; ?></td>
			<td><?php echo $ttype['flow']." - ".$ttype['flow_desc'];?></td>
			<td><?php echo $ttype['type_desc'];?></td>
			<td><form method="post"><input type="hidden" name="ttype_id" value="<?php echo $ttype['id'];?>"><input type="submit" name="dele" value="Hapus" id="delbutton"> <input type="submit" name="edit" value="Perbaiki" id="editbutton"></form></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
<?php 
}
?>