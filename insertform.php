<?php          
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "RECRUITMENT_PROCESS";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit'])){
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name=$_POST['APPLICANT_NAME'];
$email=$_POST['EMAIL_ID'];
$contact_number=$_POST['CONTACT_NUMBER'];
$experience_in_month=$_POST['EXPERIENCE_IN_MONTH'];
$experience_in_year=$_POST['EXPERIENCE_IN_YEAR'];
$location_id=$_POST['dropdown'];

$sql = "INSERT INTO APPLICANT_DETAIL (APPLICANT_NAME, EMAIL_ID, CONTACT_NUMBER, EXPERIENCE_IN_MONTH, EXPERIENCE_IN_YEAR, LOCATION_ID )
VALUES ('$name','$email','$contact_number','$experience_in_month','$experience_in_year','$location_id')";
//echo $sql; die();
$run=mysqli_query($conn,$sql);

if ($run) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: index.php");

$conn->close();

      }    
        ?>
        
<?php 
include("header.php")
 ?>
  <div class="container">   
   
   
   <h1>REGISTRATION FORM</h1><br/>
    <form class="form-horizontal" role="form" method="POST" action="">

      <div class="form-group">
        <label for="APPLICANT NAME" class="col-sm-4 control-label">APPLICANT NAME</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="name" name= "APPLICANT_NAME" placeholder="Enter your Name">
        </div>
      </div>


      <div class="form-group">
        <label for="email address" class="col-sm-4 control-label">EMAIL ID</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="email_id" name="EMAIL_ID" placeholder="Enter your Email Address">
        </div>
      </div>


      <div class="form-group">
        <label for="number" class="col-sm-4 control-label">CONTACT NUMBER</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="contact_number" name="CONTACT_NUMBER" placeholder="Enter your Contact Number">
        </div>
      </div>


      <div class="form-group">
        <label for="experience" class="col-sm-4 control-label">EXPERIENCE IN MONTH</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="experience_month" name="EXPERIENCE_IN_MONTH" placeholder="Experience in Month">
        </div>
      </div>


      <div class="form-group">
        <label for="Experience" class="col-sm-4 control-label">EXPERIENCE IN YEAR</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="experience_year" name="EXPERIENCE_IN_YEAR" placeholder="Experience in Year">
        </div>
        <br/>
        <br/>


        <div class="form-group">

          <label for="location_id" class="col-sm-4 control-label">LOCATION_ID</label>

          <div class="col-sm-6">
          <select class="form-control" name="dropdown" id="location_id" >
          <option value="0" selected>Select City</option>
        <?PHP 
             $fetch_loction = "SELECT * FROM LOCATION";

             $fetch_loction = mysqli_query($conn, $fetch_loction);
            while($data_loc = mysqli_fetch_array($fetch_loction))
            {
               
        ?>
                    <option value="<?php echo $data_loc['LOCATION_ID'] ?>" ><?php echo $data_loc['LOCATION'] ?></option>
                <?php }  ?>

                </select>    
          </div>
          <div class="form-group">
        <label for="Qualification" class="col-sm-4 control-label">QUALIFICATION_ID</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="Qualification_Id" name="Qualification_Id" placeholder="Qualification_Id">
        </div>
        </div>

          <div class="form-group">
        <label for="Institution" class="col-sm-4 control-label">INSTITUTION</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="Institution" name="Institution" placeholder="Institution">
        </div>
        </div>

                  <div class="form-group">
        <label for="Percentage" class="col-sm-4 control-label">PERCENTAGE</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="Percentage" name="Percentage" placeholder="Percentage">
        </div>
        </div>

                          <div class="form-group">
        <label for="Year_of_Passing" class="col-sm-4 control-label">YEAR_OF_PASSING</label>

        <div class="col-sm-6">
          <input type="text" class="form-control" id="Year_of_Passing" name="Year_of_Passing" placeholder="Year_of_Passing">
        </div>
        </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" id="sub" class="btn btn-default" onclick="">SUBMIT</button>
        </div>
      </div>
    </form>

  <?php 
include("footer.php")
 ?>

      </body>
      
      </html>
      <style>
        .container {
          text-align: center;
          border: 3px solid;
          padding-bottom: 0px;
      
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