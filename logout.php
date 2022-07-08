<?php
	/****************************************************
	Halaman ini merupakan halaman logout, dimana kita menghapus session yang ada.
	*****************************************************/
	session_start();
	if (isset($_SESSION['nama'])) {
		unset ($_SESSION);
		session_destroy();
		header("location:login.php?pesan=login");
		
	}
?>