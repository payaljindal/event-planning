<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="java-script/jquery-1.8.2.min.js"></script>
    <script src="java-script/angular.min.js"></script>
    <script src="java-script/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="style/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
     body {
            overflow-x: hidden;
                       

             background-image: url(pics/body1.jpg);
            background-size: cover;
            
        }</style>
    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {

            $scope.showAll = function() {
                $scope.jsonAry;
                $http.get("admin-contributor-fetch.php").then(fine, notfine);

                function fine(response) {
                    //alert("hii");
                    // alert(JSON.stringify(response));
                    // alert(JSON.stringify(response.data)); //== jsonAry
                    $scope.jsonAry = response.data;
                    //console.log(JSON.stringify(response)); 

                }

                function notfine(response) {
                    alert(JSON.stringify(response));
                }


            }
               //-=-=-=-=-=-=-delete
            $scope.doDelete = function(uid) {
				if (confirm("R u Sure?") == true) {
					$http.get("admin-contri-delete-process.php?uid=" + uid).then(fine, notfine);
					function fine(response) {
						//alert(JSON.stringify(response.data));
						$scope.showAll();
					}
					function notfine(response) {
                        alert("not fine");
						alert(JSON.stringify(response));
					}
				}
			}
            //-=---------=-=--------=======-
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="showAll();">
<font color="white">
   <center>
       
       <h3><u>&nbsp; All contributors's data &nbsp;</u></h3>
   </center>
   <br>
  
    <div class="container">
       Search:<input type="text" ng-model="google">
    
    <br><br>
        <table class="table table-stripped table-bordered">
            <tr>
                <th>User-id</th>
                <th>Name</th>
                <th>Firm Name</th>
                <th>City</th>
                <th>Pic1</th>
                <th>Pic2</th>
                <th>Pic3</th>
                <th>Remove</th>
            </tr>
            <tr ng-repeat="oneObj in jsonAry | filter:google" class="text-white">
                <td>{{oneObj.uid}}</td>
                <td>{{oneObj.name}}</td>
                <td>{{oneObj.firmname}}</td>
                <td>{{oneObj.city}}</td>
                <td>
                    <a href="cont-images/{{oneObj.picname1}}" target="_blank">
                        <center><img src="cont-images/{{oneObj.picname1}}" alt="" height="50" width="50">
                        </center>
                    </a>
                </td>
                <td>
                    <a href="cont-images/{{oneObj.picname2}}" target="_blank">
                        <center><img src="cont-images/{{oneObj.picname2}}" alt="" height="50" width="50">
                        </center>
                    </a>
                </td>
                <td>
                    <a href="cont-images/{{oneObj.picname3}}" target="_blank">
                        <center><img src="cont-images/{{oneObj.picname3}}" alt="" height="50" width="50">
                        </center>
                    </a>
                </td>
                 <td>
						<div class="btn btn-danger" ng-click="doDelete(oneObj.uid);">Delete</div>
				</td>
            </tr>
        </table>
    </div>
</font>

</body>

</html>
