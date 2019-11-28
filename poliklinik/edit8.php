<fieldset style='width: 350px;'>
	<legend><b>Edit Data</b></legend>
	<?php 
	include "koneksi.php";
	$id= $_POST['kd_poli'];
	$tampilperID= $db->query("SELECT * FROM poliklinik WHERE kd_poli='$id'");
	$data= $tampilperID->fetch(PDO::FETCH_OBJ);
	?>
	<table>
		<tr>
			<td>Nama Poli</td>
			<td>:</td>
			<td>
				<input type="hidden" id="kd_poli" value="<?php echo $data->kd_poli; ?>">
				<input type="text" id="nama_poli" value="<?php echo $data->nama_poli; ?>">
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