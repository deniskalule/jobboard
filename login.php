<?php 
// session_start();
session_start();
    if(isset($_SESSION['user']))
    {
        header("location: ./index.php");
    } 
include("./includes/header.php"); 
?>
<?php include("./includes/navbar.php") ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg'); height: 40vh;" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7" style="margin-top: -50px;">
            <h1 class="text-white font-weight-bold">Sign Up/Login</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Log In</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" style="margin-top: -30px;">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-6 login">
            <h3 class="mb-4">Log In </h3>
            <?php
            if(isset($_SESSION['success']))
            {
              ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?= $_SESSION['success'] ?></strong> 
                  </div>
                  
              <?php
              unset($_SESSION['success']);
            }
            if(isset($_SESSION['error']))
            {
              ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?= $_SESSION['error'] ?></strong> 
                  </div>
                  
              <?php
              unset($_SESSION['error']);
            }
            ?>
            <form action="./backend/userLogin.php" method="post" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email address">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Log In" name="login" class="btn px-4 btn-primary text-white">
                </div>
                <p>Have no account yet? <a href="" class="register_now">Register here</a></p>
              </div>

            </form>
          </div>


          <!-- register new user -->
          <div class="col-lg-10 mb-5 register">
            <h2 class="mb-4">Sign Up to the online Job Portal</h2>
            <!-- user categories -->
            

            <!-- job seeker form -->
            <form action="./backend/userLogin.php" class="p-4 border rounded" method="post">

              <h3 class="h3style"> Your Login Detials </h3>
              <div class="form-group">
                <label for="email" >Enter your Email ID:</label>
                <input type="email" name="useremail" placeholder="Your E-mail" class="form-control" id="email"required>
              </div>  

              <div class="row">
                <div class="form-group col-6"> 
                  <label for="passnew" > Create new Password:</label>
                  <input type="password" id="passnew" placeholder="Add new Password" name="pass1" class="form-control" required /> 
                </div>
                <div class="form-group col-6"> 
                  <label for="passnew" > Confirm Password:</label>
                  <input type="password" id="passnew" placeholder="Confirm Password" name="cpassword" class="form-control" required /> 
                </div>
              </div>

            <div class="page-header">
              <h3 class="h3style">Your Contact Information</h3>
            </div>

            <div class="form-group">
              <label for="name">Full Name:</label>
              <input type="text" id="name" placeholder="Your Name" name="uname" class="form-control" required /> 
            </div>

            <div class="form-group">
              <label> Where are you currently located? </label>
              <div class="form-inline"> 
                <input type="text" name="region" class=" form-control region mr-3" placeholder="Enter region" required/>
                <input type="text" name="city" class=" form-control city" placeholder="Enter City" required/>
              </div>
            </div>

          
            <div class="form-group">
              <labelfor="mobno">Enter your Mobile number:</labelfor=>
              <input type="text" name="mobno" placeholder=" Mobile number" class="form-control" id="mobno" required>
            </div>


          <div class="form-group form-inline col-sm-10">
            <button class="btn btn-success" type="submit" name="register_jobseeker"  id="reg" value="submit">Register</button>
            <button class="btn btn-danger" type="reset" id="reset"> Reset </button>

          </div>

            </form>
          </div>
        </div>
      </div>
    </section>
    
    <?php include("./includes/footer.php") ?>