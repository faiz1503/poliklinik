<?php
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<style type="text/css">
table {
	border-collapse: collapse;
}
th, td {
	padding: 7px;
}
</style>
<table class="striped bordered hover responsive-table">
			<tr>
				<th>Nomor</th>
				<th>Nama Pasien</th>
				<th>Nama Dokter</th>
				<th>Nama Poli</th>
				<th>Nama Obat</th>
				<th>Tarif Biaya</th>
				<th>Harga Jual Obat</th>
			</tr>
			<?php echo ucfirst ("$_SESSION[username]"); ?>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM pendaftaran");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> KPa <?php echo $no++; ?> </td>
				<td> <?php echo $data['nama_pasien']; ?> </td>
				<td> <?php echo $data['nama_dokter']; ?> </td>
				<td> <?php echo $data['nama_poli']; ?> </td>
				<td> <?php echo $data['nama_obat']; ?> </td>
				<td> <?php echo $data['tarif']; ?> </td>
				<td> <?php echo $data['harga_jual']; ?> </td>
			</tr>
			<?php
		}
	} catch (Exception $e){
		echo $e->getMessage();
	}
	?>
</table>