<?php
$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'utilities\_dbconnect.php';
    $pname = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $femail = $_POST["femail"];
    $webaddress = $_POST["webadd"];
    $list = $_POST["list"];
    $description = $_POST["description"];

    //sql query
    $sql = "INSERT INTO `lawyers` ( `full-name`, `email`, `contact`, `address`, `city`, `state`, `zipcode`, `firm-email`, `web-address`, `category`, `description`, `date`) VALUES ('$pname','$email','$contact','$address','$city','$state','$zip',  '$femail', '$webaddress', '$list', '$description', current_timestamp());";

    $result = mysqli_query($conn, $sql);
    //checking
    if ($result) {
        $insert = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="lawyer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Lawyer-form</title>
</head>

<body>
    <!-- NAV-BAR -->
    <?php require 'utilities\navbar.php' ?>
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> 
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
    ?>
    <div class="container-contact1">
        <div class="container1">
            <div class="heading"><b>Register Here</b> </div>
            <!-- <div class="container"> -->
            <form class="contact1-form" action="lawyer.php" method="post">
                <div class="card-details">
                    <p class="a1 " style="text-align: justify;">
                        Volunteering is an excellent way to broaden your social support network and keep your mind
                        active by learning new things. It is an easy way to build connections with your local community;
                        it also gives you an opportunity to share your knowledge and experiences, make a positive
                        difference, and feel good about yourself.
                    </p>
                    <div class="a2"><b>If you want voluntarily sign-up and provide legal support/advice to our
                            victims </b></div>

                    <div class="mt-4">
                        <h4><b>About Yourself: </b> </h4>
                        <div class="input-group card-box">
                            <p style="font-size: 19px;" name="y/n">Are you comfortable initially communicating with a
                                client by answering a question via email ?</p>
                            <div class="form-check form-check-inline" id="nnnn">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">NO</label>
                            </div>
                            <?php
                            if (isset($_POST['y/n'])) {
                                $selected_color = $_POST['y/n'];
                                // Store the selected value in a database or do some other processing with it
                            }
                            ?>

                        </div>

                        <div class="input-group card-box">

                            <span class="details">Full Name</span>
                            <input type="text" name="name" placeholder="Enter your name">
                        </div>
                        <div class="input-group card-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-group card-box">
                            <span class="details">Contact</span>
                            <input type="number" name="contact" placeholder="Number">
                        </div>
                        <div class="input-group card-box">
                            <span class="details">Address</span>
                            <textarea id="address" name="address" rows="8" cols="80" placeholder="Address"></textarea>
                        </div>

                        <div class="input-group card-box">
                            <span class="input-group-addon details">City</span>
                            <input id="msg" type="text" class="form-control" name="city" placeholder="City">
                        </div>

                        <div class="input-group card-box">
                            <span class="input-group-addon details">State</span>
                            <input id="msg" type="text" class="form-control" name="state" placeholder="State">
                        </div>



                        <div class="input-group card-box">
                            <span class="input-group-addon details">Zipcode</span>
                            <input id="msg" type="text" class="form-control" name="zip" placeholder="Zip Code">
                        </div>

                    </div>
                    <br><br>

                    <div>
                        <h4><b> Firm Description & Web Contact Information</b></h4>

                        <div class="input-group card-box">
                            <span class="details">Email</span>
                            <input type="email" placeholder="Email" name="femail">
                        </div>
                        <div class="input-group card-box">
                            <span class="details">Web Address - http://</span>
                            <input type="text" placeholder="Web Address" name="webadd">
                        </div>
                        <div class="input-group card-box">
                            <span class="details">Categories you work in </span>
                            <textarea id="list" name="list" rows="8" cols="80" placeholder="List out"></textarea>
                        </div>

                        <div class="input-group card-box">
                            <span class="details">3 Descriptive lines about your Firm or Services</span>
                            <textarea id="desc" name="description" rows="8" cols="80"
                                placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="container-contact1-form-btn">
                    <button type="submit" class="contact1-form-btn">
                        Sign Up</button>
                    <!-- <input type="Submit"> -->
                </div>
            </form>

        </div>
    </div>
    <!-- footer -->
    <?php require 'utilities\_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

</body>

</html>