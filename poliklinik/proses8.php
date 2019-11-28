<?php
include "koneksi.php";
	
	$nama_poli = @$_POST['nama_poli'];
	
	$kd_poli = @$_POST['kd_poli'];

if(@$_GET['page'] == 'tambah8') {
	$insert = $db->prepare("INSERT into poliklinik(nama_poli) VALUES (?)");
	$insert->bindParam(1, $nama_poli);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit8') {

	$edit = $db->prepare("UPDATE poliklinik set nama_poli = ? WHERE kd_poli = ?");
	$edit->execute(array($nama_poli, $kd_poli));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus8') {

	$del=$db->prepare("DELETE FROM poliklinik where kd_poli=:kd_poli");
	$del->bindParam(":kd_poli",$kd_poli);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>