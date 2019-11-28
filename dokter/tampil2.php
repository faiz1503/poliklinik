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
				<th>Kode Dokter</th>
				<th>Nama Dokter</th>
				<th>Alamat Dokter</th>
				<th>Nomor telepon</th>
				<th>Kode Poli</th>
				<th>Gambar</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM dokter");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> D <?php echo $no++; ?> </td>
				<td> <?php echo $data['nama_dokter']; ?> </td>
				<td> <?php echo $data['alamat_dokter']; ?> </td>
				<td> <?php echo $data['telp_dokter']; ?> </td>
				<td> <?php echo $data['kd_poli']; ?> </td>
				<td> <?php echo $data['gambar']; ?> </td>
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