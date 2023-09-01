<!DOCTYPE html>
<html lang="en">

<head>
  

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=FRONT_ASSET?>assets/img/favicon.png" rel="icon">
  <link href="<?=FRONT_ASSET?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=FRONT_ASSET?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=FRONT_ASSET?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=FRONT_ASSET?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=FRONT_ASSET?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=FRONT_ASSET?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=FRONT_ASSET?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=FRONT_ASSET?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="<?=$biscDataAdmin['imageProfile']?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?=  $biscDataAdmin['name']?></a></h1>
        <div class="social-links mt-3 text-center">
          
         <?php if(!empty($social)): ?>
               <?php foreach($social as $oneSocial):?> 
          
                   <a href="<?=$oneSocial['link']?>" class="<?=$oneSocial['title']?>"><i class="bx bxl-<?=$oneSocial['title']?>"></i></a>
            
              <?php endforeach?>
        <?php endif;?>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->