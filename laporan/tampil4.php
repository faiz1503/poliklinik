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
		$tampil = $db->query("SELECT pasien.kd_pasien, pasien.nama_pasien, dokter.nama_dokter, poliklinik.nama_poli, jenis_biaya.tarif, obat.satuan, obat.harga_jual
FROM pasien, dokter, poliklinik, jenis_biaya, obat, pendaftaran, pemeriksaan, resep, jadwal_praktek
WHERE pasien.kd_pasien=pendaftaran.kd_pasien AND pendaftaran.kd_pendaftaran=pemeriksaan.kd_pendaftaran AND pemeriksaan.kd_pemeriksaan=resep.kd_pemeriksaan AND obat.kd_obat=resep.kd_obat AND jadwal_praktek.kd_jadwal=pendaftaran.kd_jadwal AND dokter.kd_dokter=jadwal_praktek.kd_dokter AND poliklinik.kd_poli=dokter.kd_Poli");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> P <?php echo $no++; ?> </td>
				<td> <?php echo $data['kd_pasien']; ?> </td>
				<td> <?php echo $data['nama_pasien']; ?> </td>
				<td> <?php echo $data['nama_dokter']; ?> </td>
				<td> <?php echo $data['nama_poli']; ?> </td>
				<td> JB <?php echo $data['tarif']; ?> </td>
				<td> Jp <?php echo $data['satuan']; ?> </td>
				<td> Jp <?php echo $data['harga_jual']; ?> </td>
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