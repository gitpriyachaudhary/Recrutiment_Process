<?php include("header.php");

if(!isset($_SESSION['email'])){
  header("Location: login.php");
} 
?>

<title>VIEW</title>

<div class="sidenav">
 <br>
 <br>
 <a href="job_detail.php">ADD JOB DETAIL</a>
 <hr> <a href="interviewer_detail.php">INTERVIEWER DETAIL</a></hr>
 <hr> <a href="index_of_job.php">JOBS DETAIL</a></hr>
 <hr> <a href="interview_schedule.php">INTERVIEW SCHEDULE</a></hr>
 <hr> <a href="index_interview_schedule.php">INTERVIEW SCHEDULE DETAILS</a></hr>
 
</div> 

  <div class="container">
    <div id="result">
      <h1>VIEW APPLICANT</h1>

<?php include("connection.php")?>
      <?php
 $id=$_GET['id'];

 $sql = "SELECT * FROM APPLICANT_DETAIL WHERE REG_ID='".$id."'";

 $retval = mysqli_query($conn, $sql);

 if(! $retval ) {
    die('Could not get data: ' . mysqli_error());
 }?>
  
  
  <?php $row = mysqli_fetch_array($retval) ?>
  <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">

   
      <div class="form-group">
        <label for="APPLICANT IMAGE" class="col-sm-4 control-label">APPLICANT IMAGE</label>

        <div class="col-sm-6">
        <?php if($row['APPLICANT_PHOTO']){ ?>
        <img src="image/<?php echo $row['APPLICANT_PHOTO'] ?>">
        <?php } else {?>
        <img src="image/create-account-icon.png">
        <?php } ?>
        </div>
      </div>

  <div class="form-group">
        <label for="APPLICANT NAME" class="col-sm-4 control-label">APPLICANT NAME</label>

        <div class="col-sm-6">
        <?php echo $row['APPLICANT_NAME'] ?>
        </div>
      </div>

     
      <div class="form-group">
        <label for="EMAIL_ID" class="col-sm-4 control-label">EMAIL_ID</label>

        <div class="col-sm-6">
        <?php echo $row['EMAIL_ID'] ?>
        </div>
      </div>


      <div class="form-group">
        <label for="CONTACT_NUMBER" class="col-sm-4 control-label">CONTACT_NUMBER</label>

        <div class="col-sm-6">
        <?php echo $row['CONTACT_NUMBER'] ?>
        </div>
      </div>


      <div class="form-group">
        <label for="EXPERIENCE_IN_MONTH" class="col-sm-4 control-label">EXPERIENCE_IN_MONTH</label>

        <div class="col-sm-6">
        <?php echo $row['EXPERIENCE_IN_MONTH'] ?>
        </div>
      </div>


      <div class="form-group">
        <label for="EXPERIENCE_IN_YEAR" class="col-sm-4 control-label">EXPERIENCE_IN_YEAR</label>

        <div class="col-sm-6">
        <?php echo $row['EXPERIENCE_IN_YEAR'] ?>
        </div>
      </div>


      <?PHP $sql1 = "SELECT * FROM LOCATION WHERE LOCATION_ID='".$row['LOCATION_ID']."'";
      $retval1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_array($retval1)
      ?>
      <div class="form-group">
        <label for="LOCATION_ID" class="col-sm-4 control-label">LOCATION</label>

        <div class="col-sm-6">
        <?php echo $row1['LOCATION'] ?>
        </div>
      </div>
  

      <?PHP $select_10 = "SELECT * FROM APPLICANT_QUALIFICATION WHERE REG_ID='".$id."'";
      $retval_10 = mysqli_query($conn, $select_10);
      while($row_10 = mysqli_fetch_array($retval_10))
      {
      ?>
      <div class="form-group">
     <?php  $quali = "SELECT * FROM QUALIFICATION WHERE QUALIFICATION_ID='".$row_10['QUALIFICATION_ID']."'";
      $quali_data = mysqli_query($conn, $quali);
      $row_quali = mysqli_fetch_array($quali_data)
      ?>
        <label for="QUALIFICATION_ID" class="col-sm-4 control-label"><?php echo $row_quali['QUALIFICATION'];?></label>

        <div class="col-sm-6">
        <?php //echo $row_10['INSTITUTION'] ?>
        </div>
      </div>
      <div class="form-group">
        <label for="QUALIFICATION_ID" class="col-sm-4 control-label">INSTITUTION</label>

        <div class="col-sm-6">
        <?php echo $row_10['INSTITUTION'] ?>
        </div>
      </div>
      <div class="form-group">
        <label for="QUALIFICATION_ID" class="col-sm-4 control-label">PERCENTAGE</label>

        <div class="col-sm-6">
        <?php echo $row_10['PERCENTAGE'] ?>
        </div>
      </div>
      <div class="form-group">
        <label for="QUALIFICATION_ID" class="col-sm-4 control-label">YEAR_OF_PASSING</label>

        <div class="col-sm-6">
        <?php echo $row_10['YEAR_OF_PASSING'] ?>
        </div>
      </div>
      <?php } ?>
     
  

</div>

</form>

 </div>
 </div>

 <?php include("footer.php")?>
    </body>
    
</html>

 <style>
 body{
  margin-bottom: 50px; 
 }

 img {
    width: 20%;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0px;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 14px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}
 </style>