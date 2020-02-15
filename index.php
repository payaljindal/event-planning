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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    
    .dev{
			background-color: beige
			cursor: pointer;
			box-shadow: 0px 0px 5px 6px ; 	
			transition: ease all 1s;
		}
		.dev:hover
      {
			box-shadow: 0px 0px 0px gray;
			/*transform: rotate(360deg);*/
			transform: scale(1.2);
			transition: ease all 1s;
			opacity: .5;
		}
    
    </style>
   <style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: black;
  color: white;
}
       
    .fa-instagram {
  background: black;
  color: white;
        margin-left: -10px;
}
       .parallax {
  /* The image used */
/*  background-image: url(pics/concert.jpg);*/
background-color:black;
  /* Set a specific height */
  min-height: 500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
           
           overflow-x: hidden;
}
     
    </style>
 

    <script>
        $(document).ready(function() {

            // signup button click
            $("#sign").click(function() {

                var uid = $("#uid").val();
                var pwd = $("#pwd").val();
                var mobile = $("#mobile").val();
                var type = $("#type").val();
                //alert(type);
                if (uid == "" || pwd == "" || type == "")
                    alert("Fill all data");
                else {
                    $.get("ajax-signup.php?uid=" + uid + "&pwd=" + pwd + "&mobile=" + mobile + "&type=" + type, function(response) {

                        alert(response.trim());
                        $("#uid").val("");
                        $("#pwd").val("");
                        $("#type").val("");
                        $("#mobile").val("");
                    });
                }
            });
            
//            signup close button
            $("#close").click(function(){
                $("#uid").val("");
                $("#pwd").val("");
                $("#signup").hide();
            });
            
//            signup cross button
                $("#cross").click(function(){
                $("#uid").val("");
                $("#pwd").val("");
               
            });

            //login button click+
            $("#log").click(function() {

                var uid = $("#uidl").val();
                var pwd = $("#pwdl").val();

                if (uid == "" || pwd == "")
                    alert("Fill all data");
                else {

                    $.get("ajax-login.php?uid=" + uid + "&pwd=" + pwd, function(response) {

                      //  alert("welcome " + response.trim());
                        if (response.trim() == "client")
                            location.href = "client-dashboard.php";
                        else
                            location.href = "contributor-dashboard.php";
                        /*if (response.includes("client")) {
                            alert("welcome client!");
                            $("#uidl").val("");
                            $("#pwdl").val("");
                        } else if (response.includes("contributor")) {
                            alert("welcome contributor!");
                            $("#uidl").val("");
                            $("#pwdl").val("");
                        } else if (response.includes("Pass"))
                            $("#result").html(response);*/

                    });
                }
                
                  $("#uidl").val("");
                        $("#pwdl").val("");

            });


            //admin clickk
            $("#adminlogin").click(function() {

                var uid = $("#uida").val();
                var pwd = $("#pwda").val();

                if (uid == "" || pwd == "")
                    alert("Fill all data");
                else {

                    $.get("ajax-admin.php?uid=" + uid + "&pwd=" + pwd, function(response) {

                        //alert(response.trim());
                        if (response.trim() == "correct")
                            location.href = "admin-page.php";
                        else
                            alert(response.trim());
                    });
                }

            });


            //blur signup uid
            $("#uid").blur(function() {
                var uid = $("#uid").val();

                $.get("ajax-signup-uid.php?uid=" + uid, function(response) {
                    if (response.trim() == "Id already exists - Try new")
                        $("#erruid").html("").css("color", "red");
                    else
                        $("#erruid").html(response).css("color", "black");
                });
            });


            //blur signup mobile
            $("#mobile").blur(function() {
                var mobile = $("#mobile").val();
                var reg = /^[0-9]{1}[0-9]{9}$/;
                if (reg.test(mobile) == true && mobile.length == 10) {
                    $("#errmob").html("").css("color", "black");
                } else
                    $("#errmob").html("Fill valid mobile number").css("color", "red");

            });


        });

    </script>
</head>

