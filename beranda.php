<?php
session_start();
if(!isset($_SESSION['UserID'])){
header ("location:login.php");
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
  <br>
  <section class="contact_section layout_padding">
    <div class="container-fluid">
	  <h2 align="center">SELAMAT DATANG</H2>
	  <?php
		require_once 'koneksi.php';
		$query = "SELECT * FROM user WHERE UserID='$_SESSION[UserID]'";
		$result = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_assoc($result) )
		{
		?>
		<h5  align="center"><i><?php echo $data['NamaLengkap']; ?></i></h5>
		<?php
		}
	?>
    </div>
  </section>
  <br><br><br><br>

  
  
  
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