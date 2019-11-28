<?php
include "koneksi.php";
	
	$nama_biaya = @$_POST['nama_biaya'];
	$tarif = @$_POST['tarif'];

	$kd_jenis_biaya = @$_POST['kd_jenis_biaya'];

if(@$_GET['page'] == 'tambah3') {
	$insert = $db->prepare("INSERT into jenis_biaya(nama_biaya, tarif) VALUES (?, ?)");
	$insert->bindParam(1, $nama_biaya);
	$insert->bindParam(2, $tarif);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit3') {

	$edit = $db->prepare("UPDATE jenis_biaya set nama_biaya = ?, tarif = ? WHERE kd_jenis_biaya = ?");
	$edit->execute(array($nama_biaya, $tarif, $kd_jenis_biaya));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus3') {

	$del=$db->prepare("DELETE FROM jenis_biaya where kd_jenis_biaya=:kd_jenis_biaya");
	$del->bindParam(":kd_jenis_biaya",$kd_jenis_biaya);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>