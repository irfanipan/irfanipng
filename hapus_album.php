<?php

	include "koneksi.php";
	$id = $_GET['id'];
	
	$query1 = "delete from album where AlbumID='$id'";
	$result1 = mysqli_query($koneksi,$query1);
	header('location:album.php');
	
	?>
	