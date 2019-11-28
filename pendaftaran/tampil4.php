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
				<th>Kode Pendaftaran</th>
				<th>Tanggal Pendaftaran</th>
				<th>Kode Pasien</th>
				<th>Nomor Urut</th>
				<th>Nomor Induk Pegawai/Nama Pegawai</th>
				<th>Kode Biaya</th>
				<th>Kode Jadwal Praktek</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT * FROM pendaftaran");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> P <?php echo $no++; ?> </td>
				<td> <?php echo $data['tgl_pendaftaran']; ?> </td>
				<td> <?php echo $data['kd_pasien']; ?> </td>
				<td> <?php echo $data['no_urut']; ?> </td>
				<td> <?php echo $data['nip']; ?> </td>
				<td> JB <?php echo $data['kd_jenis_biaya']; ?> </td>
				<td> Jp <?php echo $data['kd_jadwal']; ?> </td>
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