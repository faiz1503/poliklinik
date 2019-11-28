<?php
include "koneksi.php";
	
	$nama_dokter = @$_POST['nama_dokter'];
	$alamat_dokter = @$_POST['alamat_dokter'];
	$telp_dokter = @$_POST['telp_dokter'];
	$kd_poli = @$_POST['kd_poli'];
	$gambar = @$_POST['gambar'];

	$kd_dokter = @$_POST['kd_dokter'];

if(@$_GET['page'] == 'tambah2') {
	$insert = $db->prepare("INSERT into dokter(nama_dokter, alamat_dokter, telp_dokter, kd_poli, gambar) VALUES (?, ?, ?, ?, ?)");
	$insert->bindParam(1, $nama_dokter);
	$insert->bindParam(2, $alamat_dokter);
	$insert->bindParam(3, $telp_dokter);
	$insert->bindParam(4, $kd_poli);
	$insert->bindParam(5, $gambar);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit2') {

	$edit = $db->prepare("UPDATE dokter set nama_dokter = ?, alamat_dokter = ?, telp_dokter = ?, kd_poli = ?, gambar = ? WHERE kd_dokter = ?");
	$edit->execute(array($nama_dokter, $alamat_dokter, $telp_dokter, $kd_poli, $gambar, $kd_dokter));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus2') {

	$del=$db->prepare("DELETE FROM dokter where kd_dokter=:kd_dokter");
	$del->bindParam(":kd_dokter",$kd_dokter);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>