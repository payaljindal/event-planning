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
            overflow-x: hidden;
            background-image: url(pics/wallpaper1.png)    ;
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- ************************** -->
    <div class="row">
        <div class="col-md-12">
           <font face = "Comic sans MS">
               <marquee behavior="slide"scrollamount="100" ><u><h2>&nbsp;Welcome: <?php echo $_SESSION["uid"];?> &nbsp;</h2></u></marquee></font>
        </div>
    </div>
    <!-- *********************************** -->

    
    <br><br>
    <center>
    <div class="row">
        <div class="col-md-3 offset-md-2">
            <!--card 1 profile-->
            <div class="card" style="width:250px; padding:3px; margin-top:10px;">
                    <img src="pics/image.png" class="card-img-top" alt="..." height="200">
                <div class="card-body">
<!--                    <h5 class="card-title">Client</h5>-->
                    <p class="card-text">Thanks for logging in.<br>Click on Profile button to enter further details.</p>
                    <a href="client-profile.php" class="btn btn-primary">Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <!--card 2 profile-->
            <div class="card" style="width: 250px; padding:3px; margin-top:10px;">
                <img src="pics/client.jpg" class="card-img-top" alt="..." height="200" width="200" style="border-radius:50%">
                <div class="card-body">
                    <p class="card-text">Click on Search button to search for required contributor.</p>
                    <a href="plan-functions.php" class="btn btn-primary">Search</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <!--card 3 profile-->
            <div class="card" style="width:250px; padding:3px; margin-top:10px;">
                <img src="pics/logout.jpg" class="card-img-top" alt="..." height="225">
                <div class="card-body">
                    
                    <p class="card-text">Click on Logout button to logout.</p>
                    <a href="logout.php" class="btn btn-primary">LOGOUT</a>
                </div>
            </div>
        </div>
    </div>

    </center>

</body>

</html>
