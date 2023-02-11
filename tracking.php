<!DOCTYPE html>
<html lang="en">

<head>
  <title>TRACKING</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="tracking.css">

</head>

<body>
  <!-- navbar  -->
  <?php require 'utilities\navbar.php' ?>
  <!-- ----------------- -->
  <br>


  <div class="container" id="track">
    <div class="row">
      <div class="col">
        <b> Track your complaint status</b>
        <!-- <form> 
              <div class="form-row">
                <div class="col-6">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col-1">
                  <button type="button" class="btn btn-dark">OK</button>
                </div>
                <div class="col-5">
    
                </div>
              </div>
            </form> -->
      </div>
    </div>
  </div>
  <br>
  <div class="container" id="dabbu">
    <div class="row">
      <div class="col">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" aria-label="Recipient's username"
            aria-describedby="button-addon2">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Complaint Number" aria-label="Recipient's username"
            aria-describedby="button-addon2">

        </div>
      </div>
    </div>
    <div class="input-group-append">
      <button class="btn btn-success" type="button" id="button-addon2">Enter</button>
    </div>
  </div>
  <br>
  <!-- <div class="container" id="progtrack">
    <ol class="progress-meter">
      <li class="progress-point done">Pending</li>
      <li class="progress-point done">Review</li>
      <li class="progress-point todo">Solved</li>
    </ol>
  </div> -->
  <section>
    <div class="space">
      <div class="pr">
        <!-- <form>
          PROOF: <input type="url" id="oof"> (Uploaded by Institute) 
        </form>-->
        <?php
        // // Connect to the database
        // include 'utilities\_dbconnect.php';
        
        // // Get the PDF file data from the database
        // $query = "SELECT * FROM pdf_files ORDER BY id DESC LIMIT 1";
        
        // $result = mysqli_query($conn, $query);
        // $pdf_data = mysqli_fetch_assoc($result);
        
        // // Display the PDF file
        // header("Content-Type: " . $pdf_data['file_type']);
        // echo $pdf_data['file_data'];
        ?>
      </div>

      <br>
      <p>
        Do you agree or not?
      </p>
      <div class="button">
        <button type="button" class="btn btn-success" id="accept">Accept</button>
        <button type="button" class="btn btn-danger" id="reject">Reject</button>
      </div>
      <br>
      <div class="wrap-input1  validate-input">
        If rejected, mention the reason.
      </div>
      <div class="wrap-input2  validate-input">
        <textarea class="reason" name="message" rows="5" cols="35"></textarea>
      </div>
      <input type="button" value="Submit"
        style="margin-left: 650px; margin-top: 9px; border-radius: 7px; border-width: 1px; " class="btn-dark"></input>
    </div>

  </section>
  <link href="tracking.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

</body>
<!-- footer -->
<?php require 'utilities\_footer.php' ?>

</html>