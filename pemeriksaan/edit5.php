<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>

	<?php 
	include "koneksi.php";
	$id= $_POST['kd_pemeriksaan'];
	$tampilperID= $db->query("SELECT * FROM pemeriksaan WHERE kd_pemeriksaan='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	
	<table>
		<tr>
			<td>Keluhan</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_pemeriksaan" value="<?php echo $data->kd_pemeriksaan; ?>">
				<input type="text" id="keluhan" value="<?php echo $data->keluhan; ?>">
			</td>
		</tr>
		<tr>
			<td>Diagnosa</td>
			<td>:</td>
			<td>
				<input type="text" id="diagnosa" value="<?php echo $data->diagnosa; ?>">
			</td>
		</tr>
		<tr>
			<td>Perawatan</td>
			<td>:</td>
			<td>
				<input type="text" id="perawatan" value="<?php echo $data->perawatan; ?>">
			</td>
		</tr>
		<tr>
			<td>Tindakan</td>
			<td>:</td>
			<td>
				<input type="text" id="tindakan" value="<?php echo $data->tindakan; ?>">
			</td>
		</tr>
		<tr>
			<td>Berat Badan</td>
			<td>:</td>
			<td>
				<input type="text" id="berat_badan" value="<?php echo $data->berat_badan; ?>">
			</td>
		</tr>
		<tr>
			<td>Tensi Diastolik</td>
			<td>:</td>
			<td>
				<input type="text" id="tensi_diastolik" value="<?php echo $data->tensi_diastolik; ?>">
			</td>
		</tr>
		<<tr>
			<td>Tensi Sistolik</td>
			<td>:</td>
			<td>
				<input type="text" id="tensi_sistolik" value="<?php echo $data->tensi_sistolik; ?>">
			</td>
		</tr>
		<tr>
			<td>Nomor Pendaftaran</td>
			<td>:</td>
			<td>
				<input type="text" id="no_pendaftaran" value="<?php echo $data->no_pendaftaran; ?>">
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