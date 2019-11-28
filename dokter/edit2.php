<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_dokter'];
	$tampilperID= $db->query("SELECT * FROM dokter WHERE kd_dokter='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Nama Dokter</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_dokter" value="<?php echo $data->kd_dokter; ?>">
				<input type="text" id="nama_dokter" value="<?php echo $data->nama_dokter; ?>">
			</td>
		</tr>
		<tr>
			<td>Alamat Dokter</td>
			<td>:</td>
			<td>
				<input type="text" id="alamat_dokter" value="<?php echo $data->alamat_dokter; ?>">
			</td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td>
				<input type="text" id="telp_dokter" value="<?php echo $data->telp_dokter; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Poli</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_poli" value="<?php echo $data->kd_poli; ?>">
			</td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td>
				<input type="text" id="gambar" value="<?php echo $data->gambar; ?>">
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button id="simpanedit">Simpan Data</button>
			</td>
		</tr>
	</table>
	
</fieldset>