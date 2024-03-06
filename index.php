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
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
			  session_start();
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
	  <h2 align="center">GALERI FOTO </h2>
	  <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-5 offset-md-1">
		  <form class="form-inline ml-3" method="GET" action="index.php">
		  <div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" align="center">
			<div class="input-group-append">
			  <button class="btn btn-navbar" type="submit">
				<i class="fas fa-search"></i>
			  </button>
			</div>
		  </div>
		  </form>
		  <table id="example1" class="table table-bordered table-hover">
			<tr align="center">
				<th>ID</th>
				<th>JUDUL</th>
				<th>DESKRIPSI</th>
				<th>TANGGALUNGGAH</th>
				<th>LOKASIFILE</th>
				<th>ALBUM ID</th>
				<th>JUMLAH LIKE</th>
				<th>AKSI</th>
			</tr>
			<?php
				include 'koneksi.php';
				  if(isset($_GET['kata_cari'])) {
					$kata_cari = $_GET['kata_cari'];
					$query = "SELECT * FROM foto WHERE FotoID like '%".$kata_cari."%' OR JudulFoto like '%".$kata_cari."%' OR DeskripsiFoto like '%".$kata_cari."%'  ORDER BY FotoID ASC";
				  } else {
				  $query = "SELECT * FROM Foto where FotoID";
				  }
				  $result = mysqli_query($koneksi, $query);
				  if (!$result) {
					die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
				  }
				  $no = 1;
				  while ($data = mysqli_fetch_assoc($result)) {
				
			?>
			<tr align="center">
			
				<td><?=$data['FotoID']?></td>
				<td><?=$data['JudulFoto']?></td>
				<td><?=$data['DeskripsiFoto']?></td>
				<td><?=$data['TanggalUnggah']?></td>
				<td>
					<a href="images/<?=$data['LokasiFile']?>" data-toggle="lightbox" data-title="<?=$data['JudulFoto']?>" data-gallery="gallery">
					<img src="images/<?=$data['LokasiFile']?>" class="img-fluid mb-2" alt="red sample" width="300">
					</a>
				</td>
				<td><?=$data['AlbumID']?></td>
				<td><?php
				$FotoID=$data['FotoID'];
				$sql2=mysqli_query($koneksi, "select * from likeFoto where fotoID='$FotoID'");
				echo mysqli_num_rows($sql2);
				?>
				</td>
				<td>
					<a href="like.php?FotoID=<?=$data['FotoID']?>">like</a>
					<a href="komentar.php?FotoID=<?=$data['FotoID']?>">komentar</a>
				</td>
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
  <script>
	  $(function () {
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		  event.preventDefault();
		  $(this).ekkoLightbox({
			alwaysShowClose: true
		  });
		});

		$('.filter-container').filterizr({gutterPixels: 3});
		$('.btn[data-filter]').on('click', function() {
		  $('.btn[data-filter]').removeClass('active');
		  $(this).addClass('active');
		});
	  })
  </script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
</body>
</html>