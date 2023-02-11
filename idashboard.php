<?php include 'utilities/_dbconnect.php';
?>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: loginsub.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=" //cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css.">

    <title>Institute Dashoard</title>
    <link href="idashboard.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span><img src="../images/AA.jpeg" style="width:50px;height:50px;"></span> <span>Abhayada</span></h2>

        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="idashboard.php" class="active"><span class="las la-igloo"></span> Dashboard</a>
                </li>
                <!-- <li>
                    <a href="idashboardSolved.html"><span class="las la-clipboard-list"></span>Complaints </a>
                </li> -->
                <li>
                    <a href="idashboardSolved.html"><span class="las la-clipboard-list"></span>Solved Complaints</a>
                </li>
            </ul>
        </div>


    </div>
    <div class="main-content">
        <header>
            <h1>
                <!-- <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> -->
                Dashboard
            </h1>

            <div class="user-wrapper">
                <!-- <img src="wave0.5.svg" width="40px" height="40px" alt=""> -->
                <div>
                    <h4>
                        <?php
                        include 'utilities/_dbconnect.php';
                        // $sql = "SELECT ins.username
                        // FROM institute ins
                        // WHERE EXISTS(SELECT c.institute 
                        // FROM complaint c 
                        // WHERE c.institute = ins.Oname); ";
                        // $result = mysqli_query($conn, $sql);
                        // $row = mysqli_fetch_assoc($result);
                        echo "Welcome " . $_SESSION['username'];
                        ?>
                    </h4>
                    <small> <a href="logout.php"> Logout</a></small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            // $var = $_SESSION['Oname'];
                            $sql = "SELECT *
                             FROM complaint c ";

                            //    $sql = "SELECT * FROM `complaint` where ";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            echo "" . $num . " ";
                            ?>
                        </h1>
                        <a href="idashboardComplaint.html">Complaints</a>

                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <!-- <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="idashboardSolved.html" style="text-decoration: none;">Solved complaints</a>

                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div> -->
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
                                            <!-- <th scope="col">institute</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dsql = "";
                                        $result = mysqli_query($conn, $dsql);
                                        $sno = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sno = $sno + 1;
                                            echo "<tr>
                                <th scope='row'>" . $sno . "</th>
                                <td>" . $row['vid'] . "</td>
                                <td>" . $row['cname'] . "</td>
                                <td>" . $row['cid'] . "</td>
                                <td>" . $row['complaint'] . "</td>
                                </tr>";
                                            // <td>".$row['institute']."</td>
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href=" //cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>