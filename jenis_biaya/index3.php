<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Biaya</title>
	
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
	<?php include "tampil3.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah3.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var nama_biaya = $("#nama_biaya").val();
	var tarif = $("#tarif").val();
	if(nama_biaya == '' || tarif == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses3.php?page=tambah3',
			type : 'post',
			data : 'nama_biaya='+nama_biaya+'&tarif='+tarif,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil3.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_jenis_biaya = $(this).attr("id");
	$.ajax({
		url : 'edit3.php',
		type : 'post',
		data : 'kd_jenis_biaya='+kd_jenis_biaya,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama_biaya = $("#nama_biaya").val();
	var tarif = $("#tarif").val();
	var kd_jenis_biaya = $("#kd_jenis_biaya").val();
	if(nama_biaya == '' || tarif == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses3.php?page=edit3',
			type : 'post',
			data : 'nama_biaya='+nama_biaya+'&tarif='+tarif+'&kd_jenis_biaya='+kd_jenis_biaya,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil3.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_jenis_biaya = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses3.php?page=hapus3',
		type : 'post',
		data : 'kd_jenis_biaya='+kd_jenis_biaya,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil3.php");
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