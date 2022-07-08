<?php 
	require_once "koneksi.php";

	// Tampung id provinsi, kota/kab, kecamatan
	$prop_id = $_POST['prop_id'];
	$kabkota_id = $_POST['kabkota_id'];
	$jfaskes_id = $_POST['jfaskes_id'];

	$sql_kota = mysqli_query(
		$con, "select * from kabkota where propinsi_id = $prop_id order by name asc"
	);

	// echo '<option>Pilih Kota</option>';
	while ($row_kota=mysqli_fetch_array($sql_kota)) {
		echo '<option value="'.$row_kota['id'].'">'
		.$row_kota['name']
		.'</option>';
	}


	$sql_kec = mysqli_query(
		$con, "select * from kecamatan where kabkota_id = $kabkota_id order by name asc"
	);

	// echo '<option>Pilih Kecamatan</option>';
	while ($row_kec=mysqli_fetch_array($sql_kec)) {
		echo '<option value="'.$row_kec['id'].'">'
		.$row_kec['name']
		.'</option>';
	}


	$sql_faskes = mysqli_query(
		$con, "select * from nfaskes where jfaskes_id = $jfaskes_id order by name asc"
	);

	// echo '<option>Pilih Nama faskes</option>';
	while ($row_faskes=mysqli_fetch_array($sql_faskes)) {
		echo '<option value="'.$row_faskes['id'].'">'
		.$row_faskes['name']
		.'</option>';
	}
 ?>