<body class="parallax">
    

    <!--    navbar-->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">Event Planning</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class=" nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#signup">Sign-Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#admin">Admin</a>
                </li>
            </ul>
        </div>
    </nav>
  
    <!--    navbar finish -->


    <!--    corousel-->
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="2000">
<!--
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pics/event4.jpeg" class="d-block w-100" alt="..." height="500">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="pics/event1.jpeg" class="d-block w-100" alt="..." height="500">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item">
                    <img src="pics/crousel.jpg" class="d-block w-100" alt="..." height="500">
                      <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
              <div class="carousel-item">
                    <img src="pics/crousel2.jpeg" class="d-block w-100" alt="..." height="500">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    </div>

    <div style="background-color:black;">
        <h3>
            <center>
                <font color="white"></font>
            </center>
        </h3>
    </div>

    <div style="background-color:black;height:40px;">
        <h3>
            <center>
                <font color="white"><u>Events which we organize</u></font>
            </center>
        </h3>
    </div>


    <!--   cards-->
    <center>
    <div class="row" style="background-image:url(pics/wall11.jpg);background-attachment:fixed; background-size:cover;">
        <div class="col-md-2">
            <div class="card" style="width: 18rem; margin-top:40px;margin-bottom:40px;">
                <img src="pics/bdayy.jpg" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                    <h5 class="card-title"><font face="verdana">Birthday Party</font></h5>
                    <p class="card-text">
                        Planning to have a birthday party but don't know how to do it right?
                        <br>
                        Contact us.
                    </p>
                   
                </div>
            </div>
        </div>
        
        <div class="col-md-2 offset-md-1">
            <div class="card" style="width: 18rem;margin-top:40px;margin-bottom:40px;">
                <img src="pics/wedding.jpg" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                    <h5 class="card-title"><font face="verdana">Wedding</font></h5>
                    <p class="card-text">Getting hitched?<br>Let us help you in planning your wedding in a very memorable way.</p>
                </div>
            </div>
        </div>

        <div class="col-md-2 offset-md-1">
            <div class="card" style="width: 18rem; margin-top:40px;margin-bottom:40px;">
                <img src="pics/kitty2.jpg" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                    <h5 class="card-title"><font face="verdana">Kitty Party</font></h5>
                    <p class="card-text">
                        Need some good food? <br> Need new ideas? <br>
                        We provide all!
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-2 offset-md-1">
            <div class="card" style="width: 18rem;margin-top:40px;margin-bottom:40px;">
                <img src="pics/concert.jpg" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                    <h5 class="card-title"><font face="verdana">Concerts</font></h5>
                    <p class="card-text">
                        Worried about music system?<br>
                        Need decorated stage?<br>
                        We are here to help!
                    </p>
                </div>
            </div>
        </div>





        </div></center>


    <div style="background-color:black;">
        <h3>
            <center>
                <font color="white"></font>
            </center>
        </h3>
    </div>

    <div style="background-color:black;height:40px;">
        <h3>
            <center>
                <font color="white"><u>Meet developers</u></font>
            </center>
        </h3>
    </div>
