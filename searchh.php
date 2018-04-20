
<?php include("header.php");
if(!isset($_SESSION['email'])){
    header("Location: login.php");
  }
   ?>
<?php include("connection.php"); ?>
<title>SEARCH</title>


<?php
if(isset($_POST['submit'])) 
{

$search=$_POST['by_name'];


$search=preg_replace("#[^0-9a-z]#i","",$search);

$query=mysqli_query($conn,"select * from APPLICANT_DETAIL WHERE APPLICANT_NAME LIKE '%$search%'");


// echo "select * from APPLICANT_DETAIL WHERE APPLICANT_NAME LIKE '%$search%'";

$count=mysqli_num_rows($query);

// echo $count; die();

}

?>

    <form class="btn_search" action="" method="POST" >
        <center>
        <input type="text" name="by_name"/>
        <input type="submit" name="submit" class="btn btn-primary" value="Search"/>

 
        </center>
    </form></br></br>

<?php

if ($count==0){$out="no result";}

else{

while($data=mysqli_fetch_array($query)){

$id=$data['REG_ID'];

?>

<div class="containerr">
<h4> APPLICANT DETAILS </h4>

 <table class="table">
 <thead>
 <tr>
 <th style="text-align: center;">REG_ID</th>
 <th style="text-align: center;">APPLICANT_NAME</th>
 <th style="text-align: center;">EMAIL_ID</th>
 <th style="text-align: center;">CONTACT_NUMBER</th>
 <th style="text-align: center;">LOCATION</th>
 <th style="text-align: center;">EXPERIENCE_IN_MONTH</th>
 <th style="text-align: center;">EXPERIENCE_IN_YEAR</th>
 <th style="text-align: center;">QUALIFICATION</th>
 <th style="text-align: center;">INSTITUTION</th>
 <th style="text-align: center;">PERCENTAGE</th>
 <th style="text-align: center;">YEAR_OF_PASSING</th>


 
 </tr>
 </thead>
 <tbody>
 <?php while($row = mysqli_fetch_array($retval)) { ?>
 <tr>
 <td><?php echo $row['REG_ID'] ?></td>
 <td><?php echo $row['APPLICANT_NAME'] ?></td>
 <td><?php echo $row['EMAIL_ID'] ?></td>
 <td><?php echo $row['CONTACT_NUMBER'] ?></td>
 <td><?php echo $row['LOCATION'] ?></td>
 <td><?php echo $row['EXPERIENCE_IN_MONTH'] ?></td>
 <td><?php echo $row['EXPERIENCE_IN_YEAR'] ?></td>
 <td>    <?php 
         $select_10 = "SELECT * FROM APPLICANT_QUALIFICATION WHERE REG_ID='".$id."'";
         $retval_10 = mysqli_query($conn, $select_10);
         while($row_10 = mysqli_fetch_array($retval_10))
         {
         
   $quali = "SELECT * FROM QUALIFICATION WHERE QUALIFICATION_ID='".$data['QUALIFICATION_ID']."'";
   $quali_data = mysqli_query($conn, $quali);
   $row_quali = mysqli_fetch_array($quali_data);
   $QUALIFICATION=$row_quali['QUALIFICATION'];
    
    ?></td>
 <td><?php echo $row_quali['QUALIFICATION'] ?></td>
 <td><?php echo $row_10['INSTITUTION'] ?></td>
 <td><?php echo $row_10['PERCENTAGE'] ?></td>
 <td><?php echo $row_10['YEAR_OF_PASSING'] ?></td>
 <td><?php echo $row_10['INSTITUTION'] ?></td>
 </tr>
 <?php } ?>
 </tbody>
 </table> 
 </div>
 </div>




</div>

<?php 
}
}
}
?>
<?php

include("footer.php");

?>

  </body>
    </html>


    <style>

.containerr {
  text-align: center !important;
  padding-bottom: 0px;
  width: 100%;
}


.table{
  margin-top: 4%;
  margin-left: 10%;
  margin-bottom: 3%;
  width:85%;
  

 
}
.footer {
 
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  text-align: center;
  color: aliceblue;
  z-index: 5;
}


</style>