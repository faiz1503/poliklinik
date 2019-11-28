<!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<fieldset style='width: 350px;'>
	<legend><b>Tambah Data</b></legend>
	<table>
		<tr>
			<td>Tanggal Praktek</td>
			<td>:</td>
			<td>
				<input type="date" class="datepicker" id="tanggal">
			</td>
		</tr>
		<tr>
			<td>Jam Mulai</td>
			<td>:</td>
			<td>
				<input type="time" id="jam_mulai">
			</td>
		</tr>
		<tr>
			<td>Jam Selesai</td>
			<td>:</td>
			<td>
				<input type="time" id="jam_selesai">
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button id="simpantambah">Simpan Data</button>
			</td>
		</tr>
	</table>
	
</fieldset>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<!-- Date Picker -->
<script>
	$('.datepicker')_pickdate ({
		selectMonths: true,
		selectYears: 20
	});
</script>