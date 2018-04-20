<?php
include("header.php");

if(!isset($_SESSION['email'])){
  header("Location: login.php");
  
} 
?>

<?php
include("connection.php")
?>
 <div class="sidenav">
 <br>
 <br>
 <a href="job_detail.php">ADD JOB DETAIL</a>
 <hr> <a href="interviewer_detail.php">INTERVIEWER DETAIL</a></hr>
 <hr> <a href="index_of_job.php">JOBS DETAIL</a></hr>
 <hr> <a href="interview_schedule.php">INTERVIEW SCHEDULE</a></hr>
 <hr> <a href="index_interview_schedule.php">INTERVIEW SCHEDULE DETAILS</a></hr>
 
</div>

 
  <div class="containerr">
    <div id="result">

      <h1>LIST OF APPLICANTS</h1> 
      
      <button class="insert" ><a href="insertform.php">ADD NEW RECORDS </a></button>
      <button class="filter" ><a href="filter.php">FILTER </a></button>
      <button class="search" ><a href="search.php">SEARCH </a></button>
      
<?php
 $sql = 'SELECT * FROM APPLICANT_DETAIL';

 $retval = mysqli_query($conn, $sql);

 if(! $retval ) {
    die('Could not get data: ' . mysqli_error());
 }

 $id=$_GET['id'];

//$name=$_POST['name'];


$del1 = "DELETE FROM APPLICANT_QUALIFICATION WHERE REG_ID= $id";
$run_del1= mysqli_query($conn, $del1);
$del = "DELETE FROM APPLICANT_DETAIL WHERE REG_ID= $id";

//echo $del; die();

$run_del= mysqli_query($conn, $del);

if($run_del)

{

echo"<script>alert('data delete successfully')</script>";

header("Location: index.php");

}
if($_SESSION['msg']){
 ?>

 <div class="col-md-4 col-lg-4 alert alert-success">
 <p><?php 
   echo $_SESSION['msg'];  
   
   ?></p>
 </div>
 <?php unset($_SESSION['msg']);
   } ?>
 <table class="table" id="mytable">
 <thead>
 <tr>
 <th style="text-align: center;">REG_ID</th>
 <th style="text-align: center;">APPLICANT_NAME</th>
 <th style="text-align: center;">EMAIL_ID</th>
 <th style="text-align:center" >ACTION</th>
 <th style="text-align:center" >ACTION</th>
 <th style="text-align:center" >ACTION</th>
 </tr>
 </thead>
 <tbody>
 <?php while($row = mysqli_fetch_array($retval)) { ?>
 <tr>
 <td><?php echo $row['REG_ID'] ?></td>
 <td><?php echo $row['APPLICANT_NAME'] ?></td>
 <td><?php echo $row['EMAIL_ID'] ?></td>

 <td><button class="view" style="background-color: #2cce2c; border-radius: 4px;"><a href="view.php?id=<?php echo $row['REG_ID'] ?>">VIEW</a></button></td>
 <td><button class="view" style="background-color: #2887da; border-radius: 4px;"><a href="update.php?id=<?php echo $row['REG_ID'] ?>">UPDATE </a></button></td>
 <td><button class="view" style="background-color: red; border-radius: 4px;"><a href="index.php?id=<?php echo $row['REG_ID'] ?>">DELETE </a></button></td>

 </tr>
 <?php } ?>
 </tbody>
 </table> 
 </div>
 </div>
<script>
$(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>
 
<?php
include("footer.php")
?>
 
    </body>
    

</html>

<style>

  .containerr {
    text-align: center !important;
    padding-bottom: 0px;
    width: 85%;
    margin-left: 12%
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

  .insert{
    background-color: orange;
    text-decoration: none !important;
    color: white;
    border: none;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    float: right;
    margin-right: 1%;
    margin-bottom: 1%;
    border-radius: 4px;
  }

  .search{
    background-color: #26bbf7;;
    text-decoration: none !important;
    color: white;
    border: none;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    float: right;
    margin-right: 1%;
    margin-bottom: 1%;
    border-radius: 4px;
  }

    .filter{
    background-color: #26f7d2;
    text-decoration: none !important;
    color: white;
    border: none;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    float: right;
    margin-right: 1%;
    margin-bottom: 1%;
    border-radius: 4px;
  }

  .view{
    background-color: #2cce2c;
    text-decoration: none !important;
    color: white;
    border: none;
    text-align: center;
    display: inline-block;
    font-size: 14px;
    padding: 5px;
 
  }

  

  .insert a{
    color: black;
  }

  .view a{
    color: white;
  }

  .update a{
    color: white;
  }

.delete a{
    color: white;
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

.dataTables_wrapper .dataTables_filter {
    float: center !important;
    text-align: center!important;
}



</style>


