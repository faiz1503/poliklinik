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
	padding: 10px;
}
</style>
<table class="striped bordered hover responsive-table">
			<tr>
				<th>Kode Jadwal</th>
				<th>Tanggal Praktek</th>
				<th>Jam Mulai</th>
				<th>Jam Selesai</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM jadwal_praktek");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> JP <?php echo $no++; ?> </td>
				<td> <?php echo $data['tanggal']; ?> </td>
				<td> <?php echo $data['jam_mulai']; ?> </td>
				<td> <?php echo $data['jam_selesai']; ?> </td>
				<td>
					<button class="edit" id="<?php echo $data[0] ?>">Edit</button>
					<button class="hapus" id="<?php echo $data[0] ?>">Hapus</button>
				</td>
			</tr>
			<?php
		}
	} catch (Exception $e){
		echo $e->getMessage();
	}
	?>
</table>