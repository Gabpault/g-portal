<?php
session_start();
// error_reporting(0);
if(!($_SESSION["email"])){
    header("location:./login.html");
}else{
//$conn = mysqli_connect("localhost", "root", "", "auchi_poly_staff_accessment");
    include("./scripts/connection.php");
$staff_id = $_SESSION["email"];

$query = mysqli_query($conn, "select sectiona_score from staff where staff_id = '$staff_id' LIMIT 1");
if(mysqli_num_rows($query)>0){
	$fetch = mysqli_fetch_array($query);
	$result = $fetch["sectiona_score"];

	$query1  = mysqli_query($conn, "update staff set total_score = '$result' where staff_id = '$staff_id' "); 
	echo $percent = ($result/60)*100;

	$query2  = mysqli_query($conn, "update staff set promotion_percent = '$percent' where staff_id = '$staff_id' ");
$percent_update = $percent."%";

	$message = "Congratulations, Your test performance was successfully Submitted, We will get back to you through mail. Thanks for taking the test."; 
}else{
	$message = "something went wrong; please retake the last section";
}

 }


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<title>E-Portal | submitted</title>
    <link rel="icon" type="image/jpg" href="images/logo.jpeg">
    <!-- CSS only -->
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

	<div class="container " style="height: 500px; margin-top: 50px">
        <!-- <div class="col-lg- "> -->
      <center>  <div class="col-lg-6 ">
		<div class="alert alert-primary" style="height: 100px"><?php echo $message; ?></div>
		<a href="./scripts/status.php" class="input-large btn btn-success" style="width: 25%">Okay</a>
</div>
	</div>

</body>
</html>