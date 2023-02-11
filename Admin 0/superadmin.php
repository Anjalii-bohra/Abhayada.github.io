<?php
include "../Utilities/_dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashoard</title>
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <link href="admin.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">

</head>

<body>
    <div class="share-btn-container">
        <a href="#">Feedback</a>
    </div>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <span>Abhayada</span></h2>

        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="superadmin.php" class="active"><span class="las la-igloo"></span> Dashboard</a>
                </li>
                <li>
                    <a href="adminInstitute.html"><span class="las la-users"></span>Institute</a>
                </li>
                <li>
                    <a href="adminComplaints.html"><span class="las la-clipboard-list"></span>Complaints </a>
                </li>
                <li>
                    <a href="adminSolved.html"><span class="las la-clipboard-list"></span>Solved Complaints</a>
                </li>
                <li>
                    <a href="idashstats.php"><span class="las la-clipboard-list"></span>Statistics</a>
                </li>
            </ul>

        </div>


    </div>
    <div class="main-content">
        <header>
            <h1>
                Dashboard
            </h1>

            <div class="user-wrapper">

                <div>
                    <h4>Ravi Patel</h4>
                    <small>Super Admin</small>
                </div>

            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $sql = "SELECT * FROM `institute`  ";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            echo "" . $num . " ";
                            ?>
                        </h1>
                        <a href="adminInstitute.html">Institute</a>

                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $sql = "SELECT * FROM `complaint`  ";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            echo "" . $num . " ";
                            ?>
                        </h1>
                        <a href="adminComplaints.html">Complaints</a>

                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="adminDomestic.html">Pending Complaint </a>

                    </div>
                    <div>
                        <span class="las la-question"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="adminSolved.html">Solved complaints</a>

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
                                            <th scope="col" rowspan="2">sno</th>
                                            <th colspan="4" scope="col">Complainee</th>
                                            <th colspan="2" scope="col">Accused</th>
                                            <th scope="col" rowspan="2">Complaint</th>
                                            <th colspan="3" scope="col">Organisation</th>
                                        </tr>

                                        <tr>
                                            <th scope="col">Employee ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Email</th>

                                            <th scope="col">Employee ID</th>
                                            <th scope="col">Name</th>


                                            <th scope="col">Name</th>
                                            <th scope="col">Sector</th>
                                            <th scope="col">Department</th>

                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        include "../utilities/_dbconnect.php";
                                        $sql = "select * FROM `complaint` ";
                                        $result = mysqli_query($conn, $sql);
                                        $sno = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sno = $sno + 1;
                                            echo "<tr>
                                <th scope='row'>" . $sno . "</th>
                                <td>" . $row['vid'] . "</td>
                                <td>" . $row['vname'] . "</td>
                                <td>" . $row['vno'] . "</td>
                                <td>" . $row['vemail'] . "</td>
                                <td>" . $row['cid'] . "</td>
                                <td>" . $row['cname'] . "</td>
                                <td>" . $row['complaint'] . "</td>
                                <td>" . $row['org'] . "</td>
                                <td>" . $row['orgtype'] . "</td>
                                <td>" . $row['vdepartment'] . "</td>
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

    </div>

    </main>
    </div>
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