<?php
include "koneksi.php";
	
	$nama_pegawai = @$_POST['nama_pegawai'];
	$alamat_pegawai = @$_POST['alamat_pegawai'];
	$telp_pegawai = @$_POST['telp_pegawai'];
	$tgl_lahir_pegawai = @$_POST['tgl_lahir_pegawai'];
	$jenis_kelamin = @$_POST['jenis_kelamin'];
	$username = @$_POST['username'];
	$golongan = @$_POST['golongan'];

	$nip = @$_POST['nip'];

if(@$_GET['page'] == 'tambah_profil_pegawai') {
	$insert = $db->prepare("INSERT into pegawai(nama_pegawai, alamat_pegawai, telp_pegawai, tgl_lahir_pegawai, jenis_kelamin, username, golongan) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$insert->bindParam(1, $nama_pegawai);
	$insert->bindParam(2, $alamat_pegawai);
	$insert->bindParam(3, $telp_pegawai);
	$insert->bindParam(4, $tgl_lahir_pegawai);
	$insert->bindParam(5, $jenis_kelamin);
	$insert->bindParam(6, $username);
	$insert->bindParam(7, $golongan);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit5') {

	$edit = $db->prepare("UPDATE pegawai set nama_pegawai = ?, alamat_pegawai = ?, telp_pegawai = ?, tgl_lahir_pegawai = ?, jenis_kelamin = ?, username = ?, golongan = ? WHERE nip = ?");
	$edit->execute(array($nama_pegawai, $alamat_pegawai, $telp_pegawai, $tgl_lahir_pegawai, $jenis_kelamin, $username, $golongan,  $no_pendaftaran, $nip));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
}
?>