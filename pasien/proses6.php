<?php
include "koneksi.php";
	
	$nama_pasien = @$_POST['nama_pasien'];
	$alamat_pasien = @$_POST['alamat_pasien'];
	$telp_pasien = @$_POST['telp_pasien'];
	$tgl_lahir = @$_POST['tgl_lahir'];
	$jenis_kelamin = @$_POST['jenis_kelamin'];
	$tgl_registrasi = @$_POST['tgl_registrasi'];

	$kd_pasien = @$_POST['kd_pasien'];

if(@$_GET['page'] == 'tambah6') {
	$insert = $db->prepare("INSERT into pasien(nama_pasien, alamat_pasien, telp_pasien, tgl_lahir, jenis_kelamin, tgl_registrasi) VALUES (?, ?, ?, ?, ?, ?)");
	$insert->bindParam(1, $nama_pasien);
	$insert->bindParam(2, $alamat_pasien);
	$insert->bindParam(3, $telp_pasien);
	$insert->bindParam(4, $tgl_lahir);
	$insert->bindParam(5, $jenis_kelamin);
	$insert->bindParam(6, $tgl_registrasi);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit6') {

	$edit = $db->prepare("UPDATE pasien set nama_pasien = ?, alamat_pasien = ?, telp_pasien = ?, tgl_lahir = ?, jenis_kelamin = ?, tgl_registrasi = ? WHERE kd_pasien = ?");
	$edit->execute(array($nama_pasien, $alamat_pasien, $telp_pasien, $tgl_lahir, $jenis_kelamin, $tgl_registrasi, $kd_pasien));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus6') {

	$del=$db->prepare("DELETE FROM pasien where kd_pasien=:kd_pasien");
	$del->bindParam(":kd_pasien",$kd_pasien);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>