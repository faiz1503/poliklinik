<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_pendaftaran'];
	$tampilperID= $db->query("SELECT * FROM pendaftaran WHERE kd_pendaftaran='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Tanggal Pendaftaran</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_pendaftaran" value="<?php echo $data->kd_pendaftaran; ?>">
				<input type="date" id="tgl_pendaftaran" value="<?php echo $data->tgl_pendaftaran; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Pasien</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_pasien" value="<?php echo $data->kd_pasien; ?>">
			</td>
		</tr>
		<tr>
			<td>Nomor Urut</td>
			<td>:</td>
			<td>
				<input type="text" id="no_urut" value="<?php echo $data->no_urut; ?>">
			</td>
		</tr>
		<tr>
			<td>Nomor Induk Pegawai/Nama Pegawai</td>
			<td>:</td>
			<td>
				<input type="text" id="nip" value="<?php echo $data->nip; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Biaya</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_jenis_biaya" value="<?php echo $data->kd_jenis_biaya; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Jadwal Praktek</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_jadwal" value="<?php echo $data->kd_jadwal; ?>">
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