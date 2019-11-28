<?php
include "koneksi.php";
	
	$nama_obat = @$_POST['nama_obat'];
	$merk = @$_POST['merk'];
	$satuan = @$_POST['satuan'];
	$harga_jual = @$_POST['harga_jual'];

	$kd_obat = @$_POST['kd_obat'];

if(@$_GET['page'] == 'tambah') {
	$insert = $db->prepare("INSERT into obat(nama_obat, merk, satuan, harga_jual) VALUES (?, ?, ?, ?)");
	$insert->bindParam(1, $nama_obat);
	$insert->bindParam(2, $merk);
	$insert->bindParam(3, $satuan);
	$insert->bindParam(4, $harga_jual);
	$insert->execute();
	if($insert->rowCount()>0) {
		echo "sukses";
	}
} else if(@$_GET['page'] == 'edit') {

	$edit = $db->prepare("UPDATE obat set nama_obat = ?, merk = ?, satuan = ?, harga_jual = ? WHERE kd_obat = ?");
	$edit->execute(array($nama_obat, $merk, $satuan, $harga_jual, $kd_obat));
	if($edit->rowCount()>0) {
		echo "sukses";
}	
} else if(@$_GET['page'] == 'hapus') {

	$del=$db->prepare("DELETE FROM obat where kd_obat=:kd_obat");
	$del->bindParam(":kd_obat",$kd_obat);
	$del->execute();
	   if($del->rowCount()>0){
	   		echo "sukses";
	   	}
	   }
?>