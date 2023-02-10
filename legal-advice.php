<?php
$insert = false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'utilities\_dbconnect.php';
    $email = $_POST["email"];
    $msg = $_POST["message"];


    //sql query
    $sql = "INSERT INTO `legal-advice` (`email`, `message`, `date`) VALUES ( '$email','$msg', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    //checking
    if($result){
        $insert = true;
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Legal-Advice</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="legal.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <meta name="robots" content="noindex, follow">

   

<body>
     <!-- NAV-BAR -->
     <?php require 'utilities/navbar.php' ?> 
    <?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Wait!</strong>Will get to you soon.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
    ?>
    
    <!--legal-advice-->
    
    <form id="contactForm" action="legal-advice.php" method="post">
      <div class="bg-contact1" style="background-image: url('images/bg-01.jpg');">
         <div class="container-contact1">
            <div class="wrap-contact1">
                <div>
                    <h2>Legal Advice</h2><br>
                    <p> Our team of highly qualified, dedicated Lawyers and Law
                        Firms
                        are on-line 24 hours a day to offer basic legal information over the net.</p>


                    <p> We understand that many individuals simply do not have the time or
                        desire to attend a lawyers office, fill out complicated forms and pay huge fees in
                        order
                        to obtain basic information. We have found that appropriate legal Information given
                        initially is often sufficient to solve our client's problems.</p>

                    <b><br>
                        Submit Your Query
                        <br><br>
                        <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input1" type="text" id="email" name="email" placeholder="Email">
                            <span class="focus-input1"></span>
                            <span class="symbol-input1">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input1 validate-input" data-validate="Required!">
                            <textarea class="input1" id="message" name="message" placeholder="Query"></textarea>
                            <span class="focus-input1"></span>
                        </div>
                        <div class="container-contact1-form-btn">
                            <button type="submit" class="contact1-form-btn">
                                Send
                            </button>
                        </div>
                    </b>
                </div>
                <div>
                </div>
            </div>
         </div>
       </div>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
       <script src="new.js"></script>
    
    </form>

    <script src="tilt.jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
     crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

<!-- footer -->
<?php require 'utilities\_footer.php' ?>

</body>

</html>
