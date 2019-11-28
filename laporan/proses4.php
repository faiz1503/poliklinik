<?php
include "koneksi.php";
	
	$tgl_pendaftaran = @$_POST['tgl_pendaftaran'];
	$kd_pasien = @$_POST['kd_pasien'];
	$no_urut = @$_POST['no_urut'];
	$nip = @$_POST['nip'];
	$kd_jenis_biaya = @$_POST['kd_jenis_biaya'];
	$kd_jadwal = @$_POST['kd_jadwal'];

	$kd_pendaftaran = @$_POST['kd_pendaftaran'];

if(@$_GET['page'] == 'tambah4') {
	$insert = $db->prepare("INSERT into pendaftaran(tgl_pendaftaran, kd_pasien, no_urut, nip, kd_jenis_biaya, kd_jadwal) VALUES (?, ?, ?, ?, ?, ?)");
	$insert->bindParam(1, $tgl_pendaftaran);
	$insert->bindParam(2, $kd_pasien);
	$insert->bindParam(3, $no_urut);
	$insert->bindParam(4, $nip);
	$insert->bindParam(5, $kd_jenis_biaya);
	$insert->bindParam(6, $kd_jadwal);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit4') {

	$edit = $db->prepare("UPDATE pendaftaran set tgl_pendaftaran = ?, kd_pasien = ?, no_urut = ?, nip = ?, kd_jenis_biaya = ?, kd_jadwal = ? WHERE kd_pendaftaran = ?");
	$edit->execute(array($tgl_pendaftaran, $kd_pasien, $no_urut, $nip, $kd_jenis_biaya, $kd_jadwal, $kd_pendaftaran));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus4') {

	$del=$db->prepare("DELETE FROM pendaftaran where kd_pendaftaran=:kd_pendaftaran");
	$del->bindParam(":kd_pendaftaran",$kd_pendaftaran);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>
?>