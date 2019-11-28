<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_resep'];
	$tampilperID= $db->query("SELECT * FROM resep WHERE kd_resep='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Dosis</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_resep" value="<?php echo $data->kd_resep; ?>">
				<input type="text" id="dosis" value="<?php echo $data->dosis; ?>">
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>:</td>
			<td>
				<input type="text" id="jumlah" value="<?php echo $data->jumlah; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Obat</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_obat" value="<?php echo $data->kd_obat; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Pemeriksaan</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_pemeriksaan" value="<?php echo $data->kd_pemeriksaan; ?>">
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