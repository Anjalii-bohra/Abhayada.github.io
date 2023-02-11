<?php
$insert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'utilities\_dbconnect.php';
    $vname = $_POST["vname"];
    $vid = $_POST["vid"];
    $vno = $_POST["vno"];
    $vemail = $_POST["vemail"];
    $cname = $_POST["cname"];
    $cid = $_POST["cid"];
    $complaint = $_POST["complaint"];
    $org = $_POST["org"];
    $orgtype = $_POST["orgtype"];
    $vdepartment = $_POST["vdepartment"];
    $id = uniqid() . "_ABHY";

    //sql query

    $sql = " INSERT INTO `complaint` ( `id`,`vname`, `vid`, `vno`,`vemail`, `cname`, `cid`, `complaint` ,`org`, `orgtype`,`vdepartment`, `date`) VALUES ( '$id','$vname','$vid','$vno','$vemail', '$cname', '$cid', '$complaint','$org','$orgtype','$vdepartment', current_timestamp())";
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
    <title>Complaint-form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="complaint.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <!-- NAV-BAR -->
    <?php require 'utilities\navbar.php' ?>
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                              <strong>Success!</strong> Your record has been inserted successfully.
                                              $id 
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
                <form class="contact1-form validate-form" action="complaint.php" method="post">
                    <span class="contact1-form-title">
                        COMPLAINT HERE
                    </span>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="vname" placeholder="Your Name" required>
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="vid" placeholder="Your Employee ID" required>
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="number" name="vno" placeholder="Your Mobile No." required>
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="email" name="vemail" placeholder="Your Email-Id" required>
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="Name is required">
                        <input class="input1" type="text" name="cname" placeholder="Accused Name">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="cid" placeholder="Accused Employee ID (OPTIONAL)">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="Required!">
                        <textarea class="input1" name="complaint"
                            placeholder="Complaint (Mention the date and approximate time of the incident)"
                            required></textarea>
                        <span class="focus-input1"></span>
                    </div>
                    <br>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" name="org" placeholder="Organization Name" required>
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <table>
                        <div>
                            <tr>
                                <td>
                                    <p id=organization>Organization Type</p>
                                </td>
                                <td>
                                    <select name="orgtype" id="oll">
                                        <option value="Private">Private</option>
                                        <option value="Government">Government</option>
                                        <option value="PSU">PSU</option>
                                </td>
                            </tr>
                        </div>
                    </table>

                    <table>
                        <div>
                            <tr>
                                <td>
                                    <P id=organization>Departments</p>
                                </td>
                                <td>
                                    <select name="vdepartment" id="oll">
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Education">Education</option>
                                        <option value="Industry">Industry</option>
                                        <option value="Marketing and Sales">Marketing and Sales</option>
                                        <option value="Finance">Finance</option>
                                        <option value="HR">HR</option>
                                        <option value="production">production</option>
                                        <option value="others">others</option>
                                </td>
                            </tr>
                        </div>
                    </table>



                    <br>
                    <div>
                        <label>
                            <input type="checkbox" name="Agreed" required> I am sure about the Complaint
                        </label>
                    </div>

                    <div class="container-contact1-form-btn">
                        <button class="contact1-form-btn" name="submit" value="submit" data-toggle="modal"
                            data-target="#exampleModal">
                            Send
                        </button>
                    </div>
                    <!-- <div class="container-contact1-form-btn">
                        <button class="contact1-form-btn " name="submit" value="submit" type="button"
                            class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Send
                        </button>
                    </div> -->

                    <!-- Modal -->
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Your Complaint is stored, wait for
                                        the further process</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php

                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button> 
            </div>
        </div>
    </div>
    </div> -->

                </form>
            </div>

        </div>

    </div>
    <!-- footer  -->
    <?php require 'utilities\_footer.php' ?>

    <script src="tilt.jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

</body>

</html>