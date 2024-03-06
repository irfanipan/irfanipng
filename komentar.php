<?php
session_start();
if(!isset($_SESSION['FotoID'])){
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
			  if (!isset($_SESSION['FotoID'])){
				  ?>
                <li class="nav-item active">
                  <a class="nav-link" href="login.php">login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">register </a>
                </li>
                
				<?php
			  }else{
				  ?>
				  <li class="nav-item">
                  <a class="nav-link" href="beranda.php">BERANDA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php">GALERI</a>
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
	  <h2 align="center">KOMENTAR FOTO</H2>
	  <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-5 offset-md-1"> 
			<?php
			include('koneksi.php');
			$FotoID	=	$_GET['FotoID'];
			$sql =	mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'") or die(mysqli_query_error($koneksi));
			while($data=mysqli_fetch_array($sql)){
			$FotoID =  $_GET['FotoID'];
			?>
			<form action="tambah_komentar.php" method="post">
			<input type="text" name="AlbumID" placeholder="AlbumID" required value="<?php echo $data ['AlbumID']?>" hidden ></input>
			
				
				<label>Judul Foto :</label>
				<input type="text" name="JudulFoto" placeholder="JudulFoto" required readonly value="<?php echo $data ['JudulFoto']?>" ></input>
				<label>Deskripsi Foto :</label>
				<input type="text" name="DeskripsiFoto" placeholder="DeskripsiFoto"required readonly value="<?php echo $data ['DeskripsiFoto']?>"  ></input>
				<div class="form-group">
				<label for="">File</label>
				<div class="">
									<img src="images/<?=$data['LokasiFile']?>" width="200px">
								</div>
							  </div>
				<label>isi komentar:</label>
				<input type="text" name="IsiKomentar" placeholder="IsiKomentar" required ></input>
							  
							
				<input type="submit" value="Tambah Komentar "></input>
			
			</form>
			<?php
			}
			?>
			
			
			</div>
        </div>
      </div>
    </div>
  </section>
  
   <section class="contact_section layout_padding">
    <div class="container-fluid">
	  <h2 align="center">DATA KOMENTAR</H2>
	  <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-5 offset-md-1">
		  <table id="example1" class="table table-bordered table-hover">
			<tr>
				<th>ID</th>
				<th>FOTO</th>
				<th>KOMENTAR</th>
				<th>NAMALENGKAP</th>
				<th>ISIKOMENTAR</th>
				<th>TANGGALKOMENTAR</th>
			</tr>
			<?php
				include "koneksi.php";
				$FotoID = $_SESSION['FotoID'];
				$sql=mysqli_query($koneksi, "select * from  FotoID, user where FotoID.FotoID=user.FotoID");
				while($data=mysqli_fetch_array($sql)){
			?>
			<tr>
			
				<td><?=$data['FotoID']?></td>
				<td><?=$data['FotoID']?></td>
				<td><?=$data['FotoID']?></td>
				<td><?=$data['NamaLengkap']?></td>
				<td><?=$data['IsiKomentar']?></td>
				<td><?=$data['TanggalKomentar']?></td>
				</tr>
			<?php
				}
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