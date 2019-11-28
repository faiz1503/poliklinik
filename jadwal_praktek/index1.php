<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Jadwal Praktek</title>
	
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
	<?php include "tampil1.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah1.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var tanggal = $("#tanggal").val();
	var jam_mulai = $("#jam_mulai").val();
	var jam_selesai = $("#jam_selesai").val();
	if(tanggal == '' || jam_mulai == '' || jam_selesai == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses1.php?page=tambah1',
			type : 'post',
			data : 'tanggal='+tanggal+'&jam_mulai='+jam_mulai+'&jam_selesai='+jam_selesai,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil1.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_jadwal = $(this).attr("id");
	$.ajax({
		url : 'edit1.php',
		type : 'post',
		data : 'kd_jadwal='+kd_jadwal,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var tanggal = $("#tanggal").val();
	var jam_mulai = $("#jam_mulai").val();
	var jam_selesai = $("#jam_selesai").val();
	var id = $("#id").val();
	if(tanggal == '' || jam_mulai == '' || jam_selesai == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses1.php?page=edit1',
			type : 'post',
			data : 'tanggal='+tanggal+'&jam_mulai='+jam_mulai+'&jam_selesai='+jam_selesai+'&kd_jadwal='+kd_jadwal,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil1.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_jadwal = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses1.php?page=hapus1',
		type : 'post',
		data : 'kd_jadwal='+kd_jadwal,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil1.php");
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