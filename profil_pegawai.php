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
				<th>Nomor Induk Pegawai</th>
				<th>Nama Pegawai</th>
				<th>Alamat Pegawai</th>
				<th>Nomor Telepon</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Golongan</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM pegawai");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> NIP <?php echo $no++; ?> </td>
				<td> <?php echo $data['nama_pegawai']; ?> </td>
				<td> <?php echo $data['alamat_pegawai']; ?> </td>
				<td> <?php echo $data['telp_pegawai']; ?> </td>
				<td> <?php echo $data['tgl_lahir_pegawai']; ?> </td>
				<td> <?php echo $data['jenis_kelamin']; ?> </td>
				<td> <?php echo $data['golongan']; ?> </td>
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