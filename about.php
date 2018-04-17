<!DOCTYPE html>
<?php
require 'common.php';
if (isset($_SESSION['name']))
    { header('location: shop.php'); }
?>
<html>
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
</head>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="container-fluid aboutdata">
        <h2><b>What Is The Issue</b></h2>
        <hr style="width: 20%">
        <hr style="width: 10%">
        <div class="col-sm-offset-4 col-sm-4">
            <img class="doodle" src="doodle.jpg" style="width: 100%; border-radius: 50%">
        </div>
    </div>
        <div class="container-fluid" style="text-align: center;
    background-color: rgba(0, 0, 0, 0.5);color: white;">
            <p><h3>At present, the basic need of every child (our coming future) is Education. The government is also supporting this by campaigns like " Padhega India tabhi toh badhega India" OR " Sab padho, Sab badho". To be a surviver in this world of cut-throat competition, being eduacted/literate is the main & most powerful weapon.</h3></p>
        <p><h3>Normally, a middle class, upper-middle class & rich class family can get their children admitted to good private schools having all facility but what about those who don't have enough money nad rely on government schools for their children education.</h3></p>
<p><h3>According to a survey  in the year 2016, there are 315 million school students and from which 113 million students study in government schools( which means 36% of our future is in dark).</h3></p>
        <p><h3>Government is providing many facilities like mid-day meal, school dress & no fees education but what about the main reason of going to school, which is studying. What about the books for government school students?</h3></p>
        <p><h3>Government have taken many initiative like providing E-books to government school student but if you think deeply then you will realise that those family which don't have enough money to feed their children even twice a day and are sending their children to government school so that they can get proper mid-day meal, how can they afford Smartphone's for E-book facility.</h3></p>
<p><h3>There are also some other initiatives like government & many NGO's (running for education of children) who raise fund to provide books to needy government school students. The fund raised by government to print/publish books and make it available to student have a huge flaw. According to survey in various government schools specially in capital Delhi, out of 100% of government schools, government can cover only 35-40% of the school plus according to the students firstly they get these books after half of their session is over ( means after 6 months) and second thing is that the print quality is also very poor.     
</h3></p>
    </div>
         <div class="container-fluid aboutdata">
        <h2><b>Who We Are</b></h2>
        <hr style="width: 20%">
        <hr style="width: 10%"> 
    </div>
    <div class="container-fluid" style="text-align: center;
    background-color: rgba(0, 0, 0, 0.5);color: white;">
        <p><h3>DonationforSmile.com is a platform of government school students, teachers, principal & book donators. On DonationforSmile.com anyone can donate their used books in bulk of class 1st to 12th and a needy government school authority can buy those books in bulk for their school students at free of cost ( just have to pay delivery charges ).     
        </h3><br>
    <h2><b>What We Do</b></h2>
        <hr style="width: 20%">
        <hr style="width: 10%"><br>
        </p>
    <p><h3>Many of us have lot of books on our shelves that go largely untouched from long period of time. We recruit that someday we’ll read them, and then we pack them up in boxes and pull them with us every time we move. Instead, why not reduce the load and do some social work to make someone smile by just sitting at home.</h3></p>

    <p><h3>So we are here to help you to send these books to those who really need them. We will take out these books from your shelves and send them directly to those who are unable to buy them and bring smiles to their faces.</h3></p>
    <p><h3>"We don't need a course based study material to make someone educated, we just need a handful book to make someone knowledgeable".<br>
Our goal is to provide quality knowledge to each needy government school students nearly free of cost. Make convenient for each student for reuse books, so it can help in saving trees and make Eco Environment.
</h3></p>    
<br><br>
</div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
