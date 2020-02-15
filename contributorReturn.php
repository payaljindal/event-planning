    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="java-script/jquery-1.8.2.min.js"></script>
    <script src="java-script/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="style/bootstrap.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-image: url(pics/wallpaper3.jpg);
            background-size: cover;
        }

    </style>
</head>

<body>
  
    <br><br>
    <center>
        <h3 class="text-white">
            <?php
    echo $_GET["msg"];
    ?>
        </h3>
        <br>
        <h5 class="text-white">
            Clients will contact you soon. Stay tuned.
            <br>
            <h1 class="text-white">
                &#x263A;
            </h1>
        </h5>
    </center>
    <br><br><br><br><br>

    <a href="contributor-dashboard.php" class="btn btn-secondary" style="margin-left:20px;">GO BACK TO DASHBOARD</a>

</body>

</html>
