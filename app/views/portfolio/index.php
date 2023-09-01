  <?php
       require_once 'header.php';
  ?>

<body>

  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?=  $biscDataAdmin['name']?></h1>
      <p>I'm <span class="typed" data-typed-items="<?= $biscDataAdmin['title']?>"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p><?= $biscDataAdmin['description']?></p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="<?= $biscDataAdmin['imageProfile']?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?= $biscDataAdmin['title']?></h3>
            <p class="fst-italic">
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?= $biscDataAdmin['birthDate']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?= $biscDataAdmin['phoneNumber']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?= $biscDataAdmin['city']?>, <?= $biscDataAdmin['country']?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?= $biscDataAdmin['degree']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong> <span><?= $biscDataAdmin['email']?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
          <p><?= $biscDataAdmin['description']?></p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">
          <?php if(count($skill)>0):?>
            <?php for($count = 0; $count<= count($skill)/2; $count++):?>
            
              <div class="progress">

              <span class="skill"><?=$skill[$count]['title']?> <i class="val"><?=$skill[$count]['ratio']?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?=$skill[$count]['ratio']?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
             </div>
          
            <?php endfor;?>
          <?php endif;?>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          
          <?php if(count($skill)>0):?>

           <?php for($count > count($skill)/2; $count< count($skill); $count++):?>
            
              <div class="progress">

               <span class="skill"><?=$skill[$count]['title']?> <i class="val"><?=$skill[$count]['ratio']?>%</i></span>
               <div class="progress-bar-wrap">
               <div class="progress-bar" role="progressbar" aria-valuenow="<?=$skill[$count]['ratio']?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
           </div>
        
          <?php endfor;?>
        <?php endif;?>
          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resume</h2>
          <p><?= $biscDataAdmin['description']?></p>
        </div>      
            <h3 class="resume-title">Education</h3>
            <?php if(!empty($education)):?>
                <?php foreach($education as $oneEducation):?> 
            <div class="resume-item">
              <h4><?=$oneEducation['specialization']?></h4>
              <h5><?=$oneEducation['time']?></h5>
              <p><em><?=$oneEducation['institution']?></em></p>
              <p><?=$oneEducation['description']?></p>
           </div>

               <?php endforeach;?>  
           <?php endif;?>  
      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p><?= $biscDataAdmin['description']?></p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
        <?php if(!empty($allProject)):?>  
          <?php foreach($allProject as $oneProject):?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= $oneProject['icon']?>"class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="<?= $oneProject['icon']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $oneProject['title']?>"><i class="bx bx-plus"></i></a>
                <a href="<?= USER_DOMAIN.'User/portfolioShow/'.$oneProject['adminId'].'/'.$oneProject['id']?>" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
       <?php endif;?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p><?=$biscDataAdmin['description']?></p>
        </div>

        <div class="row">
        <?php if(!empty($service)):?>
                <?php foreach($service as $oneService):?> 
          
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href=""><?= $oneService['title']?></a></h4>
            <p class="description"><?=$oneService['description']?></p>
          </div>

               <?php endforeach;?>
      <?php endif;?>    
        </div>

      </div>
    </section><!-- End Services Section -->
    
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p><?=$biscDataAdmin['description']?></p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?=$biscDataAdmin['city']?>, <?=$biscDataAdmin['country']?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?=$biscDataAdmin['email']?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?=$biscDataAdmin['phoneNumber']?></p>
              </div>

              <iframe src="<?=$biscDataAdmin['google_map']?>" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="<?=USER_DOMAIN?>User/postContact/<?= $biscDataAdmin['id'] ?>" method="post" role="form" class="needs-validation" novalidate>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" >
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" >
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" >
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" ></textarea>
              </div>
              <div class="text-center"><button name="send" type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
  <?php
       require_once 'footer.php';
  ?>