<center>
    <div class="row" style="background-image:url(pics/wallpaper5.jpg);background-size:cover;background-attachment:fixed; background-position:center;">
        <div class="col-md-5" style="margin-left:100px;">
           <h6>&nbsp;</h6>
            <div class="card mb-3" style="max-width: 540px;margin-top:20px;margin-bottom:40px;">
                <div class="row no-gutters">
                    <div class="col-md-6" class="dev">
                        <img src="pics/me.jpg" class="card-img" alt="..." width="120" height="300" style="cursor: pointer;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align:left;">Payal</h5>
                            <p class="card-text" style="text-align:left;justify-contents:end;" >2nd year student pursuing Computer Engineering at Thapar University.
                            <br> Web Developer.
                            <br>Loves coding in C , C++.
                            <br>    
                            <b>Email : </b> ppayaljjindal@gmail.com 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5"  style="margin-left:100px;">
            <h5 style="margin-top:10px;" > <font face = "Comic sans MS"> Under the guidance of </font> </h5>
            <div class="card mb-3" style="max-width: 540px;margin-bottom:40px;">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="pics/sir.jpg" class="card-img" alt="..." height="300" width="90"  style="cursor: pointer;">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align:left;">Rajesh Bansal</h5>
                            <p class="card-text align-content-start" style="text-align:left;justify-content:end;">SCJP-Sun Certified Java Programmer.17 Years experience in Training & Development..Founder of realJavaOnline.com, loves coding in Java, C++,PHP, Python, AngularJS, Android.
                            
                            <br>
                                <b>Email : </b> bcebti@gmail.com </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        </center>

    <div style="background-color:black;">
      <font color="white">   <h3>
            <center>
                <u> Contact us</u>
            </center>
        </h3>
        <div class="container">
        <div class="row">
           &nbsp;&nbsp;&nbsp; <a href="https://www.facebook.com/Event-Planner-1350472198443574/?modal=admin_todo_tour" class="fa fa-facebook"></a>
            <a href="http://www.instagram.com/eventplanninggg" class="fa fa-instagram"></a>
<!--            <a href="https://mail.google.com/mail/u/0/#inbox"><img src="pics/gmail3.png" alt=""></a>-->
            </div>
        <div class="row" style="margin-top:-30px;">
            &nbsp;&nbsp;&nbsp;<i class="fa fa-phone">:7589473568</i> 
        </div>
         <div>
             <a class="fa fa-map-marker" style="color:inherit;margin-top:-90px;" href=" https://goo.gl/maps/k8nRKdgsXc3xJxXV7">&nbsp;Thapar&nbsp;University,&nbsp;Patiala</a> 
         </div>
         <div style="margin-top:-30px;">
             <a href="mailto:eventplanninggg@gmail.com" class="fa fa-envelope text-white">:eventplanninggg@gmail.com</a>
         </div>
          </div>
          
          <hr color="white">

        <h4><center>Thanks for visiting!&#x263A;</center></h4> 
        </font>      
    </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <h5 class="text-white">copyright &#169 2019 Payal India, All Rights reserved</h5> 

        </nav>
    

    <!--    signup modal-->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cross">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-row">
                            <div class="col-md-10  offset-md-1">
                                <label>User-id <small id="erruid">&nbsp;</small></label>
                                <input type="text" class="form-control" id="uid" name="uid" required placeholder="user-id">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-10 offset-md-1">
                                <label>Password</label>
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="password">
                            </div>
                        </div>
                        <div class="form-row mt-3 ">
                            <div class="col-md-10 offset-md-1">
                                <label>Mobile <small id="errmob">&nbsp;</small></label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-10 offset-md-1">
                                Signing up as:
                                <select name="type" id="type">
                                    <option value=""></option>
                                    <option value="client">client</option>
                                    <option value="contributor">contributor</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="sign" name="sign">Signup</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"  id="close" name="close">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--   signup finish-->

    <!--    login modal-->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-row">
                            <div class="col-md-10 offset-md-1">
                                <label>User-id</label>
                                <input type="text" class="form-control" id="uidl" name="uidl" placeholder="user-id">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-10 offset-md-1">
                                <label>Password</label>
                                <input type="password" class="form-control" id="pwdl" name="pwdl" placeholder="password">
                            </div>
                        </div>
                    </form>
                    <span id="result">&nbsp;</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="log" name="log">Login</button>
                    <span id="result">&nbsp;</span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>

    <!--    admin login-->
    <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-row">
                            <div class="col-md-10 offset-md-1">
                                <label>Userid</label>
                                <input type="text" class="form-control" id="uida" name="uida">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-md-10 offset-md-1">
                                <label>Password</label>
                                <input type="password" class="form-control" id="pwda" name="pwda">
                            </div>
                        </div>
                    </form>
                    <span id="result">&nbsp;</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="adminlogin" name="adminlogin">Login</button>
                    <span id="result">&nbsp;</span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
   

</body>

</html>
