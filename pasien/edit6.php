<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_pasien'];
	$tampilperID= $db->query("SELECT * FROM pasien WHERE kd_pasien='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_pasien" value="<?php echo $data->kd_pasien; ?>">
				<input type="text" id="nama_pasien" value="<?php echo $data->nama_pasien; ?>">
			</td>
		</tr>
		<tr>
			<td>Alamat Pasien</td>
			<td>:</td>
			<td>
				<input type="text" id="alamat_pasien" value="<?php echo $data->alamat_pasien; ?>">
			</td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td>
				<input type="text" id="telp_pasien" value="<?php echo $data->telp_pasien; ?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
				<input type="date" id="tgl_lahir" value="<?php echo $data->tgl_lahir; ?>">
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
				<input type="text" id="jenis_kelamin" value="<?php echo $data->jenis_kelamin; ?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal Registrasi</td>
			<td>:</td>
			<td>
				<input type="date" id="tgl_registrasi" value="<?php echo $data->tgl_registrasi; ?>">
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