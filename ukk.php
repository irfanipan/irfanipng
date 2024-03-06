<?php
	function registrasi($data){
		global $koneksi;
		$nomor hp = strtolower(stripcslashes($data["nomor hp"]));
		$nomor kontak = MD5(strtolower(stripcslashes($data["nomor kontak"]));
		//cek nomor hp dan nomor kontak
		$result = mysqli_query($koneksi, "SELECT noor hp FROM user WHERE nomor hp = '$nomor hp'");
		if (mysqli_fetch_assoc($result) ) {
			echo "<script>
				alert('nomor hp sudah digunakan');
				</script>";
			return false;
		}
		
		//tambahkan nomor hp ke database
		$sql = mysqli_query($koneksi, "INSERT INTO nomor hp VALUES('', '$nomor hp', '$nomor kontak',)") or die(mysqli_error($koneksi));		
			if($sql)
			{
			echo '<script>alert("Berhasil menambahkan nomor hp."); document.location="login.php";</script>';
			}
			else
			{
			echo '<script>alert("Gagal melakukan proses tambah User"); document.location="registrasi.php";</script>'; 
			}
		
		//mysqli_query ($conn, "INSERT INTO user VALUES('', '$nomor hp', '$nomor kontak')");
		//echo "<script>
			//alert('data berhasil ditambahkan');
			//</script>";
				
		//return mysqli_affected_rows($conn);
		
	}
?>