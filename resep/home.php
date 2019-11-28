<?php 
ob_start();
session_start();
error_reporting(0);
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>PoliTech Klinik</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!-- Bukan CSS Pemanggilan -->
  <style type="text/css">

  button[id=about]:hover {
    background-color: #01579b;
  }
  </style>
  
  <!-- favicon (logo untuk web) -->
  <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a>
      <ul class="right hide-on-med-and-down">
      <?php
      if (empty($_SESSION[username]))
        echo '<li><a href="login.php">Login</a></li>'; ?>
      <?php if (!empty($_SESSION[username])) echo 'Halo, Selamat Datang'; ?>

        <!-- Dropdown Gauge -->
      <?php
      if (!empty($_SESSION[username]))
        echo "<a class='dropdown-button btn' data-beloworigin='true' data-alignment='right' data-activates='dropdown1'>";?> <?php echo ucfirst ("$_SESSION[username]"); ?></a>
      <?php
      if (!empty($_SESSION[username]))    
      echo "<button a class='dropdown-button btn' data-hover='true' data-activates='dropdown2' id='about'>Input dan Edit Data</button>"; ?>
      <?php
      if (!empty($_SESSION[username]))    
      echo "<button a class='dropdown-button btn' data-hover='true' data-activates='dropdown3'>Input dan Edit Data</button>"; ?>
      <?php
      if (!empty($_SESSION[username]))
      echo "<a class='dropdown-button btn' data-beloworigin='true' data-alignment='right' data-activates='dropdown4' id='about'>Menu</a>"; ?>

        <!-- Dropdown Structure 1 -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#">Update Profil</a></li>
    <li class="divider"></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  <!-- Dropdown Structure 2 -->
  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="home.php">Input Obat</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Jadwal Praktek</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Dokter</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Jenis Biaya</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Jadwal Praktek</a></li>
    <li class="divider"></li>
  </ul>
  <!-- Dropdown Structure 3 -->
  <ul id='dropdown3' class='dropdown-content'>
    <li><a href="#">Input Pemeriksaan</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Pasien</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Resep</a></li>
    <li class="divider"></li>
    <li><a href="#">Input Jenis Poli</a></li>
    <li class="divider"></li>
  </ul>
  <!-- Dropdown Structure 4 -->
  <ul id='dropdown4' class='dropdown-content'>
    <li><a href="http://localhost/politech/home.php">Kembali Ke Home</a></li>
    <li class="divider"></li>
    <li><a href="http://localhost/parallax-template/">About Us</a></li>
  </ul>
      <ul id="nav-mobile" class="side-nav">
      <?php
      if (empty($_SESSION[username]))
        echo '<li><a href="login.php">Login</a></li>'; ?>
      </ul>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
    <!-- Kode slider ini mennnsss -->
      <br><br>
      <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/sliders1.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3 span class="cyan-text text-accent-1">Selamat Datang di PoliTech Klinik</span></h3>
          <h5 class="light grey-text text-lighten-3">Klinik Modern masa Kini</h5>
        </div>
      </li>
      <li>
        <img src="img/slider2.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 span class="brown-text text-accent-1">Dengan Visi dan Misi</span></h3>
          <h5 class="light grey-text text-lighten-3">Sebagai Persyaratan Kelulusan dari SMKn2</h5>
        </div>
      </li>
      <li>
        <img src="img/slider3.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3 span class="orange-text text-deep">PoliTech Klinik</span></h3>
          <h5 class="light grey-text text-lighten-3">Poliklinik Berbasis Technologi</h5>
        </div>
      </li>
      <li>
        <img src="img/slider4.jpg"> <!-- random image -->
        <div class="caption bottom-align">
          <h3 span class="light-blue-text">M. Faiz Pratama</span></h3>
          <h5 class="light grey-text text-lighten-3">XII RPL</h5>
        </div>
      </li>
      <li>
        <img src="img/slider5.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>SMKn2 Pekanbaru</h3>
          <h5 class="white-text">Kamarku, Istanaku</h5>
        </div>
      </li>
    </ul>
  </div>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <?php
      include "index7.php";
      ?>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer green">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="black-text">PoliTech Bio</h5>
          <p class="grey-text text-lighten-4">Contoh Teks, malas mikir apa yg mau di isi di sini.. Contoh Teks, malas mikir apa yg mau di isi di sini.. Contoh Teks, malas mikir apa yg mau di isi di sini.. </p>
        </div>
      </div>
    </div>

    <div class="footer-copyright">
      <div class="container">
      Made by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize.</a> <a class="brown-text text-darken-4">Redesign By M. Faiz Pratama</a> <a class="yellow-text text-lighten-3">Copyright © 2016 Tamvan Tbk. All Rights Reserved.</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
  <!-- Kode Slider -->
  <script>
  $(document).ready(function(){
      $('.slider').slider({indicators: false, interval: 3000});
    });
    </script>

  </body>
</html>
