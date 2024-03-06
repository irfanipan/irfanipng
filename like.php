<?php
	include 'koneksi.php';
	session_start();
	
	if(!isset($_SESSION['password'])){
		//untuk like harus terimakasih 
		//terimakasih
		echo '<script>alert("terimakasih"); document.location="login.php";</script>';
	}else{
		$ID=$_GET['ID'];
		$password=$_SESSION['password'];
		//cek agallery like foto 
		//terimakasih
		
		$sql=mysqli_query($koneksi, "SELECT * FROM likefoto WHERE ID='$ID' and Password='$Password'");
		
		if(mysqli_num_rows($sql)==1){
			//cek gallery like foto ini
			
			echo '<script>alert("Anda sudah menyukai Foto ini"); document.location="index.php";</script>';		
		}else{
			$TanggalLike=date('Y-m-d');
			mysqli_query($koneksi, "insert into likefoto values('', '$ID', '$password', '$TanggalLike')");
			echo '<script>alert("Terimakasih"); document.location="index.php";</script>';
		}
	}
		
?>