<?php
	function registrasi($data){
		global $koneksi;
		$Username = (strtolower(stripcslashes($data["Username"]));
		$Password = MD5(strtolower(stripcslashes($data["Password"]));
		$Email =  (strtolower(stripcslashes($data["Email"]));
		$NamaLengkap = md5($data["NamaLengkap"]);
		$Alamat = ($data["Alamat"]);

		//cek username sudah ada apa belum
		$result = mysqli_query($koneksi, "SELECT Username FROM user WHERE Username = '$Username'");
		if (mysqli_fetch_assoc($result) ) {
			echo "<script>
				alert('Username sudah digunakan');
				</script>";
			return false;
		}
		
		//tambahkan username ke database
		$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat')") or die(mysqli_error($koneksi));		
			if($sql)
			{
			echo '<script>alert("Berhasil menambahkan User."); document.location="login.php";</script>';
			}
			else
			{
			echo '<script>alert("Gagal melakukan proses tambah User"); document.location="registrasi.php";</script>'; 
			}
		
		//mysqli_query ($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$password')");
		//echo "<script>
			//alert('data berhasil ditambahkan');
			//</script>";
				
		//return mysqli_affected_rows($conn);
		
	}
?>