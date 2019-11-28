<fieldset style='width: 350px;'>
	<legend><b>Tambah Data</b></legend>

	<table>
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td>
				<input type="text" id="nama_pasien">
			</td>
		</tr>
		<tr>
			<td>Alamat Pasien</td>
			<td>:</td>
			<td>
				<input type="text" id="alamat_pasien">
			</td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td>
				<input type="text" id="telp_pasien">
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
				<input type="date" id="tgl_lahir">
			</td>
		</tr>
		<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
		<div class="input-field col s12">
		<select id="jenis_kelamin">
			<option value="" disabled selected>Choose your Gender</option>
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option
		</select>
		</div>
		</td>
		</tr>
		<tr>
			<td>Tanggal Registrasi</td>
			<td>:</td>
			<td>
				<input type="date" id="tgl_registrasi">
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