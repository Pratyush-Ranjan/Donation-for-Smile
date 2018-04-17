<!DOCTYPE html>
<?php

?>
<html>
<head>
    <head> 
    <title>BOOK Store</title> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="index.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    transition: background-color .5s;
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="shop.php">Primary School books</a>
    <a href="shop2.php">Middle School books</a>
    <a href="shop3.php">Secondary School books</a>
</div>

<div id="main">
    
    <div class="container-fluid">
    <div class="jumbotron">
            <h1>Welcome to our Donate For Smile Store!</h1>
            <p>We have all types and classes of books free for goverment schools in one place.</p>
        </div>
    </div>
  <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Categories</span>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
     
</body>
</html> 
