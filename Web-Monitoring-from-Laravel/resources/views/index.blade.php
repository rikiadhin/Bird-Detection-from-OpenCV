<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <h3 class="sidebar-brand brand-logo">MIDGES CAM</h3>
            </div>
            <ul class="nav">
                {{-- <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                                <span>Gold Member</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar-today text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li> --}}
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <!-- <li class="nav-item menu-items">
                    <a class="nav-link" href="#data">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Data</span>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul>
                    {{-- <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg"
                                        alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul> --}}
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    {{-- TAMPILAN DASHBOARD --}}
                    {{-- <div class="row">
                        <div class="col-md-6 grid-margin stretch-card" >
                            <div class="card" style="align-content: center">
                                <div class="card-body">
                                    <h4 class="card-title">Camera Monitoring</h4>
                                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                                    <div
                                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                        <div class="text-md-center text-xl-left">
                                            <h6 class="mb-1">Transfer to Paypal</h6>
                                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                        </div>
                                        <div
                                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                            <h6 class="font-weight-bold mb-0">$236</h6>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                        <div class="text-md-center text-xl-left">
                                            <h6 class="mb-1">Tranfer to Stripe</h6>
                                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                        </div>
                                        <div
                                            class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                            <h6 class="font-weight-bold mb-0">$593</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row justify-content-start">
                        {{-- <div class="col-md-6 grid-margin stretch-card mx-auto"> --}}
                        <div class="col-5">
                            <div class="card" style="align-content: left" height: 10%>
                                <div class="card-body">
                                    <h4 class="card-title">Camera Monitoring</h4>
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="http://127.0.0.1:5000/"
                                            frameborder="0"></iframe>
                                    </div>
                                    <div
                                        class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py- px-1 px-md-1 px-xl-1 rounded mt-1">
                                        <div class="text-md-center text-xl-center mx-auto">
                                            <h6 class="mb-1">Bird</h6>
                                            <span class="badge" id="bird"></span>
                                        </div>
                                    </div>
                                    {{-- <div
                                    class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1">Transfer to Stripe</h6>
                                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                    </div>
                                    <div
                                        class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0">$593</h6>
                                    </div>
                                </div> --}}
                                </div>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h1 id="data"></h1>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5>Suhu</h5>
                                                        <div class="row">
                                                            <div class="col-2 col-sm-1 col-xl-1">
                                                                <div
                                                                    class="d-flex d-sm-block d-md-flex align-items-center">
                                                                    <h2 id="temperature" class="mb-0">
                                                                    </h2>
                                                                    {{-- <p id="persenSuhu" class="text-success ml-2 mb-0 font-weight-medium">
                                                            +3.5%</p> --}}
                                                                </div>
                                                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5>Jumlah Terdeteksi</h5>
                                                        <div class="row">
                                                            <div class="col-2 col-sm-1 col-xl-1">
                                                                <div
                                                                    class="d-flex d-sm-block d-md-flex align-items-center">
                                                                    <h2 id="birdStatus" class="mb-0"> </h2>
                                                                    <span class="badge badge-pill">Burung/Hari</span>
                                                                    {{-- <p id="persenJumlahTerdeteksi"
                                                            class="text-success ml-2 mb-0 font-weight-medium">
                                                            +8.3%</p> --}}
                                                                </div>
                                                                {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row ">
                                        <div class="col-12 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 id="riwayatTerdeteksi" class="card-title">Riwayat Terdeteksi</h4>
                                                    <div class="table-responsive">
                                                        <table class="table" id="historyTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="form-check form-check-muted m-0">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input">
                                                                            </label>
                                                                        </div>
                                                                    </th>
                                                                    <th> Client Name </th>
                                                                    {{-- <th> Order No </th>
                                                            <th> Product Cost </th>
                                                            <th> Project </th>
                                                            <th> Payment Mode </th>
                                                            <th> Start Date </th>
                                                            <th> Payment Status </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="historyBody">
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-muted m-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img src="assets/images/faces/face1.jpg" alt="image" />
                                                                <span class="pl-2">Henry Klein</span>
                                                            </td>
                                                            <td> 02312 </td>
                                                            <td> $14,500 </td>
                                                            <td> Dashboard </td>
                                                            <td> Credit card </td>
                                                            <td> 04 Dec 2019 </td>
                                                            <td>
                                                                <div class="badge badge-outline-success">Approved</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-muted m-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img src="assets/images/faces/face2.jpg" alt="image" />
                                                                <span class="pl-2">Estella Bryan</span>
                                                            </td>
                                                            <td> 02312 </td>
                                                            <td> $14,500 </td>
                                                            <td> Website </td>
                                                            <td> Cash on delivered </td>
                                                            <td> 04 Dec 2019 </td>
                                                            <td>
                                                                <div class="badge badge-outline-warning">Pending</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-muted m-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img src="assets/images/faces/face5.jpg" alt="image" />
                                                                <span class="pl-2">Lucy Abbott</span>
                                                            </td>
                                                            <td> 02312 </td>
                                                            <td> $14,500 </td>
                                                            <td> App design </td>
                                                            <td> Credit card </td>
                                                            <td> 04 Dec 2019 </td>
                                                            <td>
                                                                <div class="badge badge-outline-danger">Rejected</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-muted m-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img src="assets/images/faces/face3.jpg" alt="image" />
                                                                <span class="pl-2">Peter Gill</span>
                                                            </td>
                                                            <td> 02312 </td>
                                                            <td> $14,500 </td>
                                                            <td> Development </td>
                                                            <td> Online Payment </td>
                                                            <td> 04 Dec 2019 </td>
                                                            <td>
                                                                <div class="badge badge-outline-success">Approved</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-muted m-0">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <img src="assets/images/faces/face4.jpg" alt="image" />
                                                                <span class="pl-2">Sallie Reyes</span>
                                                            </td>
                                                            <td> 02312 </td>
                                                            <td> $14,500 </td>
                                                            <td> Website </td>
                                                            <td> Credit card </td>
                                                            <td> 04 Dec 2019 </td>
                                                            <td> --}}
                                        {{-- <div class="badge badge-outline-success">Approved</div>
                                                            </td> --}}
                                        </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row-16 grid-margin">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <h4 id="riwayatTerdeteksi" class="card-title">Riwayat Terdeteksi</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="historyTable">
                                                <thead>
                                                    <tr>
                                                        <th> Waktu </th>
                                                        <th> Status Terdeteksi </th>
                                                        <th> Sumber </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="historyBody">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    <script>
        // Store the previous timestamp outside the fetchData function
        let previousTimestamp = {
            temperature: null,
            bird: null,
        };

        function fetchData() {
            fetch('/get-data')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('temperature').textContent = data.temperature.temperature +
                        "°C";
                    document.getElementById('birdStatus').textContent = data.totalBird;

                    // Update history table only if there's new data
                    const historyBody = document.getElementById('historyBody');
                    const maxRows = 10;

                    // Remove excess rows if the history exceeds the limit
                    while (historyBody.rows.length >= maxRows) {
                        historyBody.deleteRow(0); // Remove the oldest row
                    }

                    // Insert a new row for the latest entry
                    const latestEntry = {
                        bird: data.bird,
                        temperature: data.temperature,
                    };

                    // Check if the timestamp is different from the previous one
                    if (latestEntry.bird.timestamp !== previousTimestamp && latestEntry.bird.bird) {
                        const row = historyBody.insertRow();
                        const timestampCell = row.insertCell(0);
                        const birdStatusCell = row.insertCell(1);
                        const sourceCell = row.insertCell(2);

                        timestampCell.textContent = latestEntry.bird.timestamp;
                        birdStatusCell.textContent = latestEntry.bird.bird ? "TRUE" : "FALSE";
                        sourceCell.textContent = latestEntry.bird.source;

                        // Update the previous timestamp
                        previousTimestamp = latestEntry.bird.timestamp;
                    }

                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            fetch('/get-data-camera').then(response => response.json())
                .then(data => {
                    document.getElementById('bird').textContent = data ? "Terdeteksi" : "Tidak Terdeteksi";
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
        // Fetch data initially and set interval to update every 10 seconds
        fetchData();
        setInterval(fetchData, 1000);
    </script>


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
