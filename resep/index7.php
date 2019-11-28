<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Resep</title>
	
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
	<?php include "tampil7.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah7.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var dosis = $("#dosis").val();
	var jumlah = $("#jumlah").val();
	var kd_obat = $("#kd_obat").val();
	var kd_pemeriksaan = $("#kd_pemeriksaan").val();
	if(dosis == '' || jumlah == '' || kd_obat == '' || kd_pemeriksaan == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses7.php?page=tambah7',
			type : 'post',
			data : 'dosis='+dosis+'&jumlah='+jumlah+'&kd_obat='+kd_obat+'&kd_pemeriksaan='+kd_pemeriksaan,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil7.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_resep = $(this).attr("id");
	$.ajax({
		url : 'edit7.php',
		type : 'post',
		data : 'kd_resep='+kd_resep,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var dosis = $("#dosis").val();
	var jumlah = $("#jumlah").val();
	var kd_obat = $("#kd_obat").val();
	var kd_resep = $("#kd_resep").val();
	if(dosis == '' || jumlah == '' || kd_obat == '' || kd_pemeriksaan == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses7.php?page=edit7',
			type : 'post',
			data : 'dosis='+dosis+'&jumlah='+jumlah+'&kd_obat='+kd_obat+'&kd_pemeriksaan='+kd_pemeriksaan+'&kd_resep='+kd_resep,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil7.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_resep = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses7.php?page=hapus7',
		type : 'post',
		data : 'kd_resep='+kd_resep,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil7.php");
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