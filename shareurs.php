<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'utilities\_dbconnect.php';
        $name = $_POST['name'];
        $story = $_POST['story'];

  $sql = " INSERT INTO `experience` (`name`, `story`) VALUES ('$name', '$story')";
  $result = mysqli_query($conn,$sql);

  if($result) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Your entry has been submitted!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry</strong> Your entry has not been submitted! We regret the inconvenience!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
 }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>shareurs</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link href="su.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <meta name="robots" content="noindex, follow">
</head>

<body>
<?php require 'utilities/navbar.php' ?> 
    <!-- COMPLAINT-FORM -->
    <div class="bg-contact1" style="background-image: url('bg-01.jpg');">
        <div class="container-contact1">
            <div class="wrap-contact1">
                <div class="contact1-pic js-tilt" data-tilt>
                    <img src="images/@5.jpeg" alt="IMG">
                </div>
                <form class="contact1-form validate-form" id="contactForm" action="shareurs.php" method="post">
                    <span class="contact1-form-title">
                        GO FOR IT!!
                    </span>

                    <div class="wrap-input1 validate-input" data-validate="ID is required">
                        <input class="input1" type="text" id="name" name="name" placeholder="Name">
                        <span class="focus-input1"></span>
                        <span class="symbol-input1">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input1 validate-input" data-validate="Required!">
                        <textarea class="input1" id="story" name="story"
                            placeholder="Share your story here!"></textarea>
                        <span class="focus-input1"></span>
                    </div>


                    <div class="container-contact1-form-btn">
                        <button class="contact1-form-btn" type="submit">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'utilities\_footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
    <script src="./sh.js"></script>

    <script src="tilt.jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
 
  
</body>

</html>