<?php

if (isset ( $_POST ['dele'] ) && isset ( $_POST ['flow_id'] )) {   //hapus data
	$msg=flow_del($conn);
}
if (isset ( $_POST ['tambah'] )) {   //tambah data
	$msg=flow_add($conn);
}
if (isset ( $_POST ['perbaiki'] )) {   /// edit data
	$msg=flow_edit($conn);
}

if (isset ( $_POST ['edit'] ) && isset ( $_POST ['flow_id'] )) {
	flow_edit_form($conn);
} elseif (isset ( $_POST ['add'] )) {
	flow_add_form($conn);
} else {
	echo "<form method=\"post\"><input type=\"submit\" name=\"add\" value=\"Tambah\" id=\"addbutton\" ></form>";
}

$flowsql="select * from cashflow_types";
$flowq=$conn->query($flowsql);
if ($flowq->num_rows == 0) {
	$msg = "Belum ada data!";
} else {
?>
<table id="data">
	<thead>
		<tr class="tabheader">
			<!-- header baris pertama -->
			<th>No</th>
			<th>Aliran</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
<?php
	$line = 0;
	while ( $flow = $flowq->fetch_assoc() ) {
		$line ++;
		?>
		<tr class="<?php if($line & 1) {echo "oddline";} else{ echo"evenline";} ?>">
			<td><?php echo $line;?></td>
			<td><?php echo $flow['flow'];?></td>
			<td><?php echo $flow['description'];?></td>
			<td><form method="post"><input type="hidden" name="flow_id" value="<?php echo $flow['flow'];?>"><input type="submit" name="dele" value="Hapus" id="delbutton"> <input type="submit" name="edit" value="Perbaiki" id="editbutton"></form></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
<?php 
}
?>