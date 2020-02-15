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
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
       body
       {
           overflow-x: hidden;
            background-image: url(pics/wallpaper1.png);
            background-size: cover;
           font-family: "Open Sans";
       }
       canvas{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    border: 2px solid white;
}
    
</style>

    
    
    
    <script>
        function showpreview(file, ref) {
            if ($(file)[0].files[0].size > 2097152) {
                return;
            }
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(ref).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>
    <script>
        $(document).ready(function() {
            doFetch();


//fetch button
            function doFetch()
            {
                var uid = $("#uid").val();
                $.getJSON("json-fetchdata-client.php?uid="+uid,function(aryJson){
                  //alert(JSON.stringify(aryJson));
                    
                 
                    if(aryJson.length==0)
                        {
                            alert("Please fill data!");
                            $("#btnupdate").attr("disabled","true");
                            return;
                        }
                    $("#btnupdate").prop("disabled",false);
                    $("#btnsave").prop("disabled",true);
                    
                    
                    $("#mobile").val(aryJson[0].mobile);
                    $("#mobile").val(aryJson[0].mobile);
                    $("#name").val(aryJson[0].name);
                    $("#email").val(aryJson[0].email);
                    $("#dob").val(aryJson[0].dob);
                    $("#occupation").val(aryJson[0].occupation);
                    $("#address").val(aryJson[0].address);
                    $("#city").val(aryJson[0].city);
                    
                    
                    var pic=aryJson[0].pic;
                    $("#prev").prop("src","uploads/" + pic);
                    $("hdn").val(pic);
                    
                });
                

            }
            
        });

    </script>
<!--
<style>
    
    body
    {
        background-image: url(pics/sun.jpg);
        background-size: cover;
    }
    </style>
-->
    
 
</head>

<body>
<!--/*    row 1*/-->
    <div class="row">
        <div class="col-md-12 text-center">
            <center>
                <h4>
                    <font size="6"><u> &nbsp; Client's &nbsp; Profile &nbsp;</u></font>
                </h4>
            </center>
        </div>
    </div>
<div class="container">
    <!--row 2-->
    <div class="row mt-3 mr-4" >
        <div class="col-md-8 offset-md-2 border" style="background-color:white;">

            <form method="post" enctype="multipart/form-data" id="clientform" name="clientform" action="client-profile-process.php">
               <input type="hidden" name="hdn" id="hdn">
                <!-- form row 1-->
                <div class="form-row">
                    <div class="col-md-6">
                       <br>
                        <label for=""> &nbsp; User-id</label>
                        
                        <input type="text" class="form-control" name="uid" readonly id="uid"
                        
                        value="<?php echo $_SESSION['uid'];?>"  >
                        <br>
                        <label> &nbsp; Name <small>*</small> </label>
                        <input type="text" class="form-control" id="name" name="name" required pattern="^[A-Za-z -]+$">
                        
                    </div>
                    

                    <div class="col-md-4 offset-md-1">
                        <center><br>
                            <img src="pics/addim.png" id="prev" height="130px" width="130px">
                        <input type="file" accept="image/*" style="border:0px;" class="form-control" id="ppic" name="ppic" onchange="showpreview(this,prev);">
                        <small>&nbsp;</small>
                        </center>
                    </div>
                </div>

<!--form row 2-->
                <div class="form-row mt-3">
                    <div class="col-md-5">
                        <label for=""> &nbsp; Mobile <small>*</small></label><br>
                        <input type="text" class="form-control" id="mobile" name="mobile" required pattern="[6-9]{1}[0-9]{9}">
                      
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <label> &nbsp; Email <small>*</small> </label>
                        <input type="email" class="form-control" id="email" name="email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        
                    </div>
                </div>

 <!-- form row 3-->
                <div class="form-row mt-3">

                    <div class="col-md-5 ">
                        <label for="">&nbsp; Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="col-md-5 offset-md-1">
                        Occupation  <small>*</small><select name="occupation" id="occupation" class="form-control" required>
                            <option value=""></option>
                            <option value="job">Job</option>
                            <option value="business">Business</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <!--form row 4-->
                <div class="form-row mt-3">
                    <div class="col-md-7">
                        <label> &nbsp; Address </label>
                        <input type="text" class="form-control" id="address" name="address">
                        
                    </div>
                    <div class="col-md-4">
                        <label for=""> &nbsp; City <small>*</small></label><br>
                        <input type="text" class="form-control" id="city" name="city" required pattern="^[A-Za-z -]+$">
                       
                    </div>
                </div>

               <!-- form row 5-->
                <div class="form-row mt-4">
                    <div class="col-md-12 offset-md-4">
                        
                        <input type="submit" value="save" name="btn" id="btnsave" class="btn btn-danger">
                        <input type="submit" value="update" id="btnupdate" name="btn" class="btn btn-danger ml-2">
                        <br><br>
                    </div>
                </div>

            </form>

        </div>
    </div>
    </div>

</body>

</html>
