<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Blog section</title>
</head>

<body>

    <!-- navbar  -->
    <?php require 'utilities/navbar.php' ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="blog1.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="blog2.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="blog4.jpg" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <div class="container" style="margin-top: 20px;">
        <a href="shareurs.php"><button class="btn2">Share
                Yours</button></a>
    </div>
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
    <img src="usericon1.png" class="align-self-start mr-3" alt="..." style="width: 50px;">
    <div class="media-body">
      <h5 class="mt-0">' .$cat. '</h5>
      <p>'. $descrip. '</p>
    </div>
  </div>
  </div>';
    }
    ?>

    <!-- footer -->
    <link href="BB.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <?php require 'utilities\_footer.php' ?>
    <script src="Blo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
</body>

</html>