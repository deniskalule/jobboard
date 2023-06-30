
<?php
session_start();
 include("./includes/header.php"); ?>
<?php include("./includes/connection.php") ?>
<?php include("./includes/navbar.php") ?>
<?php
$id = $_GET['id'];

$select = $conn->query("select * from jobs where id = $id");
$job = $select->fetch_assoc();

?>
<section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');">

<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-12">
      <div class="mb-5 text-center">
        <h1 class="text-white font-weight-bold">Single Job Details</h1>
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
        <div class="row">
            <div class="col-md-6 shadow bg-light rounded p-3" style="border: 1px solid;">
                <div>
                    <i class="fas fa-home    text-dark text-center mt-3 p-1" style="font-size: 3em; border: 1px solid; border-radius: 50%;"></i> 
                    <h3 class="mt-3"><?= $job['job_title'] ?></h3>
                </div>
                <div class="d-flex justify-content-between">
                    <p><?= $job['location']. ' District' ?></p>
                    <p href="" class="btn btn-sm btn-danger mr-5"><?= $job['type'] ?></p>
                </div>
                <div>
                    <p>Positions: <?= $job['vacancies'] ?></p>
                    <p>Appy before: <?= $job['deadline'] ?></p>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light shadow p-3"  style="border: 1px solid;">
                
                 <div>
                    <h5><b>Required Experience:</b><span><?= ' '.$job['experience'].' years' ?></span></h5>
                    <hr />
                 </div>
                 <div>
                    <h5><u><b>Job Description</b></u></h5>
                    <p><?= $job['description'] ?></p>
                    <hr />
                 </div>
                 <div>
                    <h5><u><b>Job Qualifications</b></u></h5>
                    <p><?= $job['qualifications'] ?></p>
                    <hr />
                 </div>
                 <?php
                 if(isset($_SESSION['user']))
                 {
                    ?>
                        <a href="apply.php?jobid=<?= $job['id'] ?>" class="btn btn-sm btn-info w-25">Apply now</a>
                    <?php
                 }
                 else
                 {
                    echo '<p class="alert alert-success">Sign Up or Sign in to apply for this job</p>';
                 }
                 ?>
                </div>
            </div>
        </div>
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