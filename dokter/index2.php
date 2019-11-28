<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Dokter</title>
	
	<style type="text/css">
	body{
		font-family: arial;
	</style>
</head>
<body>

<div style="margin-bottom: 10px;">
	<button id="tambahdata">Tambah Data</button>
</div>

<div id="tampildata" style="margin-bottom: 10px;">
	<?php include "tampil2.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah2.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var nama_dokter = $("#nama_dokter").val();
	var alamat_dokter = $("#alamat_dokter").val();
	var telp_dokter = $("#telp_dokter").val();
	var kd_poli = $("#kd_poli").val();
	var gambar = $("#gambar").val();
	if(nama_dokter == '' || alamat_dokter == '' || telp_dokter == '' || kd_poli == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses2.php?page=tambah2',
			type : 'post',
			data : 'nama_dokter='+nama_dokter+'&alamat_dokter='+alamat_dokter+'&telp_dokter='+telp_dokter+'&kd_poli='+kd_poli+'&gambar='+gambar,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil2.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_dokter = $(this).attr("id");
	$.ajax({
		url : 'edit2.php',
		type : 'post',
		data : 'kd_dokter='+kd_dokter,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama_dokter = $("#nama_dokter").val();
	var alamat_dokter = $("#alamat_dokter").val();
	var telp_dokter = $("#telp_dokter").val();
	var kd_poli = $("#kd_poli").val();
	var kd_dokter = $("#kd_dokter").val();
	if(nama_dokter == '' || alamat_dokter == '' || telp_dokter == '' || kd_poli == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses2.php?page=edit2',
			type : 'post',
			data : 'nama_dokter='+nama_dokter+'&alamat_dokter='+alamat_dokter+'&telp_dokter='+telp_dokter+'&kd_poli='+kd_poli+'&gambar='+gambar+'&kd_dokter='+kd_dokter,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil2.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_dokter = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses2.php?page=hapus2',
		type : 'post',
		data : 'kd_dokter='+kd_dokter,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil2.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menghapus Data");
				}
			}
		});
	}
});
</script>

</body>
</html>