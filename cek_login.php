<?php
include "config/koneksi.php";

$qry=mysql_query("SELECT * FROM login WHERE username='$_POST[username]' AND password=md5('$_POST[password]')");
$jumpa=mysql_num_rows($qry);
$r=mysql_fetch_array($qry);

if ($jumpa > 0) {
	session_start();
    $_SESSION[username]= $r[username];
	$_SESSION[level]= $r[level];
	if ($r[level]=="admin"){
	 header("location: home.php");
	 } else if($r[level]=="pegawai"){
	 header("location: home.php");
	 }
	$_SESSION[password]= $r[password];
}
else {
	echo '<script language="javascript">
	alert("User Id atau Password Yang anda Masukkan Salah atau Acount Sudah Diblokir");
	window.location="login.php";
	</script>';
	exit();
}
?>