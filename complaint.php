<?php

//INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES ('1', 'hello', 'abcdefg hijklmn opqrstu vwxyz', current_timestamp());
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "complaint";

$conn = mysqli_connect($servername, $username, $password, $database);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $vid = $_POST["vid"];
  $cname = $_POST["cname"];
  $cid = $_POST["cid"];
  $complaint = $_POST["complaint"];
  $ins = $_POST["ins"];
  
  



  //$sql = "INSERT INTO `notes1` (`title`, `description`) VALUES ('$title', '$description')";
  $sql=  " INSERT INTO `notes1` ( `vid`, `cname`, `cid`, `complaint`, `ins`) VALUES ('$vid', '$cname', '$cid', '$complaint', '$ins')";
  $result = mysqli_query($conn, $sql);

 if($result){
     //echo "inserted !!!";
     $insert = true;
 }

 else{
  echo "error ----> " .mysqli_error($conn);
 }

  


  
}

?>




















<!DOCTYPE html>
<html lang="en">

<head>
    <title>Complaint-form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="complaint.css">
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <!-- NAV-BAR -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid ">
            <img src="logo.png" width="140" height="65" alt="">
            <button id="nt" class="navbar-toggler" data-toggle="collapse" data-target="#weeh"
                aria-label="Toggle navigation">
                <span style="background-image: url('D:\HACKATHON2\home\toggler2')" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="weeh">

                <div class="container justify-content-center">
                    <div id="xyz" class="navbar-nav justify-content-between">
                        <a class="nav-link" id="xyz" href="index.html">Home<span class="sr-only">(current)</span></a>
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle" type="button" id="xyz" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Legal Resources
                            </button>
                            <div class="dropdown-menu" aria-labelledby="xyz" id="xyz">
                                <a href="page (1).html"> <button class="dropdown-item" type="button">Laws and
                                        Awareness</button></a>
                                <a href="legal-advice.html"> <button class="dropdown-item" type="button">Advocate
                                        Consultancy</button></a>
                                <a href="lawyer.html"> <button class="dropdown-item" type="button">Advocate
                                        Sign-up</button></a>
                            </div>

                        </div>
                        <a id="xyz" class="nav-link" href="Blogg.html">Blog</a>
                        <a id="xyz" class="nav-link" href="dom.html">Domestic Violence</a>
                        <a id="xyz" class="nav-link" href="#">About Us</a>
                    </div>
                </div>
                <div class="button ml-auto">
                    <a href="loginsub.html" id="abc" class="btn">Institute Log in</a>
                    <!-- <button type="button" id="def" class="btn btn-secondary">Register</button> -->
                </div>
            </div>
    </nav>
    <br>
    <br>
                               
    <br>


    <?php
                                    if($insert){
                                           echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                              <strong>Success!</strong> Your record has been inserted successfully.
                                               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                                  </button>
                                                   </div>";
                                                }
                                 ?>
    <!-- COMPLAINT-FORM -->
    <div class="bg-contact1" style="background-image: url('images/bg-01.jpg');">
        <div class="container-contact1">
            <div class="wrap-contact1">
                <div class="contact1-pic js-tilt" data-tilt>
                    <img src="img-01.png" alt="IMG">
                </div>
                <form class="contact1-form validate-form" action="/CRUD/complaint.php" method="post">
                    <span class="contact1-form-title">
                        COMPLAINT HERE
                    </span>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="vid" placeholder="Victim's Employee ID">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="Name is required">
                        <input class="input1" type="text" name="cname" placeholder="Culprit Name">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="cid" placeholder="Culprit's Employee ID (OPTIONAL)">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    

                    <div class="wrap-input1 validate-input" data-validate="Required!">
                        <textarea class="input1" name="complaint" placeholder="Complaint"></textarea>
                        <span class="focus-input1"></span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="ins" placeholder="Institute Name">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div>
                        <label>
                            <input type="checkbox" name="Agreed"> I am sure about the Complaint
                        </label>
                    </div>

                    <div class="container-contact1-form-btn">
                        <button class="contact1-form-btn">
                            Send
                        </button>
                    </div>

                  
                  
                    <button type="button" onclick="generate()" id="help14" name="action" > Generate id</button>
                    <div class="box">
                        your id is: <span id="otp" > </span>
                        


                    </div>
                    <script>
                        function generate() {
                            var num = '1234567890abcdexyz';
                            let OTP = 'ABYD23';

                            for (let i = 0; i < 4; i++) {

                                OTP += num[Math.floor(Math.random() * 10)];

                            }

                            document.getElementById('otp').innerHTML = OTP;
                        }
                    </script>


                </form>
            </div>

        </div>
        <!-- <div class="box">
            your id is: <span id="otp"> </span>

        </div>

        <button type="button" onclick="generate()"> generate id</button>

        <script>
            function generate() {
                var num = '1234567890';
                let OTP = '';

                for (let i = 0; i < 4; i++) {

                    OTP += num[Math.floor(Math.random() * 10)];

                }

                document.getElementById('otp').innerHTML = OTP;
            }
        </script> -->
    </div>

    <script src="tilt.jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>

</html>