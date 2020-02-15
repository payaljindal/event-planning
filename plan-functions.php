<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="java-script/jquery-1.8.2.min.js"></script>
    <script src="java-script/bootstrap.js" type="text/javascript"></script>
    <script src="java-script/angular.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="style/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .left {
            width: 200px;
            height: 1000px;
            float: left;
            border-right: 2px black solid;
            padding: 10px;
             background-color: gainsboro;
        }

        .show {
            display: block;
        }

        .hide {
            display: none;
        }

        body {
            overflow-x: hidden;
                       

             background-image: url(pics/lightwall1.jpg);
            background-size: cover;
            
        }
        .back
        {
            position: absolute;
            margin-top: 1000px;
        }
        .right
        {
        }

    </style>
    <script>
        $(document).ready(function() {


            //load services
            $("#functions").change(function() {

                $("#divservices").removeClass("hide").addClass("show");

                var functions;
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
                value = "";

            });

            //chane services show state
            $("#services").change(function() {
                $("#divstate").removeClass("hide").addClass("show");


            });

            //=-=-=-=states

            loadstate();

            function loadstate() {
                $.getJSON("json-plan-function-states.php", function(aryjson) {
                    //  alert(JSON.stringify(aryjson));
                    for (i = 0; i < aryjson.length; i++) {
                        var item = document.createElement("option");
                        item.text = aryjson[i].state;
                        item.value = aryjson[i].state;
                        document.getElementById("state").append(item);
                    }
                });
            }

            //cities
            $("#state").change(function() {

                $("#divcity").removeClass("hide").addClass("show");

                var state = $("#state").val();
                // alert(state);
                $.getJSON("json-plan-function-cities.php?state=" + state, function(aryjson) {
                    //alert(JSON.stringify(aryjson));
                    document.getElementById("cities").length = 1;
                    for (i = 0; i < aryjson.length; i++) {
                        var item = document.createElement("option");
                        item.text = aryjson[i].city;
                        item.value = aryjson[i].city;
                        document.getElementById("cities").append(item);
                    }
                });

            });


            //sms sending
            $("#sms").click(function() {
                
                   var number = $("#txtsms").val();
               // alert(number);
               var clientnum= prompt("Please enter the number which you want to send to the selected contributor!");
                $.get("sms-plan-function.php?number="+ number +"&clientnum="+ clientnum,function(response){
                    alert(response.trim());
                });
            });
        });

    </script>
    
<!--    angular vala script-->
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {



            //card
            $scope.card = function() {

                $scope.jsonAry;
                $http.get("json-fetchdata-contri.php").then(fine, notfine);

                function fine(response) {
                    $scope.jsonAry = response.data;
                    //console.log(JSON.stringify(response)); 

                }

                function notfine(response) {
                    alert(JSON.stringify(response));
                }
            }


            //onclick details
            $scope.oneRecord;
            $scope.doShowOne = function(uid) {
                $http.get("json-fetch-contri-plan-.php?uid=" + uid).then(fine, notfine);

                function fine(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.oneRecord = response.data;
                    //alert($scope.oneRecord[0].uid);
                    $("#modal-details").modal("show");


                }

                function notfine(response) {
                    alert(JSON.stringify(response));
                }
            }

            //search button
            $scope.search = function() {

                //all contributors class hide
                $("#all").removeClass("show").addClass("hide");
                $("#searched").removeClass("hide").addClass("show");

                $scope.jsonAry;
                var functions = $("#functions").val();
                var selservices = $("#services").val();
                var state = $("#state").val();
                var cities = $("#cities").val();
                //alert(services);
                $http.get("angular-search-plan-function.php?functions=" + functions + "&selservices=" + selservices + "&state=" + state + "&cities=" + cities).then(fine, notfine);

                function fine(response) {
                    // alert(JSON.stringify(response));
                    $scope.jsonAry = response.data;
                }

                function notfine(response) {
                    alert(JSON.stringify(response));
                }

            }


        });

    </script>


</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="card();">

    <div class="left">

        <br><br>

        <font class="text-center" size="5" color="red">&nbsp;Search here:</font>
        <br><br>

        Functions:<select name="functions" id="functions" class="form-control">
            <option value=""></option>
            <option value="wedding">Wedding</option>
            <option value="birthday">Birthday Party</option>
            <option value="kitty">Kitty Party</option>
            <option value="concert">Concerts</option>
        </select>

        <br>

        <div class="hide" id="divservices">
            Services:
            <select name="services" id="services" class="form-control">
                <option value=""></option>
            </select>
        </div>

        <br>
        <div class="hide" id="divstate">
            Possible States:
            <select name="state" id="state" class="form-control">
                <option value=""></option>
            </select>
        </div>

        <br>
        <div class="hide" id="divcity">
            Possible Cities:
            <select name="cities" id="cities" class="form-control">
                <option value=""></option>
            </select>
        </div>

        <br>
        <center>
            <div class="btn btn-danger" ng-click="search();">Search</div>
        </center>
        
        
   
   
    </div>
    <a href="client-dashboard.php" class="btn btn-primary" id="back" style="position:fixed;margin-top:600px;margin-left:-190px;">Back to dashboard</a>


    <!--    //right div-->
    
    
    
    <!--    card-->
    <div class="right" style="margin-left:200px;">
       <br>
    <div class="show" id="all" name="all">
        <center>
            <font size="6" class="text-center"> <u>&nbsp; All Contributors &nbsp;</u></font>
        </center>
    </div>
    <div class="hide" id="searched" name="searched">
        <center>
            <font size="6" class="text-center"> <u>&nbsp; Searched Contributors &nbsp;</u></font>
        </center>
    </div>
       
        <div class="row mt-3 mt-6">
            <div class="col-md-3" ng-repeat="oneObj in jsonAry">
                <div class="card border" style="margin-top:40px;margin-left:20px;">
                    <img src="cont-images/{{oneObj.picname1}}" class="card-img-top" alt="..." height="200" width="100">
                    <div class="card-body">
                        <h5 class="card-title">{{oneObj.uid}}</h5>
                        <p class="card-text"><span class="text-danger ">
                                <font size="4">Name:</font>
                            </span>{{oneObj.name}}</p>
                        <p class="card-text"><span class="text-danger">
                                <font size="4"> City:</font>
                            </span>{{oneObj.city}}</p>
                        <div ng-click="doShowOne(oneObj.uid);" class="btn btn-primary" style="float:right">Details</div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!--==-=-=-=-=-=-=-=-=-=-=-=-=MODAL DETAILS -==-=-=-=-=-=--->
    <div class="modal" id="modal-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="cont-images/{{oneRecord[0].picname2}}" class="card-img-top" alt="...">
                    <span class="text-danger ">
                        <font size="4">User-id</font>
                    </span>:{{oneRecord[0].uid}} <br>
                    <span class="text-danger ">
                        <font size="4">Name:</font>
                    </span>{{oneRecord[0].name}} <br>
                    <span class="text-danger ">
                        <font size="4">Mobile:</font>
                    </span>{{oneRecord[0].mobile}} <br>
                    <span class="text-danger ">
                        <font size="4">Office-Mobile:</font>
                    </span>{{oneRecord[0].officemob}}<br>
                    <input type="hidden" value="{{oneRecord[0].officemob}}" id="txtsms">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="sms">Send sms</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
