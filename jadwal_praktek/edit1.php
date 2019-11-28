<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_jadwal'];
	$tampilperID= $db->query("SELECT * FROM jadwal_praktek WHERE kd_jadwal='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Tanggal Praktek</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_jadwal" value="<?php echo $data->kd_jadwal; ?>">
				<input type="date" id="tanggal" value="<?php echo $data->tanggal; ?>">
			</td>
		</tr>
		<tr>
			<td>Jam Mulai</td>
			<td>:</td>
			<td>
				<input type="time" id="jam_mulai" value="<?php echo $data->jam_mulai; ?>">
			</td>
		</tr>
		<tr>
			<td>Jam Selesai</td>
			<td>:</td>
			<td>
				<input type="time" id="jam_selesai" value="<?php echo $data->jam_selesai; ?>">
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