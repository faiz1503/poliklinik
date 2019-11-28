<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
include "koneksi.php";
?>
<fieldset style='width: 500px;'>
	<legend><b>Tambah Data</b></legend>

	<table>
		<tr>
			<td>Nama Dokter</td>
			<td>:</td>
			<td>
				<input type="text" id="nama_dokter">
			</td>
		</tr>
		<tr>
			<td>Alamat Dokter</td>
			<td>:</td>
			<td>
				<input type="text" id="alamat_dokter">
			</td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td>
				<input type="text" id="telp_dokter">
			</td>
		</tr>
		<tr>
			<td>Kode Poli</td>
			<td>:</td>
			<td>
			<select name='poliklinik'>
			<option value=0 selected>  - Pilih Kode Poli -  </option></p>
            <?php
            $tampil=mysql_query("SELECT * FROM poliklinik ORDER BY kd_poli");
            while($r=mysql_fetch_array($tampil)){
            echo "<option value=$r[kd_poli]>$r[kd_poli], $r[nama_poli]</option>"; } ?>
            </select>
            </td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td>
				<input type="text" id="gambar">
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