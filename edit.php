<!DOCTYPE html>
<html lang="en">
<head>
  <title>UPDATE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">AIMBEYOND INFOTECH</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="#">HOME</a>
          </li>
          <li>
            <a href="#">REGISTRATION</a>
          </li>
          <li>
            <a href="#">CONTACT US</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div id="result">
      <h1>UPDATE APPLICANT</h1><br/>
      <?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "RECRUITMENT_PROCESS";
   

$conn = mysqli_connect($servername, $username, $password, $dbname);
   
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
 }
 $id=$_GET['id'];

 $sql = "SELECT * FROM APPLICANT_DETAIL WHERE REG_ID='".$id."'";

 $retval = mysqli_query($conn, $sql);

 if(! $retval ) {
    die('Could not get data: ' . mysqli_error());
 }?>
  
  <?php $row = mysqli_fetch_array($retval) ?>
   <form class="form-horizontal" role="form" method="POST" action="">
  <div class="form-group">
        <label for="APPLICANT NAME" class="col-sm-4 control-label">APPLICANT NAME</label>

        <div class="col-sm-6">
        <input type="text" class="form-control" id="applicant_name" placeholder="Enter your Applicant name" value="<?php echo $row['APPLICANT_NAME'] ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="email address" class="col-sm-4 control-label">EMAIL ADDRESS</label>

        <div class="col-sm-6">
        <input type="text" class="form-control" id="email_id" placeholder="Enter your Email Address" value="<?php echo $row['EMAIL_ID'] ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="contact number" class="col-sm-4 control-label">CONTACT NUMBER</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="contact_number" placeholder="Enter your Contact Number" value="<?php echo $row['CONTACT_NUMBER'] ?>">
        </div>
      </div>


      <div class="form-group">
        <label for="experience" class="col-sm-4 control-label">EXPERIENCE IN MONTH</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="experience_month" placeholder="Experience in Month" value="<?php echo $row['EXPERIENCE_IN_MONTH'] ?>">
        </div>
      </div>


      <div class="form-group">
        <label for="experience" class="col-sm-4 control-label">EXPERIENCE IN YEAR</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="experience_year" placeholder="Experience in Year" value="<?php echo $row['EXPERIENCE_IN_YEAR'] ?>">
        </div>
        </div>


      <?PHP $sql1 = "SELECT * FROM LOCATION WHERE LOCATION_ID='".$row['LOCATION_ID']."'";
      $retval1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_array($retval1)
 ?>
      <div class="form-group">
        <label for="LOCATION_ID" class="col-sm-4 control-label">LOCATION</label>

        <div class="col-sm-6">
        <input type="text" class="form-control" id="experience_year" placeholder="Enter your location" value="<?php echo $row1['LOCATION'] ?>">
        </div>
        <br/>
        <br/>

              <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="update" name="update" id="btnupdate" class="btn btn-default" onclick="">UPDATE</button>
        </div>
      </div>
</form>

 </div>
 </div>
 <div class="footer">
      <p>COPYRIGHT © 2018 </p>
    </div>
 
    </body>
    

</html>
<style>
  .container {
    text-align: center;
    padding-bottom: 0px;
    border: 3px solid;
  }

  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    text-align: center;
    color: aliceblue;
  }

</style>