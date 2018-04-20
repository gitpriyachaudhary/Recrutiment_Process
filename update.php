<?php include("header.php");

if(!isset($_SESSION['email'])){
  header("Location: login.php");
} 
?>
<?php
include("connection.php");
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
?>

<title>UPDATE</title>

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
      <h1>UPDATE APPLICANT</h1><br/>


      <?php
 $id=$_GET['id'];

 $sql = "SELECT * FROM APPLICANT_DETAIL WHERE REG_ID='".$id."'";

 $retval = mysqli_query($conn, $sql);

 if(! $retval ) {
    die('Could not get data: ' . mysqli_error());
 }
 if (isset($_POST['update']))
{
  if($_FILES['APPLICANT_PHOTO']['name']){
  $file_name = $_FILES['APPLICANT_PHOTO']['name'];
      $file_size =$_FILES['APPLICANT_PHOTO']['size'];
      $file_tmp =$_FILES['APPLICANT_PHOTO']['tmp_name'];

      move_uploaded_file($file_tmp,"image/".$file_name);
  }

$id = $_POST['id'];
$APPLICANT_NAME = $_POST['applicant_name'];
$EMAIL_ID = $_POST['email_id'];
$CONTACT_NUMBER = $_POST['contact_number'];
$EXPERIENCE_IN_MONTH =$_POST['experience_in_month'];
$EXPERIENCE_IN_YEAR =$_POST['experience_in_year'];
$LOCATION_ID =$_POST['dropdown'];


$QUALIFICATION_10 =$_POST['dropdown_1'];
$INSTITUTION_10 =$_POST['INSTITUTION_1'];
$YEAR_OF_PASSING_10 =$_POST['yop_1'];
$PERCENTAGE_10 =$_POST['PERCENTAGE_1'];

$QUALIFICATION_12 =$_POST['dropdown_2'];
$INSTITUTION_12 =$_POST['INSTITUTION_2'];
$YEAR_OF_PASSING_12 =$_POST['yop_2'];
$PERCENTAGE_12 =$_POST['PERCENTAGE_2'];


$QUALIFICATION_16 =$_POST['dropdown_3'];
$INSTITUTION_16 =$_POST['INSTITUTION_3'];
$YEAR_OF_PASSING_16 =$_POST['yop_3'];
$PERCENTAGE_16 =$_POST['PERCENTAGE_3'];

$QUALIFICATION_18 =$_POST['dropdown_4'];
$INSTITUTION_18 =$_POST['INSTITUTION_4'];
$YEAR_OF_PASSING_18 =$_POST['yop_4'];
$PERCENTAGE_18 =$_POST['PERCENTAGE_4'];



if($_FILES['APPLICANT_PHOTO']['name']){

mysqli_query($conn,"UPDATE APPLICANT_DETAIL SET APPLICANT_PHOTO='$file_name', APPLICANT_NAME='$APPLICANT_NAME', EMAIL_ID='$EMAIL_ID' ,CONTACT_NUMBER='$CONTACT_NUMBER', EXPERIENCE_IN_MONTH='$EXPERIENCE_IN_MONTH', EXPERIENCE_IN_YEAR='$EXPERIENCE_IN_YEAR', LOCATION_ID='$LOCATION_ID' WHERE REG_ID=$id");
}
else{
  mysqli_query($conn,"UPDATE APPLICANT_DETAIL SET APPLICANT_NAME='$APPLICANT_NAME', EMAIL_ID='$EMAIL_ID' ,CONTACT_NUMBER='$CONTACT_NUMBER', EXPERIENCE_IN_MONTH='$EXPERIENCE_IN_MONTH', EXPERIENCE_IN_YEAR='$EXPERIENCE_IN_YEAR', LOCATION_ID='$LOCATION_ID' WHERE REG_ID=$id");

}


mysqli_query($conn,"UPDATE APPLICANT_QUALIFICATION SET QUALIFICATION_ID='$QUALIFICATION_10', INSTITUTION='$INSTITUTION_10' ,YEAR_OF_PASSING='$YEAR_OF_PASSING_10', PERCENTAGE='$PERCENTAGE_10' WHERE REG_ID=$id AND QUALIFICATION_ID=$QUALIFICATION_10");

mysqli_query($conn,"UPDATE APPLICANT_QUALIFICATION SET QUALIFICATION_ID='$QUALIFICATION_12', INSTITUTION='$INSTITUTION_12' ,YEAR_OF_PASSING='$YEAR_OF_PASSING_12', PERCENTAGE='$PERCENTAGE_12' WHERE REG_ID=$id AND QUALIFICATION_ID=$QUALIFICATION_12");

mysqli_query($conn,"UPDATE APPLICANT_QUALIFICATION SET QUALIFICATION_ID='$QUALIFICATION_16', INSTITUTION='$INSTITUTION_16' ,YEAR_OF_PASSING='$YEAR_OF_PASSING_16', PERCENTAGE='$PERCENTAGE_16' WHERE REG_ID=$id AND QUALIFICATION_ID=$QUALIFICATION_16");

mysqli_query($conn,"UPDATE APPLICANT_QUALIFICATION SET QUALIFICATION_ID='$QUALIFICATION_18', INSTITUTION='$INSTITUTION_18' ,YEAR_OF_PASSING='$YEAR_OF_PASSING_18', PERCENTAGE='$PERCENTAGE_18' WHERE REG_ID=$id AND QUALIFICATION_ID=$QUALIFICATION_18");

header('Location: index.php');
}

 ?>

  
  <?php $row = mysqli_fetch_array($retval) ?>
  <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">

   <div class="form-group">
        <label for="APPLICANT IMAGE" class="col-sm-4 control-label">APPLICANT IMAGE</label>
     
        <div class="col-sm-6">
        <input type="file" class="form-control" name="APPLICANT_PHOTO" id="applicant_photo">
        <BR/>
        <img src="image/<?php echo $row['APPLICANT_PHOTO'] ?>">
        <input type="hidden" class="form-control"name="id"  value="<?php echo $row['REG_ID'] ?>">
        </div>
      </div>

  <div class="form-group">
        <label for="APPLICANT NAME" class="col-sm-4 control-label">APPLICANT NAME</label>

        <div class="col-sm-6">
        <input type="text" class="form-control" name="applicant_name" id="applicant_name" placeholder="Enter your Applicant name" value="<?php echo $row['APPLICANT_NAME'] ?>">
        <input type="hidden" class="form-control"name="id"  value="<?php echo $row['REG_ID'] ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="email address" class="col-sm-4 control-label">EMAIL ADDRESS</label>

        <div class="col-sm-6">
        <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Enter your Email Address" value="<?php echo $row['EMAIL_ID'] ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="contact number" class="col-sm-4 control-label">CONTACT NUMBER</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" name ="contact_number" id="contact_number" placeholder="Enter your Contact Number" value="<?php echo $row['CONTACT_NUMBER'] ?>">
        </div>
      </div>


      <div class="form-group">
        <label for="experience" class="col-sm-4 control-label">EXPERIENCE IN MONTH</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" name ="experience_in_month" id="experience_month" placeholder="Experience in Month" value="<?php echo $row['EXPERIENCE_IN_MONTH'] ?>">
        </div>
      </div>


      <div class="form-group">
        <label for="experience" class="col-sm-4 control-label">EXPERIENCE IN YEAR</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" name ="experience_in_year" id="experience_year" placeholder="Experience in Year" value="<?php echo $row['EXPERIENCE_IN_YEAR'] ?>">
        </div>
        </div>

      <div class="form-group">
        <label for="LOCATION_ID" class="col-sm-4 control-label">LOCATION</label>

        <div class="col-sm-6">
    <select class="form-control" name="dropdown" id="location_id" >
        <?PHP 
             $fetch_loction = "SELECT * FROM LOCATION";

             $fetch_loction = mysqli_query($conn, $fetch_loction);
            while($data_loc = mysqli_fetch_array($fetch_loction))
            {
                if($data_loc['LOCATION_ID']==$row['LOCATION_ID'])
                {
        ?>
                      <option value="<?php echo $data_loc['LOCATION_ID'] ?>" selected><?php echo $data_loc['LOCATION'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $data_loc['LOCATION_ID'] ?>" ><?php echo $data_loc['LOCATION'] ?></option>
                <?php } } ?>

                </select>    
    </div>
    </div>

    <?PHP $select_10 = "SELECT * FROM APPLICANT_QUALIFICATION WHERE REG_ID='".$id."'";
      $retval_10 = mysqli_query($conn, $select_10);
      $i=1; 
      while($row_10 = mysqli_fetch_array($retval_10))
      {
      ?>
    <div class="form-group">
    <?php  $quali1 = "SELECT * FROM QUALIFICATION WHERE QUALIFICATION_ID='".$row_10['QUALIFICATION_ID']."'";
      $quali_data1 = mysqli_query($conn, $quali1);
      $row_quali1 = mysqli_fetch_array($quali_data1)
      ?>
        <label for="10th" class="col-sm-4 control-label"><?PHP ECHO $row_quali1['QUALIFICATION']?></label>

          <div class="col-sm-1" >
          <?php ?>
          <select class="form-control" name="dropdown_<?PHP ECHO $i;?>" id="DROPDOWN_10" >
          
        <?PHP 
             $fetch_qualification = "SELECT * FROM QUALIFICATION";

             $fetch_qualification = mysqli_query($conn, $fetch_qualification);
            while($data_qual = mysqli_fetch_array($fetch_qualification))
            {    
              if($data_qual['QUALIFICATION_ID']==$row_10['QUALIFICATION_ID'] ){?>
              <option value="<?php echo $data_qual['QUALIFICATION_ID'] ?>" SELECTED ><?php echo $data_qual['QUALIFICATION'] ?></option>
                <?PHP 
              }
              else{
        ?> 
        
                <?php }  } ?>

                </select>    
          </div>

        <div class="col-sm-2">
          <input type="text" class="form-control" id="Institution_10" value="<?php echo $row_10['INSTITUTION'] ?>" name="INSTITUTION_<?PHP ECHO $i ?>" placeholder="Institution">
        </div>
          

				  <div style=" float:left;" class="col-sm-2">
					  <input type="text" class="form-control" id="YOP_10" value="<?php echo $row_10['YEAR_OF_PASSING'] ?>" name="yop_<?PHP ECHO $i ?>">
            </div>
            <div class="col-sm-1">
          <input type="text" class="form-control" id="Percentage_10" value="<?php echo $row_10['PERCENTAGE'] ?>" name="PERCENTAGE_<?PHP ECHO $i ?>" placeholder="%age">
        </div>
            </div>
            <?PHP $i++; } ?>
                  <input type="hidden" value="<?php $i; ?>" name="hidden_i"?>

              <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" name="update" id="btnupdate" value="UPDATE" class="btn btn-info" >
          <button type="cancel" name="submitted" class="btn btn-warning" onclick="window.history.go(-1); return false;" value="cancel" >CANCEL</button>
        </div>
      </div>
</form>

 </div>
 </div>
 <?php
include("footer.php");
?>
 
    </body>
</html>

<style>
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