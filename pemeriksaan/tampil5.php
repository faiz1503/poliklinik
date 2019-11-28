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
				<th>Kode Pemeriksaan</th>
				<th>Keluhan</th>
				<th>Diagnosa</th>
				<th>Perawatan</th>
				<th>Tindakan</th>
				<th>Berat Badan</th>
				<th>Tensi Diastolik</th>
				<th>Tensi Sistolik</th>
				<th>Nomor Pendaftaran</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM pemeriksaan");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> KP <?php echo $no++; ?> </td>
				<td> <?php echo $data['keluhan']; ?> </td>
				<td> <?php echo $data['diagnosa']; ?> </td>
				<td> <?php echo $data['perawatan']; ?> </td>
				<td> <?php echo $data['tindakan']; ?> </td>
				<td> <?php echo $data['berat_badan']; ?> </td>
				<td> <?php echo $data['tensi_diastolik']; ?> </td>
				<td> <?php echo $data['tensi_sistolik']; ?> </td>
				<td> P <?php echo $data['no_pendaftaran']; ?> </td>
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