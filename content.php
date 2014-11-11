<?php
$patharray=explode("/",$_SERVER['REQUEST_URI']);
if(count($patharray)>3){
	$realpatharray=array_slice($patharray, 3);
	$path=implode("/",$realpatharray);
	include $path.".php";
}
else
{
?><div id="dataform">
<h4>Selamat datang di SIM</h4>
<p>Silakan pilih menu untuk memulai</p>
<ul>
	<li>Transaksi: Pengolahan aliran kas</li>
	<li>Inventory: Pengolahan persediaan bahan baku dan produk jadi</li>
	<li>Laporan: Pelaporan keuangan dan persediaan</li>
	<li>Data Master: Pengolahan data master seperti jenis aliran kas dan jenis transaksi</li>
	<li>Menu pengguna: Mengubah katasandi dan keluar dari aplikasi</li>
	<li>Info: Berbagai informasi seperti panduan penggunaan, versi, lisensi, dsb.</li>
</ul>
</div>
<?php 
}
?>