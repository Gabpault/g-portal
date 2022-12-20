<?php

// include("./scripts/connection.php");
include("connection.php");
  if (isset($_POST["address"])) {
  
$first_name = mysqli_real_escape_String($connect,$_POST['first_name']);
$other_names = mysqli_real_escape_String($connect,$_POST['other_names']);
$email = mysqli_real_escape_String($connect,$_POST['email']);
$state = mysqli_real_escape_String($connect,$_POST['state']);
$phone = mysqli_real_escape_String($connect,$_POST['phone']);
$country = mysqli_real_escape_String($connect,$_POST['country']);
$lga = mysqli_real_escape_String($connect,$_POST['lga']);
// 
$address = mysqli_real_Escape_String($connect,$_POST['address']);
$dob = mysqli_real_Escape_String($connect,$_POST['dob']);
$sex = mysqli_real_Escape_String($connect,$_POST['sex']);
$qualification = mysqli_real_escape_String($connect,$_POST['qualification']);
$graduation_year = mysqli_real_escape_String($connect,$_POST['year']);
$institution = mysqli_real_escape_String($connect,$_POST['institution']);
$password = mysqli_real_escape_String($connect,$_POST['password']);


// // passport upload
$passport_name = $_FILES["passport"]["name"];
$passport_rename = substr($first_name,0,3)."_pass_".date('Y')."_".date('m')."_".date('d').".jpg";
$upload_passport = move_uploaded_file($_FILES["passport"]["tmp_name"],"uploads/".$passport_name);
$rename_passport = rename("uploads/".$passport_name,"uploads/".$passport_rename);

// // end passport upload 

// // highest certificate upload
$certificate_name = $_FILES["certificate"]["name"];
$certificate_rename = substr($first_name,0,3)."_cert_".date('Y')."_".date('m')."_".date('d').".jpg";
$upload_certificate = move_uploaded_file($_FILES["certificate"]["tmp_name"],"uploads/".$certificate_name);
$rename_certificate = rename("uploads/".$certificate_name,"uploads/".$certificate_rename);

// // end highest certificate upload

// // ssce certificate upload
$ssce_name = $_FILES["ssce"]["name"];
$ssce_rename = substr($first_name,0,3)."_ssce_".date('Y')."_".date('m')."_".date('d').".jpg";
$upload_ssce = move_uploaded_file($_FILES["ssce"]["tmp_name"],"uploads/".$ssce_name);
$rename_ssce = rename("uploads/".$ssce_name,"uploads/".$ssce_rename);

// // end ssce certificate upload

// // ssce certificate upload
$lga_name = $_FILES["lga"]["name"];
$lga_rename = substr($first_name,0,3)."_lga_".date('Y')."_".date('m')."_".date('d').".jpg";
$upload_lga = move_uploaded_file($_FILES["lga"]["tmp_name"],"uploads/".$lga_name);
$rename_lga = rename("uploads/".$lga_name,"uploads/".$lga_rename);

// // end ssce certificate upload


$insert_query = mysqli_query($connect,"INSERT INTO registration(first_name,other_names,email,state,lga,phone,dob,sex,address,country,qualification,graduation_year,institution,password,passport,highest_certificate,ssce,lga_cert) VALUES('$first_name','$other_names','$email','$state','$lga','$phone','$dob','$sex','$address','$country','$qualification','$graduation_year','$institution','$password','$passport_rename','$certificate_rename','$ssce_rename','$lga_rename')");

mysqli_query($connect, "INSERT INTO staff (staff_id) VALUES ('$email')");

if ($insert_query) {
  echo "<script> alert('record created') </script>";
//echo "<script> alert('$first_name $other_names $email $state $phone $sex $dob $address $lga $country $qualification $graduation_year $institution') </script>";
  session_start();
  $_SESSION['password'] = $password;
  $_SESSION["email"] = $email;
   $_SESSION["passport"] = $passport_rename;

  header("location:printout.php");

}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>e-portal - registration page</title>

   <!-- Favicons -->
<!--   <link href="img/favicon.png" rel="icon"> -->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  
<div class="container">
  <form method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-lg-1"></div>
  <div class="col-lg-10" style="margin-top: 50px; margin-bottom: 20px; background: white;">
    

<div id="sectiona" style="display: block;">
   <h3 style="margin-left:15px">Signing up is easy. It only takes a few steps<br /><br />
    <small>SECTION A - Personal info</small></h3>
    <div id="msg" style="margin-left:15px;margin-right:15px"></div>
<div class="col-lg-6">
  
  <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="EnterFirst Name"><br />
<label for="email">Email Adreess</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email Adreess"><br />
    <label for="phone">Phone </label>
    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone "><br />

        <label for="lga">Select Local Government Area</label>
    <select class="form-control" id="lga" name="lga">
       <option value=""> </option>
      <option value="Akoko Edo"> Akoko Edo</option>
      <option value="Esan"> Esan</option>
      <option value="Owan"> Owan</option>
      <option value="Esako"> Esako</option>
    </select>
    <br />
<label for="dob">Date Of Birth</label>
    <input type="date" name="dob" id="dob" class="form-control" placeholder="Email Adreess"><br /><br />

</div>
<div class="col-lg-6">
  <label for="other_name">Other Names</label>
    <input type="text" name="other_names" id="other_names" class="form-control" placeholder="Enter Other Names"><br />
    <label for="country">Nationality</label>
    <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country" value="Nigeria"><br />
    <label for="state">Sex</label>
    <select class="form-control" id="sex" name="sex">
      <option value="Male"> Male</option>
      <option value="Female"> Female</option>
     
    </select>
    <br />
        <label for="state">Select State</label>
    <select class="form-control" id="state" name="state">
      <option value=""> </option>
      <option value="Abia"> Abia</option>
      <option value="Adamawa"> Adamawa</option>
      <option value="Annabra"> Annabra</option>
      <option value="Edo"> Edo</option>
    </select><br />
    <label for="address">Permanent Home Address</label>
    <textarea id="address" class="form-control" name="address"></textarea><br />
</div>
<div><button type="button" id="next" class="btn btn-primary" style="margin-left: 15px;">Next Section</button></div>
<br />
</div>



<div id="sectionb" style="display: none;">
   <h3 style="margin-left:15px">
    <small>SECTION B - Educational info</small></h3>
    <div id="msg2" style="margin-left:15px;margin-right:15px"></div>
<div class="col-lg-6">
  
  <label for="qualification">Qualification</label>
    <input type="text" name="qualification" id="qualification" class="form-control" placeholder="Enter Highest Qualification"><br />
<label for="year">Year of Graduation</label>
    <input type="number" name="year" id="year" class="form-control" placeholder="Enter Year of Graduation"><br />
    
</div>
<div class="col-lg-6">
<label for="institution">Institution Graduated From</label>
    <input type="text" name="institution" id="institution" class="form-control" placeholder="Enter Institution Graduated From"><br />
    <label for="country">Choose Password</label>
    <input type="password" name="password" id="password" class="form-control" >
    <br />
    <label for="country">Confirm Password</label>
    <input type="password" name="con_pass" id="con_pass" class="form-control" ><br />
   </div>
<div>


<div class="form-group last">
                  <label class="control-label col-md-3">Upload Passport*</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="passport" class="default" />
                        </span>
                        
                      </div>
                    </div>
                 <!--    <span class="label label-info">NOTE!</span>
                    <span>
                     Only files in picture format like .jpg,png.ico etc is allowed else your application may be declide.
                      </span> -->
                  </div>
                </div>


<div class="form-group last">
                  <label class="control-label col-md-3">Upload Highest Certificate*</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="certificate" class="default" />
                        </span>
                        
                      </div>
                    </div>
                  <!--   <span class="label label-info">NOTE!</span>
                    <span>
                     Only files in picture format like .jpg,png.ico etc is allowed else your application may be declide.
                      </span> -->
                  </div>
                </div>

<div class="form-group last">
                  <label class="control-label col-md-3">WAEC/NECCO/NABTED Certificate*</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="ssce" class="default" />
                        </span>
                        
                      </div>
                    </div>
                 <!--    <span class="label label-info">NOTE!</span>
                    <span>
                     Only files in picture format like .jpg,png.ico etc is allowed else your application may be declide.
                      </span> -->
                  </div>
                </div>
<div class="form-group last">
                  <label class="control-label col-md-3">Upload Local Gvt of Origine*</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="lga" class="default" />
                        </span>
                        
                      </div>
                    </div>
                    <span class="label label-info">NOTE!</span>
                    <span>
                     Only files in picture format like .jpg,png.ico etc is allowed else your application may be declide.
                      </span>
                  </div>
                </div>

  <button type="button" id="close_form" class="btn btn-primary" style="margin-left: 15px;">Submit Form</button>
<button type="submit" id="submit" class="btn btn-primary" style="margin-left: 15px;display: none;">Register </button>

</div>

<br />
</div>
<div style ="display: none;" id="btns"><br /><br />
  <P>You have come to the end of the registration, please peoceed to prview or submit.
<center ><button type="button" id="preview" class="btn btn-danger btn-lg" style="margin-left: 15px;">Preview</button>
<button type="submit" id="submit" class="btn btn-primary btn-lg" style="margin-left: 15px;">Submit Form</button>
</center>
</P>
</div>



    <div style="text-align: right; margin-right: 15px;">Already have account? <a href="login.html">login</a></div><br />
    <div align="right"><a href="./home">Back to Home</a></div><br /><br />
  </div>
  <div class="col-lg-1"></div>

</div>  







</div>


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>

  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/exam-bg.jpg", {
      speed: 500
    });
  </script>

  <script>

