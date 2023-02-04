<?php

//INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES ('1', 'hello', 'abcdefg hijklmn opqrstu vwxyz', current_timestamp());
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "complaint";

$conn = mysqli_connect($servername, $username, $password, $database);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $vid = $_POST["vid"];
  $cname = $_POST["cname"];
  $cid = $_POST["cid"];
  $complaint = $_POST["complaint"];
  $action = $_POST["action"];



  //$sql = "INSERT INTO `notes1` (`title`, `description`) VALUES ('$title', '$description')";
  $sql = "INSERT INTO `notes1` (`vid`, `cname`, `cid`, `complaint`, `action`) VALUES ('$vid', '$cname', '$cid', '$complaint', '$action')";
 $result = mysqli_query($conn, $sql);

 if($result){
     //echo "inserted !!!";
     $insert = true;
 }

 else{
  echo "error ----> " .mysqli_error($conn);
 }

  


  
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=" //cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css.">

    <title>Institute Dashoard</title>
    <link  rel="stylesheet" href="idashboard.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="share-btn-container">
        <a href="#">Feedback</a>
    </div>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span>Abhayada</span></h2>

        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="idashboard.html" class="active"><span class="las la-igloo"></span> Dashboard</a>
                </li>
                <!--<li>
                    <a href="adminInstitute.html"><span class="las la-users"></span>Institute</a>
                </li>-->
                <li>
                    <a href="idashboardSolved.html"><span class="las la-clipboard-list"></span>Complaints </a>
                </li>
                <!--<li>
                    <a href="adminDomestic.html"><span class="las la-shopping-bag"></span>Domestic violence</a>
                </li>-->
               <!-- <li>
                    <a href=""><span class="las la-receipt"></span> Inventory</a>
                </li>-->
                <!--<li>
                    <a href=""><span class="las la-user-circle"></span>Accounts</a>
                </li>-->
                <li>
                    <a href="idashboardSolved.html"><span class="las la-clipboard-list"></span>Solved Complaints</a>
                </li>
            </ul>

        </div>


    </div>
    <div class="main-content">
        <header>
            <h1>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h1>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"/>

            </div>
            <div class="user-wrapper">
                <img src="wave0.5.svg" width="40px" height="40px" alt="">
                <div>
  
                    <h4>
                        <?php
                         $sql = "SELECT * FROM `notes1`";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_assoc($result);
                         echo " ".$row['ins']. " "
                         ?>
                    </h4>
                    <small>Super Admin</small>
                </div>

            </div>
        </header>
        <main>
            <div class="cards">
                <div class="">
                   <!-- <div>
                        <h1>0</h1>
                        <a href="adminInstitute.html">Institute</a>

                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>-->
                <div class="card-single">
                    <div>
                        <h1>
                            <?php  
                                   $sql = "SELECT * FROM `notes1` WHERE `ins`='chuzza.pvt.ltd'";
                                   $result = mysqli_query($conn, $sql);
                                   $num = mysqli_num_rows($result);
                                   //$sno = 0;
                                   //while($row = mysqli_fetch_assoc($result)){
                                   //$sno = $sno + 1; 
                                   echo"" . $num . " "
                                                         ;  //}
                            ?>
                        </h1>
                        <a href="idashboardComplaint.html">Complaints</a>

                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <!--<div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="adminDomestic.html">Domestic Violence </a>

                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>-->
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="idashboardSolved.html" style="text-decoration: none;">Solved complaints</a>

                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3> Received Complaints</h3>

                            <!--<a href="idashboardComplaint.html"><button> See all <span class="las-la-arrow-right"></span></button></a>-->

                        </div>
                        <div class="card-body">
                            <div class="container">
                        
                            <table class="table" id="myTable">
                                <thead>
                                  <tr>
                                    <th scope="col">sno</th>
                                    <th scope="col">vid</th>
                                    <th scope="col">cname</th>
                                    <th scope="col">cid</th>
                                    <th scope="col">complaint</th>
                                    <th scope="col">institute</th>

                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                               //$sql = "SELECT * FROM `notes1`";
                               $sql = "SELECT * FROM `notes1` WHERE `ins`='chuzza.pvt.ltd'";
                               $result = mysqli_query($conn, $sql);
                               $sno = 0;
                               while($row = mysqli_fetch_assoc($result)){
                                $sno = $sno + 1;
                                echo "
                                <tr>
                                <th scope='row'>" . $sno . "</th>
                                <td>".$row['vid']."</td>
                                <td>".$row['cname']."</td>
                                <td>".$row['cid']."</td>
                                <td>".$row['complaint']."</td>
                                <td>".$row['ins']."</td>

                                
                              </tr>";
                                
                              }
                              ?>
                                  
                                  
                                </tbody>
                              </table>
                              </div>

                        </div>
                    </div>

                </div>
                <!-- <div class="coustomers">
                    
                    <div class="card">
                        <div class="card-header">
                            <h3>New customer</h3>

                            <button> See all <span class="las-la-arrow-right"></span></button>

                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div class="contact"> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>
                            <div class="customer">
                                <div>
                                  <img src="wave0.1.svg" width="40px" height="40px" alt="">
                                     
                                    <div>
                                        <h4> abcdes</h4>

                                        <small> CEO EXPERT</small>
                                    </div>
                                     
                                     
                                </div>
                                <div> 
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>

                                </div>      

                            </div>







                    
                        </div>
                    </div>    

                </div>   -->

            </div>

        </main>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href=" //cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

   

    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
       
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

    
    
</body>
</html>