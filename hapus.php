<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$nik = $_GET['nik'];
 
 
// menghapus data dari database
$input = "DELETE from data_pendaftar where nik='$nik'";
    $query = mysqli_query($con, $input);
 
 if($query){
		echo "<script>alert('Data Berhasil di Hapus!')</script>";			
		echo "<script>window.open('tampil.php','_self')</script>";
	}else{
		echo "<script>alert('Data Gagal di Simpan! silahkan cek kembali!')</script>";			
		echo "<script>window.open('tampil.php','_self')</script>";
	}
 
?>