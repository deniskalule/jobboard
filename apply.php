
<?php
session_start();
 include("./includes/header.php"); ?>
<?php include("./includes/connection.php") ?>
<?php include("./includes/navbar.php") ?>
<?php
$jobid = $_GET['jobid'];
$applicant_id = $_SESSION['user'];

$select = $conn->query("select * from jobs where id = $jobid");
$job = $select->fetch_assoc();
$sql = $conn->query("select * from applicant_table where id = $applicant_id");
$applicant = $sql->fetch_assoc();


?>
<section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');">

<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-12">
      <div class="mb-5 text-center">
        <h1 class="text-white font-weight-bold">Apply for the job of;</h1>
        <p><?= $job['job_title'] ?></p>
      </div>
      
    </div>
  </div>
</div>

<a href="#next" class="scroll-button smoothscroll">
  <span class=" icon-keyboard_arrow_down"></span>
</a>
</section>
    <div class="container m-4">
        <form action="./backend/apply.php" method="post" enctype="multipart/form-data">
            <h5 class="text-uppercase"><b><u>Application form</u></b></h5>
            <input type="hidden" name="applicant_id" value="<?= $applicant['id'] ?>" />
            <input type="hidden" name="job_id" value="<?= $job['id'] ?>" />
            <div class="row">
                <div class="form-group col-6">
                    <label for="">Full Name</label>
                    <input type="text" name= "fullname" class="form-control" value="<?= $applicant['fullname'] ?>" />
                </div>
                <div class="form-group col-6">
                    <label for="">Email</label>
                    <input type="email" name= "email" class="form-control" value="<?= $applicant['email'] ?>" />
                </div>
                <div class="form-group col-6">
                    <label for="">Contact</label>
                    <input type="text" name= "email" class="form-control" value="<?= $applicant['contact'] ?>" />
                </div>
            </div>

            <div class="form-group">
                <label for="">Attach Resume/CV: </label>
                <input type="file" name="resume" required />
            </div>
            <div class="form-group">
                <label for="">Attach cover letter: </label>
                <input type="file" name="letter" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm w-25 btn-info" name="apply">Submit</button>
            </div>
        </form>
    </div>

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

    
    
    <?php include("./includes/footer.php") ?>