<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `institute` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `institute` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp() )";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="in.css">
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src= "https://www.gstatic.com/firebasejs/9.10.0/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-auth-compat.js"></script>
</head>

<body>
<?php //require 'partials/_navbar.php' ?> 
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    <form action="/codes/ab.login/institute.php" method="post">
        <h1>SIGN UP</h1>
        <section>
            <div class="form">
                <div>
                    <p> Already have an account? <a href="/codes/ab.login/loginsub.php"> Sign In</a></p>
                    <!-- <span> </span> -->
                </div>
                <!-- Email
                <div class="email">
                    <label for="email"> Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>

                password
                <div class="pass">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">

                </div> -->
                <h2>Organization</h2>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Name</b></span>
                    <input type="text" id="name" placeholder="Name" name="oname">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Email</b></span>
                    <input type="email" id="email3" placeholder="Email" name="oemail">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Contact</b></span>
                    <input type="number" id="number" placeholder="Number" name="ocontact">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Address</b></span>
                    <textarea id="address" name="address" rows="8" cols="80" placeholder="Address" name="oadd"></textarea>
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="input-group-addon details"><b>City</b></span>
                    <input id="city" type="text" class="form-control" name="city" placeholder="City">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="input-group-addon details"><b>State</b></span>
                    <input id="state" type="text" class="form-control" name="state" placeholder="State">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="input-group-addon details"><b>Zipcode</b></span>
                    <input id="zip" type="text" class="form-control" name="zip" placeholder="Zip Code">
                </div>
            </div>
            <br><br>
            <div class="form">
                <h2>CEO</h2>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Full Name</b></span>
                    <input type="text" id="name2" placeholder="Enter your name">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Email</b></span>
                    <input type="email" id="email2" placeholder="Enter your email">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Contact</b></span>
                    <input type="number" id="number2" placeholder="Enter your number">
                </div>
            </div>
            <br><br>
            <div class="form">
                <h2>HR</h2>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Full Name</b></span>
                    <input type="text" id="name3" placeholder="Enter your name">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Email</b></span>
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                    <br>
                    <div class="alert alert-success alert-dismissible fade show  mt-2" role="alert" id="alert">
                        <div>This Email will be your institute's Log-in id</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Contact</b></span>
                    <input type="number" id="number3" placeholder="Enter your number">
                </div>

                <br>
            </div>    
            <div class="form">
                <h2>credentials</h2>
                <br>    
                <div class="input-group card-box">
                    <span class="details"><b>Username</b></span>
                    <input type="text" class="pass" name="username" id="password" placeholder="Enter username" minlength="8">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Password (Minimum 8 Characters)</b></span>
                    <input type="password" class="pass" name="password" id="password" placeholder="Create a password" minlength="8">
                </div>
                <br>
                <div class="input-group card-box">
                <span class="details"><b>Confirm Password (Minimum 8 Characters)</b></span>
                    <input type="password" id="pass1" placeholder="Re-enter password" name="cpassword" >
                </div>
            </div>    
            </div>
            </div>
            </div>
            <!-- sign up button-->
            <button id="submit-btn" >Sign up</button>
            <!--sign in option-->

            </div>
        </section>
    </form>
     <script src="main.js">
        </script>

</body>

</html>