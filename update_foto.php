<?php
	include('koneksi.php');
	$FotoID			=$_POST['FotoID'];
	$JudulFoto		=$_POST['JudulFoto'];
	$DeskripsiFoto	=$_POST['DeskripsiFoto'];
	$AlbumID		=$_POST['AlbumID'];


			$sql	= mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', AlbumID='$AlbumID' WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				echo '<script>alert("berhasil menyimpan data.");
						document.location="foto.php";</script>';
			}
			else
			{
				echo '<div class="alert alert-warning">gagal melakukan proses  edit data.</div>';
			}
			?>		
			