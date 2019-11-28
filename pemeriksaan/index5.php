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
	<button id="tambahdata">Tambah Data</button>
</div>

<div id="tampildata" style="margin-bottom: 10px;">
	<?php include "tampil5.php"; ?>
	
</div>

<div id="cruddata"></div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$("#tambahdata").click(function() {
	$("#cruddata").hide().load("tambah5.php").fadeIn(1000);
});

$("#cruddata").on("click", "#simpantambah", function() {
	var keluhan = $("#keluhan").val();
	var diagnosa = $("#diagnosa").val();
	var perawatan = $("#perawatan").val();
	var tindakan = $("#tindakan").val();
	var berat_badan = $("#berat_badan").val();
	var tensi_diastolik = $("#tensi_diastolik").val();
	var tensi_sistolik = $("#tensi_sistolik").val();
	var no_pendaftaran = $("#no_pendaftaran").val();
	if(keluhan == '' || diagnosa == '' || perawatan == '' || tindakan == '' || berat_badan == '' || tensi_diastolik == '' || tensi_sistolik == '' || no_pendaftaran == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses5.php?page=tambah5',
			type : 'post',
			data : 'keluhan='+keluhan+'&diagnosa='+diagnosa+'&perawatan='+perawatan+'&tindakan='+tindakan+'&berat_badan='+berat_badan+'&tensi_diastolik='+tensi_diastolik+'&tensi_sistolik='+tensi_sistolik+'&no_pendaftaran='+no_pendaftaran,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil5.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Menambahkan Data");
				}
			}
		});
	}
});

$("#tampildata").on("click", ".edit", function(){
	var kd_pemeriksaan = $(this).attr("id");
	$.ajax({
		url : 'edit5.php',
		type : 'post',
		data : 'kd_pemeriksaan='+kd_pemeriksaan,
		success : function(msg){
			$("#cruddata").hide().fadeIn(750).html(msg);
		}
	})
});

$("#cruddata").on("click", "#simpanedit", function() {
	var keluhan = $("#keluhan").val();
	var diagnosa = $("#diagnosa").val();
	var perawatan = $("#perawatan").val();
	var tindakan = $("#tindakan").val();
	var berat_badan = $("#berat_badan").val();
	var tensi_diastolik = $("#tensi_diastolik").val();
	var tensi_sistolik = $("#tensi_sistolik").val();
	var no_pendaftaran = $("#no_pendaftaran").val();
	var kd_pemeriksaan = $("#kd_pemeriksaan").val();
	if(keluhan == '' || diagnosa == '' || perawatan == '' || tindakan == '' || berat_badan == '' || tensi_diastolik == '' || tensi_sistolik == '' || no_pendaftaran == ''){
		alert("Data input tidak boleh Kosong...")
	} else {
		$.ajax({
			url : 'proses5.php?page=edit5',
			type : 'post',
			data : 'keluhan='+keluhan+'&diagnosa='+diagnosa+'&perawatan='+perawatan+'&tindakan='+tindakan+'&berat_badan='+berat_badan+'&tensi_diastolik='+tensi_diastolik+'&tensi_sistolik='+tensi_sistolik+'&no_pendaftaran='+no_pendaftaran+'&kd_pemeriksaan='+kd_pemeriksaan,
			success : function(msg) {
				if (msg == 'sukses') {
					$("#tampildata").load("tampil5.php");
					$("#cruddata").hide(1000);
				} else {
					alert("Gagal Mengedit Data");
				}
			}
		});
	}
});
$("#tampildata").on("click", ".hapus", function(){
	var kd_pemeriksaan = $(this).attr("id");
	var conf= confirm("Apa anda yakin ingin menghapus Record ini?")
		if (conf==true){
	$.ajax({
		url : 'proses5.php?page=hapus5',
		type : 'post',
		data : 'kd_pemeriksaan='+kd_pemeriksaan,
		success : function(msg){
			if (msg == 'sukses') {
					$("#tampildata").load("tampil5.php");
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