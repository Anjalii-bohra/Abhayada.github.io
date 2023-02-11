<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashoard</title>
    <link rel="stylesheet" href="admin.css">
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
            <h2><span class="lab la-accusoft"></span> <span>Abhayada</span></h2>

        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.html" class="active"><span class="las la-igloo"></span> Dashboard</a>
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
                    <a href="adminDomestic.html"><span class="las la-clipboard-list"></span>Statistics</a>
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

            <div class="user-wrapper">
                <img src="wave0.5.svg" width="40px" height="40px" alt="">
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
                        <h1>0</h1>
                        <a href="adminInstitute.html">Institute</a>

                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
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
                                        include "../utilities/_dbconnect.php";
                                        $sql = "select * FROM `complaint` ";
                                        $result = mysqli_query($conn, $sql);
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

    </div>

    </main>
    </div>
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