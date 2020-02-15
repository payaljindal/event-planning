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
        $("document").ready(function() {

            fetch();


            //automatic fetch
            function fetch() {
                var uid = $("#uid").val();
                $.getJSON("json-fetch-contri.php?uid=" + uid, function(aryJson) {

                    if (aryJson.length == 0) {
                        alert("Please fill data!");
                        $("#update").attr("disabled", "true");
                        $("#btnSave").attr("disabled", "false");
                        return;
                    }
                    $("#update").prop("disabled", false);
                    $("#btnsave").prop("disabled", true);


                    $("#name").val(aryJson[0].name);
                    $("#mobile").val(aryJson[0].mobile);
                    $("#firmname").val(aryJson[0].firmname);
                    $("#estd").val(aryJson[0].estd);
                    $("#firmaddress").val(aryJson[0].firmaddress);
                    $("#officemob").val(aryJson[0].officemob);
                    $("#state").val(aryJson[0].state);
                    $("#city").val(aryJson[0].city);

                    var pic1 = aryJson[0].picname1;
                    $("#prev1").prop("src", "cont-images/" + pic1);
                    $("#hdn1").val(pic1);


                    var pic2 = aryJson[0].picname2;
                    $("#prev2").prop("src", "cont-images/" + pic2);
                    $("#hdn2").val(pic2);


                    var pic3 = aryJson[0].picname3;
                    $("#prev3").prop("src", "cont-images/" + pic3);
                    $("#hdn3").val(pic3);
                });
            }




        });

    </script>

    <style>
        
          body {
            background-image: url(pics/wallpaper3.jpg);
            background-size: cover;
              overflow-x: hidden;
        }
       

    </style>
</head>

<body>

    <!--/*    row 1*/-->
    <div class="row">
        <div class="col-md-12 text-center">
            <center>
                <h4>
                    <font size="6" color="white"><u> &nbsp; Contributor's &nbsp; Profile &nbsp;</u></font>
                </h4>
            </center>
        </div>
    </div>
    <br>

    <!--    row 2-->

    <div class="row mr-6 ml-5 mt-2 ">
        <div class="col-md-8 offset-md-2 border" style="background-color:white;">
            <form action="contributor-profile-process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="hdn1" id="hdn1">
                <input type="hidden" name="hdn2" id="hdn2">
                <input type="hidden" name="hdn3" id="hdn3">
                <!--              form row 1-->
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="">
                            <font size="5">User-id</font>
                        </label>
                        <input type="text" class="form-control" id="uid" name="uid" readonly value="<?php echo $_SESSION['uid']; ?>">
                    </div>
                </div>

                <!--                form row 2 -->
                <div class="form-row mt-2">
                    <div class="col-md-6">
                        <label for="">
                            <font size="5">Name</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required pattern="^[A-Za-z -]+$">
                    </div>
                    <div class="col-md-6">
                        <label for="">
                            <font size="5">Mobile</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required pattern="^[6-9]{1}[0-9]{9}$">
                    </div>
                </div>
                <!--              form row 3-->
                <div class="form-row mt-2">
                    <div class="col-md-8">
                        <label for="">
                            <font size="5">Business/Firm name</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" id="firmname" name="firmname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">
                            <font size="5">Estd.</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" placeholder="year" id="estd" name="estd" required pattern="^[0-9]{1}[0-9]{3}$">
                    </div>
                </div>
                <!--              form row 4-->
                <div class="form-row mt-2">
                    <div class="col-md-12">
                        <label for="">
                            <font size="5">Firm address</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" id="firmaddress" name="firmaddress" required>
                    </div>
                </div>
                <!--              form row 5 -->
                <div class="form-row mt-2">
                    <div class="col-md-4">
                        <label for="">
                            <font size="5">Office no.</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" id="officemob" name="officemob" required pattern="^[0-9]{}">
                    </div>
                    <div class="col-md-4">
                        <label for="">
                            <font size="5">State &nbsp;</font><small>*</small>
                        </label>
                        <select name="state" id="state" class="form-control" required>
                            <option value=""></option>
                            <option value="punjab">Punjab</option>
                            <option value="hp">Himachal</option>
                            <option value="rajasthan">Rajasthan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">
                            <font size="5">City</font><small>*</small>
                        </label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <!-- form row 6-->
                <center>
                    <font size="5">Upload images:</font>
                </center>
                <div class="form-row">
                    <div class="col-md-4">
                        <img src="pics/gallery.png" alt="" id="prev1" name="prev1" width="200" height="200">
                        <input type="file" class="form-control" id="ppic1" name="ppic1" accept="image/*" style="border:0px;" onchange="showpreview(this,prev1);">

                    </div>
                    <div class="col-md-4">
                        <img src="pics/gallery.png" alt="" id="prev2" name="prev2" width="200" height="200">
                        <input type="file" class="form-control" id="ppic2" name="ppic2" accept="image/*" style="border:0px;" onchange="showpreview(this,prev2);">

                    </div>
                    <div class="col-md-4">
                        <img src="pics/gallery.png" alt="" id="prev3" name="prev3" width="200" height="200">
                        <input type="file" class="form-control" id="ppic3" name="ppic3" accept="image/*" style="border:0px;" onchange="showpreview(this,prev3);">

                    </div>
                    <br>
                </div>
                <!--               form row 7-->

                <div class="form-row mt-4">
                    <div class="col-md-12 offset-md-4">

                        <input type="submit" value="save" name="btn" id="btnsave" class="btn btn-danger">
                        <input type="submit" value="update" name="btn" id="update" class="btn btn-danger ml-2">
                        <br><br>
                    </div>
                </div>
           
            </form>

        </div>
    </div>
    

</body>

</html>
