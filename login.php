<title>LOGIN</title>
<?php 
include("header.php")
 ?>
<?php
include("connection.php")
?>
 <?php    
if(isset($_POST['login'])){
 $email=$_POST['email'];
 $password=$_POST['psw'];
 $sql = "SELECT * FROM LOGIN_DETAIL WHERE EMAIL_ID='$email' AND PASSWORD='$password'";

 $retval = mysqli_query($conn, $sql);

if(mysqli_num_rows($retval)>0){
    $_SESSION['email']=$email;
    header("Location: index.php");
}
 if(! $retval ) {
    die('Could not get data: ' . mysqli_error());
 }
}
 //
 ?>

<style>
body {font-family: Arial, Helvetica, sans-serif;}


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

.loginbtn {
    background-color: #4caf9e;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
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

.loginbtn {
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

<form action="" method="POST" >
<div class="container"> 
  <div class="imgcontainer">
    <img src="create-account-icon.png" alt="Image Error" class="loginimage">
    <label for="Signin">LOGIN</label>
  </div>

  <div class="email">
    <label for="email"><b>Email Id</b></label>
    <input type="text" placeholder="Enter email" name="email"  onblur="validateEmail(this);" >
   
</div>

<div class="password">
    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" name="psw" placeholder= "Enter Your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
         </div>


     <div class="remember">
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

     <div >  
     <input type="submit" name="login" class="loginbtn" value="Login"> 
    <!-- <button type="submit" >Login</button> -->
    </div>

</div>
</form>

<?php 
include("footer.php")
 ?>
</body>
</html>



<script>
//email validation
function validateEmail(emailField){
 
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (reg.test(emailField.value) == false) 
    {
        alert('Invalid Email Address');
        return false;
    }

    return true;

}


//password validation 
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