$("#next").click(function(){

  var first_name = $("#first_name").val();
    var other_names = $("#other_names").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var lga = $("#lga").val();
    var dob = $("#dob").val();

     var country = $("#country").val();
    var sex = $("#sex").val();
    var state = $("#state").val();
    var address = $("#address").val();


if(first_name =="" || other_names =="" || email=="" || state == "" || phone=="" || sex=="" || dob =="" || address == "" || lga == "" || country=="" ){
$("#msg").html("<div class='alert alert-danger'>Sorry inputs with <span style='color:red'>*</span> is required, please kindly fill them to continue</div>");

window.location.href="#msg";

}else{
$("#sectionb").show();
$("#next").hide();
$("#sectiona").hide();
window.location.href="#sectionb";
$("#msg").hide();
}
});

$("#close_form").click(function(){

    var qualification = $("#qualification").val();
    var graduation_year = $("#year").val();
    var password = $("#password").val();
    var con_pass = $("#con_pass").val();
    var institution = $("#institution").val();
     if (qualification == "" || graduation_year =="" || password =="" || con_pass =="" || institution=="") {
$("#msg2").html("<div class='alert alert-danger'>Sorry inputs with <span style='color:red'>*</span> is required, please kindly fill them to continue</div>");
window.location.href="#msg2";

     }else{

if (password != con_pass) {
  $("#msg2").html("<div class='alert alert-danger'>Password do not match, Password must match before you can continue </div>");
window.location.href="#sectionb";
}else{

  $("#sectiona").hide();
$("#sectionb").hide();
$("#next").hide();
$("#close_form").hide();
$("#btns").show();
$("#msg2").hide();
}
}

});

$("#preview").click(function(){

  $("#sectiona").show();
$("#sectionb").show();
$("#next").hide();
$("#close_form").hide();
$("#btns").hide();
$("#close_form").hide();
$("#submit").show();

});

  </script>
</body>

</html>
