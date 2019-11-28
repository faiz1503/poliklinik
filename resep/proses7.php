<?php
include "koneksi.php";
	
	$dosis = @$_POST['dosis'];
	$jumlah = @$_POST['jumlah'];
	$kd_obat = @$_POST['kd_obat'];
	$kd_pemeriksaan = @$_POST['kd_pemeriksaan'];
	
	$kd_resep = @$_POST['kd_resep'];

if(@$_GET['page'] == 'tambah7') {
	$insert = $db->prepare("INSERT into resep(dosis, jumlah, kd_obat, kd_pemeriksaan) VALUES (?, ?, ?, ?)");
	$insert->bindParam(1, $dosis);
	$insert->bindParam(2, $jumlah);
	$insert->bindParam(3, $kd_obat);
	$insert->bindParam(4, $kd_pemeriksaan);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit7') {

	$edit = $db->prepare("UPDATE resep set dosis = ?, jumlah = ?, kd_obat = ?, kd_pemeriksaan = ? WHERE kd_resep = ?");
	$edit->execute(array($dosis, $jumlah, $kd_obat, $kd_pemeriksaan, $kd_resep));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus7') {

	$del=$db->prepare("DELETE FROM resep where kd_resep=:kd_resep");
	$del->bindParam(":kd_resep",$kd_resep);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>