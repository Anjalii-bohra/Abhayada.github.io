<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="BB.css">
    <title>Blog section</title>
</head>

<body>

    <!-- navbar  -->
    <?php require 'utilities/navbar.php' ?> 
    <!-- ----------------- -->
    <!-- top image -->
    <section class="fixed-background" data-type="slider-item">
        <!-- <h1>ABHAYADA</h1> -->
        <!-- <img src="l.png"> --><br>
    </section>
    <br>
    <br>
    <a href="shareurs.php"><button class="btn2">Share
            Yours</button></a>

    <?php include 'utilities/_dbconnect.php';?>
    <!-- boxes -->
    <?php
    $sql = "SELECT * FROM `experience`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
   $cat = $row['name'];
   $descrip = $row['story'];
    echo '
    <div class="container my-4">
    <div class="media py-4 px-4" style="background-color:white; color: black; border-radius:9px;">
    <img src="usericon.png" class="align-self-start mr-3" alt="..." style="width: 50px;">
    <div class="media-body">
      <h5 class="mt-0">' .$cat. '</h5>
      <p>'. $descrip. '</p>
    </div>
  </div>
  </div>';
    }
    ?>

    <!-- footer -->
    <?php require 'utilities\_footer.php' ?>
    <script src="Blo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>