<?php
include "koneksi.php";
	
	$keluhan = @$_POST['keluhan'];
	$diagnosa = @$_POST['diagnosa'];
	$perawatan = @$_POST['perawatan'];
	$tindakan = @$_POST['tindakan'];
	$berat_badan = @$_POST['berat_badan'];
	$tensi_diastolik = @$_POST['tensi_diastolik'];
	$tensi_sistolik = @$_POST['tensi_sistolik'];
	$no_pendaftaran = @$_POST['no_pendaftaran'];

	$kd_pemeriksaan = @$_POST['kd_pemeriksaan'];

if(@$_GET['page'] == 'tambah5') {
	$insert = $db->prepare("INSERT into pemeriksaan(keluhan, diagnosa, perawatan, tindakan, berat_badan, tensi_diastolik, tensi_sistolik, no_pendaftaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$insert->bindParam(1, $keluhan);
	$insert->bindParam(2, $diagnosa);
	$insert->bindParam(3, $perawatan);
	$insert->bindParam(4, $tindakan);
	$insert->bindParam(5, $berat_badan);
	$insert->bindParam(6, $tensi_diastolik);
	$insert->bindParam(7, $tensi_sistolik);
	$insert->bindParam(8, $no_pendaftaran);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit5') {

	$edit = $db->prepare("UPDATE pemeriksaan set keluhan = ?, diagnosa = ?, perawatan = ?, tindakan = ?, berat_badan = ?, tensi_diastolik = ?, tensi_sistolik = ?, no_pendaftaran = ? WHERE kd_pemeriksaan = ?");
	$edit->execute(array($keluhan, $diagnosa, $perawatan, $tindakan, $berat_badan, $tensi_diastolik, $tensi_sistolik,  $no_pendaftaran, $kd_pemeriksaan));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus5') {

	$del=$db->prepare("DELETE FROM pemeriksaan where kd_pemeriksaan=:kd_pemeriksaan");
	$del->bindParam(":kd_pemeriksaan",$kd_pemeriksaan);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>