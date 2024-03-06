<?php

	include "koneksi.php";
	$id = $_GET['id'];

	$query1 = "delete from foto where FotoID='$id'";
	$result1 = mysqli_query($koneksi, $query1);
	header('location:foto.php');

?>