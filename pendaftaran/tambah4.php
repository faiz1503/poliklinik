<?php
include "config/koneksi.php";
?>
<fieldset style='width: 350px;'>
	<legend><b>Tambah Data</b></legend>

	<table>
		<tr>
			<td>Tanggal Pendaftaran</td>
			<td>:</td>
			<td>
				<input type="date" id="tgl_pendaftaran">
			</td>
		</tr>
		<tr>
			<td>Kode Pasien</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_pasien">
			</td>
		</tr>
		<tr>
			<td>Nomor Urut</td>
			<td>:</td>
			<td>
				<input type="text" id="no_urut">
			</td>
		</tr>
		<tr>
			<td>Nomor Induk Pegawai/Nama Pegawai</td>
			<td>:</td>
			<select id="nip">
			<td>
			<?php
			$tampil=mysql_query("select * from pegawai ORDER BY nip");
			while($r = mysql_fetch_array($tampil))
    		echo "<option value=0 selected value='$r[nama_pegawai]'>$r[nama_pegawai]d</option>"; ?>
    		</td>
    		</select>
		</tr>
		<tr>
			<td>Kode Biaya</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_jenis_biaya">
			</td>
		</tr>
		<tr>
			<td>Kode Jadwal Praktek</td>
			<td>:</td>
			<td>
				<input type="text" id="kd_jadwal">
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button id="simpantambah">Simpan Data</button>
			</td>
		</tr>
	</table>
	
</fieldset>