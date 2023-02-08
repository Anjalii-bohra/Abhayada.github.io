<?php
$showAlert = false;
$insert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../utilities/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //details
    // organisation
    $Oname = $_POST["oname"];
    $Oemail = $_POST["oemail"];
    $Ocon = $_POST["ocontact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    // ceo 
    $CEOname = $_POST["ceoname"];
    $CEOmail = $_POST["ceomail"];
    $CEOcon = $_POST["ceocon"];
    // hr 
    $HRname = $_POST["hrname"];
    $HRmail = $_POST["hrmail"];
    $HRcon = $_POST["hrcon"];

    // Check whether this username exists
    $existSql = "SELECT * FROM `institute` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        // $exists = true;
        $showError = "Username Already Exists";
    } else {
        // $exists = false; 
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            //insert into institute table
            $sql = "INSERT INTO institute (`Oname`, `HRcon`, `Oemail`, `Ocon`, `address`, `city`, `state`, `zip`, `CEOname`, `CEOmail`, `CEOcon`, `HRname`, `HRmail`, `username`, `password`, `dt`) VALUES ('$Oname', '$HRcon', '$Oemail', '$Ocon', '$address', '$city', '$state', '$zip', '$CEOname', '$CEOmail', '$CEOcon', '$HRname', '$HRmail','$username', '$hash', current_timestamp());
            
            INSERT INTO `user` (`username`,`password`)
             VALUES ('$username', '$hash');";

            //insert into user table
            // $sql = "INSERT INTO user (`username`,`password`)
            //  VALUES ('$username', '$hash');";

            $conn->multi_query($sql);

            do {
                if ($result = $conn->store_result()) {
                    var_dump($result->fetch_all(MYSQLI_ASSOC));
                    $result->free();
                }
            } while ($conn->next_result());


            // $result = mysqli_multi_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                $insert = true;
            }
        } else {
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

</head>

<body>
    <?php require '..\utilities\navbar.php' ?>
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
           <strong>Success!</strong> Your record has been inserted successfully.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
               </button>
                </div>";
    }
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    <form action="institute.php" method="post">
        <h1>SIGN UP</h1>
        <section>
            <div class="form">
                <div>
                    <p> Already have an account? <a href="loginsub.php"> Sign In</a></p>
                    <!-- <span> </span> -->
                </div>
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
                    <textarea id="address" name="address" rows="8" cols="80" placeholder="Address"></textarea>
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
                    <input type="text" id="name2" name="ceoname" placeholder="Enter your name">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Email</b></span>
                    <input type="email" id="email2" name="ceomail" placeholder="Enter your email">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Contact</b></span>
                    <input type="number" id="number2" name="ceocon" placeholder="Enter your number">
                </div>
            </div>
            <br><br>
            <div class="form">
                <h2>HR</h2>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Full Name</b></span>
                    <input type="text" id="name3" name="hrname" placeholder="Enter your name">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Email</b></span>
                    <input type="email" name="hrmail" id="email" placeholder="Enter your email">
                    <br>
                    <!-- <div class="alert alert-success alert-dismissible fade show  mt-2" role="alert" id="alert">
                         <div>This Email will be your institute's Log-in id</div> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Contact</b></span>
                    <input type="number" id="number3" name="hrcon" placeholder="Enter your number">
                </div>

                <br>
            </div>
            <div class="form">
                <h2>credentials</h2>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Username</b></span>
                    <input type="text" class="pass" name="username" id="password" placeholder="Enter username"
                        minlength="8">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Password (Minimum 8 Characters)</b></span>
                    <input type="password" class="pass" name="password" id="password" placeholder="Create a password"
                        minlength="8">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Confirm Password (Minimum 8 Characters)</b></span>
                    <input type="password" id="pass1" placeholder="Re-enter password" name="cpassword">
                </div>
            </div>
            </div>
            </div>
            </div>
            <!-- sign up button-->
            <button id="submit-btn">Sign up</button>
            <!--sign in option-->

            </div>
        </section>
    </form>
    <script src="main.js">
    </script>
    <?php require '..\utilities\_footer.php' ?>
    <link rel="stylesheet" href="../in.css">
</body>

</html>