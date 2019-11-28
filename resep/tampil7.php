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
				<th>Kode Resep</th>
				<th>Dosis</th>
				<th>Jumlah</th>
				<th>Kode Obat</th>
				<th>Kode Pemeriksaan</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM resep");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> KR <?php echo $no++; ?> </td>
				<td> <?php echo $data['dosis']; ?> </td>
				<td> <?php echo $data['jumlah']; ?> </td>
				<td> <?php echo $data['kd_obat']; ?> </td>
				<td> <?php echo $data['kd_pemeriksaan']; ?> </td>
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