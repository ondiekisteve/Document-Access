<!DOCTYPE html>
<html>
<head>
    <title>Document Management System</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" href="strengthify.min.css">
<!--    <link type="text/css" rel="stylesheet" href="jquery-ui.min.css">-->
    <link rel="stylesheet" href="css/fontawesome.min.css" type="text/css">
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">-->
<!--    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />-->
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('img/beach33.jpg');background-size: cover;">
<div class="container" style="margin-top: 10px;">
    <div class="well well-sm" style="background-color: #87c232;color: white;padding: 0px;">
        <div class="navbar" style="padding: 0px;margin: 0px;">
            <h4 style="text-align: center;margin: 0px;" class="navbar-brand"><a href="index.php">Online Document Management System</a> </h4>
            <ul CLASS="nav navbar-nav pull-right">
                <li><a href="index.php">HOME</a> </li>
                <li><a href="aboutus.php">ABOUT US</a> </li>
                <li><a href="contactus.php">CONTACT US</a> </li>
                <?php

                if(isset($_SESSION['userId']))
                {
                    echo "<li><a href='logout.php'>LOGOUT</a> </li>";

                }
                else{
                    echo "<li><a href='login.php'>LOGIN</a> </li>";
                }
                ?>
            </ul>
        </div><!--End of navbar-->
    </div><!--End of well-->


