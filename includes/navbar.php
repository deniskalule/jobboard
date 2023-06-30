<!-- NAVBAR -->
<header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6" ><a href="index.php" style="font-size: 15px; font-weight: bold;">Terrazone Construction<br> Investment Limmited</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-4 pl-0">
              <li><a href="index.php" class="nav-link active">Home</a></li>
              <!-- <li><a href="about.php">About</a></li> -->
              <li>
                <a href="job-listings.php">Job Listings</a>
                
              </li>
              
              <!-- <li><a href="testimonials.php">Testimonials</a></li> -->
              <!-- <li><a href="contact.php">Contact</a></li> -->
              <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.php">Log In</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <?php
              if(isset($_SESSION['user'])){
              ?>
                <div class="d-flex">
                  <div class="dropdown open">
                    <button class="btn bg-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                          <i class="fas fa-user-circle    "></i>
                        </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                      <button class="dropdown-item" href="#">Name </button>
                    </div>
                  </div>
                  <a href="logout.php" class=" text-danger ml-4 mt-2"><span class="mr-2"><i class="fas fa-power-off    "></i></span>Log Out</a>

                </div>
              <?php
              }
              else
              {
                ?>
                  <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In / Register</a>

                <?php
              }
              ?>
              <!-- <a href="post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a> -->
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>