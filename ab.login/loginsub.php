<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from institute where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: idashboard.php");
            } else {
                $showError = "Invalid Credentials";
            }
        }
    }
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://kit.fontawesome.com/c85d084fd0.js" crossorigin="anonymous"></script>

    
    <title>Log-in</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="loginsub.css">
</head>
<body>

     <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
      <img class="wave" src="wave0.5.svg">
      <div class="container ">
        <div class="login">
            <img src="girl.svg">
        </div>
        <div class="login-container">
            <form action="loginsub.php" method="post">
                <img  class="avatar" src="AA.jpeg">
                <h2>Institute log-in</h2>

                <div class="input-div two focus">
                    <div class="i">
                        <i class="fas fa-envelope"></i>

                    </div>
                    <div>
                        <h5>Email-id</h5>
                        <input class="input" type="text" placeholder="E-mail id" name="username">

                    </div>
                </div> 
                <div class="input-div three focus">
                    <div class="i">
                        <img src="pass-fill.svg">
                    </div>
                    <div>
                        <h5> Contact No.</h5>
                        <input class="input" type="password" placeholder="Password" name="password">
                    </div>

                    

                </div>
                
                <a href="institute.html">New User?</a>
                <a href="#">Forgot Password?</a>
    
                <button type="submit" class="btn"  >Log-in</button>
                
            </form>

        </div>


      </div>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    
</body>
</html>