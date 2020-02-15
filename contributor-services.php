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
    body {
            background-image: url(pics/wallpaper3.jpg);
            background-size: cover;
        overflow: hidden;
        
        }
    </style>
    <script>
        $(document).ready(function() {

            loadfunction();

            function loadfunction() {
                $.getJSON("json-fetch-functions-contributor.php", function(aryjson) {

                    for (i = 0; i < aryjson.length; i++) {
                        var item = document.createElement("option");
                        item.text = aryjson[i].functions;
                        item.value = aryjson[i].functions;
                        document.getElementById("functions").append(item);
                    }
                }); //json vala
            } //load finction

            //fetch services.........................
 var functions ;
            $("#functions").change(function() {

                functions = $("#functions").val();
                // alert(functions);
                $.getJSON("json-fetch-services-contributor.php?functions=" + functions, function(aryjson) {
                    //alert(JSON.stringify(aryjson));
                    // alert(aryjson[0].services);
                    var ary = aryjson[0].services.split(';');
                    //alert(ary);

                    document.getElementById("services").length = 1;

                    for (i = 0; i < ary.length; i++) {
                        var opt = document.createElement("option");
                        opt.text = ary[i];
                        opt.value = ary[i];
                        document.getElementById("services").append(opt);
                    }
                });
                value="";   
            }); 
            //fetch services end...................

            
            //data in selescted services....................
            var value="";   
            $("#services").change(function() {
                 
                var services1 = $("#services").val();
                if(value.includes(services1))
                    {}
                else{
                value= value +"," + services1;
                if(value.startsWith(","))
                    value=value.substr(1);
                $("#selservices").val(value);
                }
            });
            
            
            // saving the data..................
          $("#save").click(function(){
            var uid=$("#uid").val();
            var functions=$("#functions").val();
            var services=$("#services").val();
            var selservices=$("#selservices").val();
             // alert(uid);
            $.get("ajax-contri-services.php?uid="+uid+"&functions="+ functions+"&services=" + services + "&selservices="+selservices,function(response){
               // alert(response+"2");
                if(response.trim()=="function already added!")
                    alert(response.trim());
                else
                    {
                         alert("data saved.You can also add another data"); 
              $("#selservices").val("");
                $("#functions").val("");
                $("#services").val("");
                value="";

                    }
            });
           
          });
            
            
            
            // remove all services............................
            $("#removeservices").click(function(){
                $("#selservices").val("");
                $("#functions").val("");
                $("#services").val("");
                value="";   
            });
            
            



        }); // of ready function

    </script>

</head>

<body>
   <br>
    <div class="row">
        <div class="col">
            <center><u>
                    <font size="5" color="white"> &nbsp;Services &nbsp; </font>
                </u></center>
        </div>
    </div>

    <!--    row 2-->
    <div class="container">
        <div class="row mt-3 mr-4">
            <div class="col-md-8 offset-md-2 border" style="background-color:white;">
                <form action="" style="padding:20px;">
                    <!-- form row 1-->
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="">User-id</label>
                            <input type="text" class="form-control" id="uid" name="uid" readonly value="<?php echo $_SESSION['uid'] ?>">
                        </div>
                    </div>
                    <!-- form row 2-->
                    <div class="form-row mt-4">
                        <div class="col-md-6">
                            <label for=""> Functions</label>
                            <select name="functions" id="functions" class="form-control">
                                <option value="select"><font>Select</font></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for=""> Services</label>
                            <select name="services" id="services" class="form-control">
<!--                                <option value=""></option>-->
                            </select>
                        </div>
                    </div>

                    <!-- form row 3-->
                    <div class="form-row mt-4">
                        <div class="col-md-9">
                            <label for="">Selected services</label>
                            <input type="text" class="form-control" id="selservices" name="selservices">
                            <small class="text-muted">(of selected function)</small>
                        </div>
                        <div class="col-md-3">
                            <label for="">&nbsp;</label>
                            <input type="button" value="remove all services" id="removeservices" name="removeservices" class="btn btn-outline-primary form-control">
                        </div>
                    </div>
                    <!-- form row 4-->
                    <div class="form-row mt-4">
                        <div class="col-md-2 offset-md-5">
                            <input type="button" value="Save" class="btn btn-outline-primary" id="save" name="save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
<a href="contributor-dashboard.php" class="btn btn-secondary" style="margin-left:20px;">GO BACK TO DASHBOARD</a>


</body>

</html>
