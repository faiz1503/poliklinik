<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test PDO</title>
	
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
	<?php include "tampil.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var nama_obat = $("#nama_obat").val();
	var merk = $("#merk").val();
	var satuan = $("#satuan").val();
	var harga_jual = $("#harga_jual").val();
	if(nama_obat == '' || merk == '' || satuan == '' ||  harga_jual == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses.php?page=tambah',
			type : 'post',
			data : 'nama_obat='+nama_obat+'&merk='+merk+'&satuan='+satuan+'&harga_jual='+harga_jual,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_obat = $(this).attr("id");
	$.ajax({
		url : 'edit.php',
		type : 'post',
		data : 'kd_obat='+kd_obat,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var nama_obat = $("#nama_obat").val();
	var merk = $("#merk").val();
	var satuan = $("#satuan").val();
	var harga_jual = $("#harga_jual").val();
	var kd_obat = $("#kd_obat").val();
	if(nama_obat == '' || merk == '' || satuan == '' ||  harga_jual == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses.php?page=edit',
			type : 'post',
			data : 'nama_obat='+nama_obat+'&merk='+merk+'&satuan='+satuan+'&harga_jual='+harga_jual+'&kd_obat='+kd_obat,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_obat = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses.php?page=hapus',
		type : 'post',
		data : 'kd_obat='+kd_obat,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil.php");
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