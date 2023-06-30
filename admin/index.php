<?php 
    session_start();
    if(isset($_SESSION['admin']))
    {
        header("location: dashboard.php");
    } 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        form
        {
            margin: 10px 30px;
        }
    </style>
    </head>
  <body>
  <main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 shadow bg-light" id="login"  style="margin-top: 10%; border-radius: 15px; padding: 20px;">
                    <h5 class="text-center">TERRAZONE CONSTRUCTION & INVESTMENTS LIMITED</h5>
                    <h6 class="text-center"><b>Admin Login</b></h6>
                    <?php
                        if(isset($_SESSION['success']))
                        {
                            echo '<div class="alert alert-success " role="alert">
                                    '.$_SESSION["success"].'
                                </div>';
                                unset($_SESSION['success']);
                        }

                        else if(isset($_SESSION['error']))
                        {
                            echo '<div class="alert alert-danger " role="alert">
                                '.$_SESSION["error"].'
                                </div>';
                                unset($_SESSION['error']);
                        }
                        ?>
            
                    <form action="./backend/adminlogin.php"  class="form mt-3" method="post">
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password: </label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-b-n text-white ml-3" style="background-color: #aee615; cursor: pointer;">Login</button>
                        </div>
                        <!-- <p class="">Have no Account? <a class="signup-btn" style="color: #aee615; cursor: pointer;"><b>Sign Up</b></a></p> -->
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 mt-4 shadow rounded">
                    <div class="register" style="padding-left: 20px;">
                    
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
  </div>
</section>



</main><!-- End #main -->
    <!-- Optional JavaScript -->
    <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  
    </body>
</html>