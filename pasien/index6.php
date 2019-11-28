<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Pasien</title>
	
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
	<?php include "tampil6.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah6.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var nama_pasien = $("#nama_pasien").val();
	var alamat_pasien = $("#alamat_pasien").val();
	var telp_pasien = $("#telp_pasien").val();
	var tgl_lahir = $("#tgl_lahir").val();
	var jenis_kelamin = $("#jenis_kelamin").val();
	var tgl_registrasi = $("#tgl_registrasi").val();
	if(nama_pasien == '' || alamat_pasien == '' || telp_pasien == '' || tgl_lahir == '' || jenis_kelamin == '' || tgl_registrasi == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses6.php?page=tambah6',
			type : 'post',
			data : 'nama_pasien='+nama_pasien+'&alamat_pasien='+alamat_pasien+'&telp_pasien='+telp_pasien+'&tgl_lahir='+tgl_lahir+'&jenis_kelamin='+jenis_kelamin+'&tgl_registrasi='+tgl_registrasi,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil6.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_pasien = $(this).attr("id");
	$.ajax({
		url : 'edit6.php',
		type : 'post',
		data : 'kd_pasien='+kd_pasien,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama_pasien = $("#nama_pasien").val();
	var alamat_pasien = $("#alamat_pasien").val();
	var telp_pasien = $("#telp_pasien").val();
	var tgl_lahir = $("#tgl_lahir").val();
	var jenis_kelamin = $("#jenis_kelamin").val();
	var tgl_registrasi = $("#tgl_registrasi").val();
	var kd_pasien = $("#kd_pasien").val();
	if(nama_pasien == '' || alamat_pasien == '' || telp_pasien == '' || tgl_lahir == '' || jenis_kelamin == '' || tgl_registrasi == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses6.php?page=edit6',
			type : 'post',
			data : 'nama_pasien='+nama_pasien+'&alamat_pasien='+alamat_pasien+'&telp_pasien='+telp_pasien+'&tgl_lahir='+tgl_lahir+'&jenis_kelamin='+jenis_kelamin+'&tgl_registrasi='+tgl_registrasi+'&kd_pasien='+kd_pasien,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil6.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_pasien = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses6.php?page=hapus6',
		type : 'post',
		data : 'kd_pasien='+kd_pasien,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil6.php");
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