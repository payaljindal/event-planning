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
            background-image: url(pics/wallpaper1.png);
            background-size: cover;
        }

    </style>
</head>

<body>
    <br><br>
    <center>
        <h3>
            <?php
    echo $_GET["msg"];
    ?>
        </h3>
        <br>
        <h5>
          Hope you will find the required service provider.
            <br>
            <h1>
                &#x263A;
            </h1>
        </h5>
    </center>
    <br><br><br><br><br>


    <a href="client-dashboard.php" class="btn btn-secondary" style="margin-left:20px;">GO BACK TO DASHBOARD</a>
</body>

</html>
