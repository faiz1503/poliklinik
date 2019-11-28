<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Pendaftaran</title>
	
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
	<?php include "tampil4.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah4.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var tgl_pendaftaran = $("#tgl_pendaftaran").val();
	var kd_pasien = $("#kd_pasien").val();
	var no_urut = $("#no_urut").val();
	var nip = $("#nip").val();
	var kd_jenis_biaya = $("#kd_jenis_biaya").val();
	var kd_jadwal = $("#kd_jadwal").val();
	if(tgl_pendaftaran == '' || kd_pasien == '' || no_urut == '' || nip == '' || kd_jenis_biaya == '' || kd_jadwal == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses4.php?page=tambah4',
			type : 'post',
			data : 'tgl_pendaftaran='+tgl_pendaftaran+'&kd_pasien='+kd_pasien+'&no_urut='+no_urut+'&nip='+nip+'&kd_jenis_biaya='+kd_jenis_biaya+'&kd_jadwal='+kd_jadwal,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil4.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_pendaftaran = $(this).attr("id");
	$.ajax({
		url : 'edit4.php',
		type : 'post',
		data : 'kd_pendaftaran='+kd_pendaftaran,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var tgl_pendaftaran = $("#tgl_pendaftaran").val();
	var kd_pasien = $("#kd_pasien").val();
	var no_urut = $("#no_urut").val();
	var nip = $("#nip").val();
	var kd_jenis_biaya = $("#kd_jenis_biaya").val();
	var kd_jadwal = $("#kd_jadwal").val();
	var kd_pendaftaran = $("#kd_pendaftaran").val();
	if(tgl_pendaftaran == '' || kd_pasien == '' || no_urut == '' || nip == '' || kd_jenis_biaya == '' || kd_jadwal == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses4.php?page=edit4',
			type : 'post',
			data : 'tgl_pendaftaran='+tgl_pendaftaran+'&kd_pasien='+kd_pasien+'&no_urut='+no_urut+'&nip='+nip+'&kd_jenis_biaya='+kd_jenis_biaya+'&kd_jadwal='+kd_jadwal+'&kd_pendaftaran='+kd_pendaftaran,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil4.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_pendaftaran = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses4.php?page=hapus4',
		type : 'post',
		data : 'kd_pendaftaran='+kd_pendaftaran,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil4.php");
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