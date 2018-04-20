<?php
 session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="insertform.css"> 

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<style>
.navbar-inverse {
    background-color: #222;
    border-color: #080808;
    z-index: 5;
}
</style>

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
            <a href="http://localhost/priya/index.php">HOME</a>
          </li>
          <li>
            <a href="http://localhost/priya/insertform.php">REGISTRATION</a>
          </li>
          <li>
            <a href="#">CONTACT US</a>
          </li>
        </ul>
        <?php if(isset($_SESSION['email'])){ ?>
        <button class="logout" ><a href="logout.php">LOGOUT</a></button>
        <?php } ?>
      </div>
    </div>
  </nav>
  