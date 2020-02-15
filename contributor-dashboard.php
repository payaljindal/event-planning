<?php
session_start();

if(!isset($_SESSION["uid"]))
{
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="java-script/jquery-1.8.2.min.js"></script>
    <script src="java-script/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="style/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    body
        {
            background-image: url(pics/wallpaper3.jpg);
            background-size: cover;
        }
    </style>
</head>

<body>
   <center>    
    <div>
       <font color="white" face="verdana">
        <center>
            <marquee behavior="slide" direction="" scrollamount="100"><h2> <u>  Welcome <?php echo $_SESSION["uid"]; ?> </u></h2></marquee>
        </center>
        </font>
    </div>
    
    
<!--
    <center>
        <h3>Contributor's dash board</h3>
    </center>
-->

    <br><br>
    <div class="row">
        <div class="col-md-3 offset-md-2">
            <!--card 1 profile-->
            <div class="card" style="width: 18rem; padding:3px; margin-top:10px;">
                <img src="pics/image.png" class="card-img-top" alt="..." height="200" width="200">
                <div class="card-body">
                    
                    <p class="card-text">Thanks for logging in.<br>Click on Profile button to enter further details.</p>
                    <a href="contributor-profile.php" class="btn btn-primary">Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <!--card 1 profile-->
            <div class="card" style="width: 18rem; padding:3px; margin-top:10px;">
                <img src="pics/contributor.jpg" class="card-img-top" alt="..." height="220" style="border-radius:50%">
                <div class="card-body">
                    
                    <p class="card-text">Enter services you can provide to our clients.</p>
                    <a href="contributor-services.php" class="btn btn-primary">Services</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <!--card 1 profile-->
            <div class="card" style="width: 18rem; padding:3px; margin-top:10px;">
                <img src="pics/logout.jpg" class="card-img-top" alt="..." height="270">
                <div class="card-body">
                    
                    <p class="card-text"></p>
                    <a href="logout.php" class="btn btn-primary">LOGOUT</a>
                </div>
            </div>
        </div>
    </div>
    </center>

</body>

</html>
