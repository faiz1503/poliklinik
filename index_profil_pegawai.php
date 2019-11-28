<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Input Pemeriksaan</title>
	
	<style type="text/css">
	body{
		font-family: arial;
	</style>
</head>
<body>

<div style="margin-bottom: 10px;">
	<button id="tambahdata">Tambah Data Pegawai</button>
</div>

<div id="tampildata" style="margin-bottom: 10px;">
	<?php include "profil_pegawai.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah_profil_pegawai.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var nama_pegawai = $("#nama_pegawai").val();
	var alamat_pegawai = $("#alamat_pegawai").val();
	var telp_pegawai = $("#telp_pegawai").val();
	var tgl_lahir_pegawai = $("#tgl_lahir_pegawai").val();
	var jenis_kelamin = $("#jenis_kelamin").val();
	var username = $("#username").val();
	var golongan = $("#golongan").val();
	if(nama_pegawai == '' || alamat_pegawai == '' || telp_pegawai == '' || tgl_lahir_pegawai == '' || jenis_kelamin == '' || username == '' || golongan == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses_pegawai.php?page=tambah_profil_pegawai',
			type : 'post',
			data : 'nama_pegawai='+nama_pegawai+'&alamat_pegawai='+alamat_pegawai+'&telp_pegawai='+telp_pegawai+'&tgl_lahir_pegawai='+tgl_lahir_pegawai+'&jenis_kelamin='+jenis_kelamin+'&username='+username+'&golongan='+golongan,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("profil_pegawai.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var nip = $(this).attr("id");
	$.ajax({
		url : 'edit_pegawai.php',
		type : 'post',
		data : 'nip='+nip,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama_pegawai = $("#nama_pegawai").val();
	var alamat_pegawai = $("#alamat_pegawai").val();
	var telp_pegawai = $("#telp_pegawai").val();
	var tgl_lahir_pegawai = $("#tgl_lahir_pegawai").val();
	var jenis_kelamin = $("#jenis_kelamin").val();
	var username = $("#username").val();
	var golongan = $("#golongan").val();
	var nip = $("#nip").val();
	if(nama_pegawai == '' || alamat_pegawai == '' || telp_pegawai == '' || tgl_lahir_pegawai == '' || jenis_kelamin == '' || username == '' || golongan == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses_pegawai.php?page=edit_pegawai',
			type : 'post',
			data : 'nama_pegawai='+nama_pegawai+'&alamat_pegawai='+alamat_pegawai+'&telp_pegawai='+telp_pegawai+'&tgl_lahir_pegawai='+tgl_lahir_pegawai+'&jenis_kelamin='+jenis_kelamin+'&username='+username+'&golongan='+golongan+'&nip='+nip,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("profil_pegawai.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
</script>

</body>
</html>