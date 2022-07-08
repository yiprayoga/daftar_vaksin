<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Load file library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Load file library Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Load file library JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
	<style type="text/css">
		h2 {
			text-align: center;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
		}
		.kotak_login {

			margin: 20px auto;
	        width: 400px;
	        padding: 1px;
	        border: 1px solid ##E0FFFF;
	        background: #E0FFFF;
	        font-family: "segoe-ui", "open-sans", tahoma, arial;
		}

		input[type=text], input[type=password] {
        margin: 1px auto;
        width: 150%;
        padding: 10px;
   		}

	   	

	    .alert {
	    	color: red;
	    }
	</style>
</head>
<body>
 <br><br><br><br><br><br>
	<h2>Login Pendaftaran Covid-19</h2>
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert' align='center'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
 
		<form action="cek_login.php" method="post">
		<table > 
			<tr>
			<td>No Hp</td>
			<td></td>
			<td><input class="form-control" type="text" name="username" class="form_login" placeholder="Masukkan No Hp" required="required"><td>
			</tr>
			
			<tr>
			<td>Password</td>
			<td></td>
			<td><input class="form-control" type="password" name="password" class="form_login" placeholder="Masukkan Password" required="required"></td>
			</tr>
			
			<tr> 
			<td>&nbsp;</td> 
			</tr>
			
			<tr>
			<td>&nbsp;</td> 
			<td>&nbsp;</td>
			<td><input class="btn btn-info" type="submit" value="LOGIN"></td>
			</tr>
			</table>
		</form>
		
	</div>
 
 
</body>
</html>