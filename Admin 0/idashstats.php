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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
                    <a href="admin.html"><span class="las la-igloo"></span> Dashboard</a>
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
                    <a href="idashstats.html" class="active
                    "><span class="las la-clipboard-list"></span>Statistics</a>
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
                <input type="search" placeholder="Search here" />

            </div>
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
                        <a href="adminInstitute.html">Complaints Registered</a>

                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="adminComplaints.html">Complaints Solved</a>

                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="adminDomestic.html">Pending Complaints</a>

                    </div>
                    <div>
                        <span class="las la-question"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <a href="adminSolved.html">Average % of Solved Complaints</a>

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

                           
                        </div>

                        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>

<script>
var xyValues = [
  {x:50, y:7},
  {x:60, y:8},
  {x:70, y:8},
  {x:80, y:9},
  {x:90, y:9},
  {x:100, y:9},
  {x:110, y:10},
  {x:120, y:11},
  {x:130, y:14},
  {x:140, y:14},
  {x:150, y:15}
];

new Chart("myChart", {
  type: "scatter",
  data: {
    datasets: [{
      pointRadius: 4,
      pointBackgroundColor: "rgb(0,0,255)",
      data: xyValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      xAxes: [{ticks: {min: 40, max:160}}],
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>
                    </div>
                </div>

            </div>

    </div>

    </main>
    </div>



</body>

</html>