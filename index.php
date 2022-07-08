<?php 
	session_start();
	//pemeriksaan session
	if (isset($_SESSION['nama'])) {
		//jika sudah login
		//menampilkan isi session
		
		} else {
			//session belum ada artinya belum login
			die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
			ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
		}
?>

<html>
<head>
<title>Pendaftaran Vaksinasi Covid-19</title>
	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Load file library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Load file library Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Load file library JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

  <script src="asset/jquery/jquery-3.3.1.min.js"></script>
  <script>
		$(document).ready(function(){
			$('#propinsi').change(function(){
				var propinsi_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'prop_id='+propinsi_id, //$_POST['prov_id']
					success : function(response){
						$('#kota').html(response);
					}
				});
			})
		});

		$(document).ready(function(){
			$('#kota').change(function(){
				var kabupatenkota_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'kabkota_id='+kabupatenkota_id, //$_POST['kabkot_id']
					success : function(response){
						$('#kecamatan').html(response);
					}
				});
			})
		});

		$(document).ready(function(){
			$('#jfaskes').change(function(){
				var jfaskes_id = $(this).val();
				$.ajax({
					type : 'POST',//method
					url : 'wilayah.php', //action
					data : 'jfaskes_id='+jfaskes_id, //$_POST['prov_id']
					success : function(response){
						$('#nfaskes').html(response);
					}
				});
			})
		});
	</script>
<style type="text/css">

	.container {
		background: Magenta;
	}

    body { 
        max-width: 700px; margin: auto; 
        background: #ccffff;
    }

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #E0FFFF;
    text-align: left;
    padding: 8px;
    }

    tr{
    background-color: white;
    }

    p {
    	font-family: arial, sans-serif;
    }

    a {
    	color: grey;
    }

</style>

	<?php
    include("koneksi.php");     
  	?>

</head>
<body>
	<div class="container">
		<br>
		<h2 align="center">PENDAFTARAN VAKSINASI COVID-19</h2>
		<p align="center">Operator <?php echo $_SESSION['nama'];?> / <?php echo $_SESSION['nim'];?></p>
		<form action="simpan.php" method="post" enctype="multipart/form-data" name="inputdata">
		<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
		    <tr>
		        <td>Pilih Propinsi</td>
		        <td>
		        	 <?php 
						$sql_propinsi = mysqli_query($con, 'select * from propinsi order by name asc');
					 ?>
					 <select class="form-control" name="propinsi" id="propinsi" required="">
					 	<option value="">Pilih Propinsi</option>
					 	<?php 
					 		while($row_propinsi = mysqli_fetch_array($sql_propinsi)){
					 	?>
					 	<option value="<?php echo $row_propinsi['id'] ?>">
					 		<?php echo $row_propinsi['name'] ?>
					 	</option>	
					 	<?php } ?>
	                  </select><br>
		        </td>
		    </tr>
		    <tr>
		        <td>Pilih Kab/Kota</td>
		        <td>
		        	<select class="form-control" name="kota" id="kota" required="">
				 		<option>Pilih Kota</option>
				 		<option></option>
			 		</select>
		        </td>
		    </tr>
		    <tr>
		    	<tr>
		        <td>Pilih Kecamatan</td>
		        <td>
		        	<select class="form-control" name="kecamatan" id="kecamatan" required="">
				 		<option>Pilih Kecamatan</option>
				 		<option></option>
			 		</select>
		        </td>
		    </tr>
		    <tr>
		    	<tr>
		        <td>Pilih Jenis Faskes</td>
		        <td>
		        	<?php 
						$sql_jfaskes = mysqli_query($con, 'select * from jfaskes order by name asc');
					 ?>
					 <select class="form-control" name="jfaskes" id="jfaskes" required="">
					 	<option value="">Pilih Jenis Faskes</option>
					 	<?php 
					 		while($row_jfaskes = mysqli_fetch_array($sql_jfaskes)){
					 	?>
					 	<option class="form-control" value="<?php echo $row_jfaskes['id'] ?>">
					 		<?php echo $row_jfaskes['name'] ?>
					 	</option>	
					 	<?php } ?>
	                  </select><br>
		        </td>
		    </tr>
		    <tr>
		    	<tr>
		        <td>Pilih Nama Faskes</td>
		        <td ><select class="form-control" name="nfaskes" id="nfaskes" required="">
				 		<option>Pilih Nama Faskes</option>
				 		<option></option>
			 		</select>
			 	</td>
		    </tr>
		    <tr>
		    <tr>
		        <td>NIK</td>
		        <td><input class="form-control" type="text" name="nik" size="20" required=""></td>
		    </tr>
		    <tr>
		        <td>Nama</td>
		        <td><input class="form-control" type="text" name="nama" size="20" required=""></td>
		    </tr>
		    <tr>
		        <td>Jenis Kelamin</td>
		        <td>
		        	<select class="form-control" name="jk" required="">
		        		<option>Pilih Jenis Kelamin</option>
		        		<option>Laki - laki</option>
		        		<option>Perempuan</option>
		        	</select>
		        </td>
		    </tr>
		    <tr>
		        <td>Umur</td>
		        <td><input class="form-control" type="text" name="umur" size="20" required=""></td>
		    </tr>
		    <tr>
		        <td>Tanggal Lahir</td>
		        <td><input class="form-control" placeholder="mm/dd/yyyy" type="text" name="tgl_lahir" size="20" required=""></td>
		    </tr>
		    <tr>
		        <td>Nomor Hp</td>
		        <td><input class="form-control" type="text" name="no_hp" size="20" required=""></td>
		    </tr>
		    <tr>
		        <td>Alamat</td>
		        <td><input class="form-control" type="text" name="alamat" size="20" required=""></td>
		    </tr>
		    <tr>
		        <td><a href="logout.php"><div class="btn btn-danger">Logout</div></a></td>
		        <td>
		        <input  class="btn btn-success" type="submit" value="SUBMIT" name="submit">
		        <input  class="btn btn-warning" type="reset" value="RESET" name="reset">
		        <a href="tampil.php"><div class="btn btn-info">Lihat Data</div></a>
		    	</td>
		    </tr>
		</table>
		</form>			
	</div>


	

</body>
</html>