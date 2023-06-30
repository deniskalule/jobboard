
<?php 
session_start();
include("./includes/header.php");
include("./includes/connection.php"); ?>
<?php include("./includes/navbar.php") ?>

    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/bg.jpg'); background-attachment: fixed;" id="home-section">

<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-12">
      <div class="mb-5 text-center">
        <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
      </div>
      <form method="post" class="search-jobs-form text-center ml-5">
        
          <center>
          <div class="d-flex" style="justify-content: center;">
            <div class=" text-center mr-4">
              <input type="text" class="form-control form-control-lg w-100" placeholder="Job title, Company...">
            </div>
            
            <div class="">
              <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
            </div>
          </div>
          </center>
        
      </form>
    </div>
  </div>
</div>

<a href="#next" class="scroll-button smoothscroll">
  <span class=" icon-keyboard_arrow_down"></span>
</a>

</section>

    
    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Jobs Listed</h2>
          </div>
        </div>
        
        <ul class="row job-listings mb-5">
          <?php 
          $sql = $conn->query("select * from jobs order by id DESC");

          while($job = $sql->fetch_assoc())
          {
            ?>

          <li class=" col-md-6 job-listing p-3">
            <a href="job-single.php?id=<?= $job['id'] ?>" class="shadow d-block d-sm-flex pb-3 pb-sm-0 align-items-center bg-light" style="text-decoration:none;">
              <div class="job-listing-logo text-center">
                <i class="fas fa-home    text-dark text-center mt-3 p-1" style="font-size: 3em; border: 1px solid;"></i>            
              </div>

              <div class="job-listing-about w-100 pl-4">
                <div class="job-listing-position custom-width w-50 mt-4 mb-2">
                  <h2><b><?= $job['job_title'] ?></b></h2>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-100">
                  <span class="icon-room"></span><?= ' '.$job['location']?> 
                  <span class="w-100 ml-4"><b><?= $job['vacancies'].' Positions' ?></b></span>
                  <h6 class="mt-3"><b><u>Apply before:</u></b> <?= $job['deadline'] ?></h6>
                </div>
                <div class="job-listing-meta">
                  <span class="badge badge-danger"><?= $job['type'] ?></span>
                </div>
              </div>
            </a>
            
            
          </li>
            <?php
          }
          
          ?>
        </ul>

        <!-- <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-7 Of 43,167 Jobs</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div> -->

      </div>
    </section>

    <?php
    
    if(!isset($_SESSION['user']))
    {
      ?>
        <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Job?</h2>
            <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
          </div>
        </div>
      </div>
    </section>
      <?php
    }
    ?>

    
    
    <?php include("./includes/footer.php") ?>