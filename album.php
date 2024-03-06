<?php
session_start();
if(!isset($_SESSION['UserID'])){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>GALERI FOTO</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" /> 
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="brand_box">
      <a class="navbar-brand" href="index.html">
        <span>
          GALERI FOTO
        </span>
      </a>
    </div>
  </div>
  
  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
			  <?php
			  if (!isset($_SESSION['UserID'])){
				  ?>
                <li class="nav-item active">
                  <a class="nav-link" href="login.php">LOGIN <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">REGISTER </a>
                </li>
                
				<?php
			  }else{
				  ?>
				  <li class="nav-item">
                  <a class="nav-link" href="beranda.php">BERANDA </a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="index.php">GALERI </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="album.php">ALBUM</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="foto.php">FOTO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">LOGOUT</a>
                </li>
				<?php
			  }
			  ?>
			  
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>
  
  <section class="contact_section layout_padding">
    <div class="container-fluid">
	  <h2 align="center">TAMBAH DATA ALBUM</H2>
	  <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-5 offset-md-1">
			<form action="tambah_album.php" method="post">
				<label>Nama Album :</label>
				<input type="text" name="NamaAlbum" placeholder="NamaAlbum" ></input>
				<label>Deskripsi Album :</label>
				<input type="text" name="Deskripsi" placeholder="Deskripsi"></input>
				<input type="submit" value="Tambah"></input>
				
			</form>
			<br>
			<h2 align="center"> DATA ALBUM</H2>
			<br>
			<table id="example1" class="table table-bordered table-hover" align="center">
			<tr align="center">

					<th>AlbumID</th>
					<th>NamaAlbum</th>
					<th>Deskripsi</th>
					<th>TanggaL Dibuat</th>
					<th>Aksi</th>
				</tr>
				<?php
					include "koneksi.php";
					$UserID=$_SESSION['UserID'];
					$query = "select * from album where UserID='$UserID'";
					$result = mysqli_query($koneksi, $query);
					if($result) //artinya jika query berhasil dijalankan
					{
						while($data = mysqli_fetch_assoc($result))
						{
							$albumid = $data['AlbumID'];
							echo "<tr align='center'>";
							echo "<td>" . $data['AlbumID'] . "</td>";
							echo "<td>" . $data['NamaAlbum'] . "</td>";
							echo "<td>" . $data['Deskripsi'] . "</td>";
							echo "<td>" . $data['TanggalDibuat'] . "</td>";
							echo "<td><a href='edit_album.php?AlbumID=$albumid' class='badge badge-warning'>Edit </a>";
							echo "<a href='hapus_album.php?id=$albumid' class='badge
		badge-danger' onclick='return confirm(\"Yakin ingin menghapus album ini?\")'>Hapus</a></td>";
							echo "</tr>";
						}
					}
					echo "</table>";
				  ?>
					
				
			</table>
			</div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>