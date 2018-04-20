<!DOCTYPE html>
<title>SIGNUP</title>
<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    header("Location: login.php");}
 ?>
<?php
include("connection.php")
?>
 <?php  
 if(isset($_POST['signup'])){
 $email=$_POST['email'];
 $password=$_POST['psw'];
 $sql = "INSERT INTO LOGIN_DETAIL (EMAIL_ID,PASSWORD) VALUES ('$email', '$password')";
//echo $sql;die();
 if(!mysqli_query($conn,$sql))
 {
     echo 'Not Inserted';
 }
 header("Location: login.php");
 }
 

 ?>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text] {
    width: 18%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=password]{
    width: 18%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
     
}

.signupbtn {
    background-color: #4caf9e;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
    text-align: center;
}

button:hover {
    opacity: 0.8;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.loginimage {
    width: 10%;
   
}

.email {
    padding: 10px;
    text-align: center;
}

.password {
    padding: 10px;
    text-align: center;
}

.remember{
    text-align: center;
}

span.psw {
    float: right;
    padding-top: 1px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
      
       float: none;
    }

}
</style>
</head>
<body>

<form action="" method="POST">
<div class="container"> 
  <div class="imgcontainer">
    <img src="create-account-icon.png" alt="Image Error" class="loginimage">
    <label for="Signin">CREATE ACCOUNT</label>
  </div>

  <div class="email">
    <label for="email"><b>Email Id</b></label>
    <input type="text" placeholder="Enter email" name="email" required>
</div>

<div class="password">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
     </div>

     <div class="remember">
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

     <div>   
    <input type="submit" name="signup" class="signupbtn" value="Create Account">
    </div>


  </div>
</form>

<?php 
include("footer.php")
 ?>

</body>
</html>

