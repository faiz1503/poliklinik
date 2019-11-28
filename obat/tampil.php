<?php
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
include "fungsi_rupiah.php";
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
		<div style="margin-bottom: 10px;" align="right">
	<form action="" method="post">
		<input type="text" name="inputan_pencarian" style="width: 200px; padding: 5px;" />
		<input type="submit" name="cari_obat" value="Cari" placeholder="Cari Nama Obat">
	</form>
			<tr>
				<th>Nomor</th>
				<th>Nama Obat</th>
				<th>Merek</th>
				<th>Satuan</th>
				<th>Harga</th>
				<th>Opsi</th>
			</tr>
	<?php
	include 'koneksi.php';
	$no= 1;
	try {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_obat = @$_POST['cari_obat'];
			if($cari_obat){
				if($inputan_pencarian != ""){
					$tampil=$db->query("SELECT * FROM obat WHERE nama_obat like '%$inputan_pencarian%' or merk like '%$inputan_pencarian%'");
				} else {
					$tampil = $db->query("SELECT * FROM obat");
				}
				} else {
					$tampil = $db->query("SELECT * FROM obat");
				}
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
		?>
			<tr>
				<td> KO <?php echo $no++; ?> </td>
				<td> <?php echo $data['nama_obat']; ?> </td>
				<td> <?php echo $data['merk']; ?> </td>
				<td> <?php echo $data['satuan']; ?> </td>
				<td> Rp. <?php echo format_rupiah($data['harga_jual']); ?> </td>
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