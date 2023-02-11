<?php
$showAlert = false;
$insert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'utilities/_dbconnect.php';
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
    <?php require 'utilities\navbar.php' ?>
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
    <form action="institute.php" method="post" class="main">
        <h1><strong>SIGN UP</strong></h1>
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
                    <input type="text" id="name" placeholder="Name" name="oname" required>
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

            <form name="add_name" id="add_name" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td><input type="text" name="skill[]" placeholder="Enter The Departments"
                                    class="form-control name_list" /></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>

                    <!-- <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                </div>
            </form>
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
                <h2>Credentials</h2>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Username</b></span>
                    <input type="text" class="pass" name="username" id="password" placeholder="Enter username" required
                        minlength="8">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Password (Minimum 8 Characters)</b></span>
                    <input type="password" id="pass" name="password" id="password" placeholder="Create a password"
                        required minlength="8">
                </div>
                <br>
                <div class="input-group card-box">
                    <span class="details"><b>Confirm Password (Minimum 8 Characters)</b></span>
                    <input type="password" id="pass" placeholder="Re-enter password" name="cpassword">
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
    <br>
    <br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <link href="in.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <section class="foot">
        <div>
            <?php require 'utilities\_footer.php' ?>
        </div>
    </section>
</body>

</html>