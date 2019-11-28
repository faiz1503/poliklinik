<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_jenis_biaya'];
	$tampilperID= $db->query("SELECT * FROM jenis_biaya WHERE kd_jenis_biaya='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Nama Biaya</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_jenis_biaya" value="<?php echo $data->kd_jenis_biaya; ?>">
				<input type="text" id="nama_biaya" value="<?php echo $data->nama_biaya; ?>">
			</td>
		</tr>
		<tr>
			<td>Tarif</td>
			<td>:</td>
			<td>
				<input type="text" id="tarif" value="<?php echo $data->tarif; ?>">
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