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
     body {
            overflow-x: hidden;
                       

             background-image: url(pics/body1.jpg);
            background-size: cover;
            
        }</style>
</head>

<body>
    <br><br><br><br>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-3 offset-md-2">
                    <!--card 1 profile-->
                    <div class="card" style="width: 18rem; padding:3px;">
                        <img src="pics/clientimage.jpg" class="card-img-top" alt="..." height="200" width="200">
                        <div class="card-body">
                            <h5 class="card-title">Client's Data</h5>
                            <a href="admin-client.php" class="btn btn-primary">Show all data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <!--card 1 profile-->
                    <div class="card" style="width: 18rem; padding:3px;">
                        <img src="pics/contributorimage.png" class="card-img-top" alt="..." height="200" width="400">
                        <div class="card-body">
                            <h5 class="card-title">Contributor's Data</h5>
                            <a href="admin-contributor.php" class="btn btn-primary">Show all data</a>
                        </div>
                    </div>
                </div>
                   
            </div>
        </div>

    </center>
</body>

</html>
