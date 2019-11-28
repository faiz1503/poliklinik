<?php
include "koneksi.php";
	
	$tanggal = @$_POST['tanggal'];
	$jam_mulai = @$_POST['jam_mulai'];
	$jam_selesai = @$_POST['jam_selesai'];

	$kd_jadwal = @$_POST['kd_jadwal'];

if(@$_GET['page'] == 'tambah1') {
	$insert = $db->prepare("INSERT into jadwal_praktek(tanggal, jam_mulai, jam_selesai) VALUES (?, ?, ?)");
	$insert->bindParam(1, $tanggal);
	$insert->bindParam(2, $jam_mulai);
	$insert->bindParam(3, $jam_selesai);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit1') {

	$edit = $db->prepare("UPDATE jadwal_praktek set tanggal = ?, jam_mulai = ?, jam_selesai = ? WHERE kd_jadwal = ?");
	$edit->execute(array($tanggal, $jam_mulai, $jam_selesai, $kd_jadwal));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus1') {

	$del=$db->prepare("DELETE FROM jadwal_praktek where kd_jadwal=:kd_jadwal");
	$del->bindParam(":kd_jadwal",$kd_jadwal);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>