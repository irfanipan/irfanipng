<?php
include "koneksi.php";
session_start();

$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi md5 = $_POST['Deskripsi'];
$TanggalDibuat	= date('Y-m-d');
$UserID =$_SESSION['UserID'];

$sql = mysqli_query($koneksi, "insert into album values ('','$NamaAlbum', '$Deskripsi', '$TanggalDibuat', '$UserID')");

if($sql)
			{
				echo '<script>alert("Berhasil menambah data album.");
						document.location="album.php";</script>';
			}
			else
			{
				echo '<div class="alert alert-warning">Gagal menambah data album.</div>';
			}
?>