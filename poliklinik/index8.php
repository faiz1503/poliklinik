<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Jenis Poli</title>
	
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
	<?php include "tampil8.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah8.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var nama_poli = $("#nama_poli").val();
	if(nama_poli == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses8.php?page=tambah8',
			type : 'post',
			data : 'nama_poli='+nama_poli,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil8.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_poli = $(this).attr("id");
	$.ajax({
		url : 'edit8.php',
		type : 'post',
		data : 'kd_poli='+kd_poli,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama_poli = $("#nama_poli").val();
	var kd_poli = $("#kd_poli").val();
	if(nama_poli == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses8.php?page=edit8',
			type : 'post',
			data : 'nama_poli='+nama_poli+'&kd_poli='+kd_poli,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil8.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_poli = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses8.php?page=hapus8',
		type : 'post',
		data : 'kd_poli='+kd_poli,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil8.php");
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