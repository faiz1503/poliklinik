<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_obat'];
	$tampilperID= $db->query("SELECT * FROM obat WHERE kd_obat='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
	<?php
	include "config/koneksi.php";
	?>
		<tr>
			<td>Nama Obat</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_obat" value="<?php echo $data->kd_obat; ?>">
				<input type="text" id="nama_obat" value="<?php echo $data->nama_obat; ?>">
			</td>
		</tr>
		<tr>
			<td>Merek</td>
			<td>:</td>
			<td>
				<input type="text" id="merk" value="<?php echo $data->merk; ?>">
			</td>
		</tr>
		<tr>
			<td>Satuan</td>
			<td>:</td>
			<td>
				<input type="text" id="satuan" value="<?php echo $data->satuan; ?>">
			</td>
		</tr>
		<tr>
			<td>Harga Obat</td>
			<td>:</td>
			<td>
				<input type="text" id="harga_jual" value="<?php echo $data->harga_jual; ?>">
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
