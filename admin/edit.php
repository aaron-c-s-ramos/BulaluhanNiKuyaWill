<?php
require_once("session-checker.php");
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - Bulaluhan ni Kuya Will</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Bootstrap CSS for responsive design and components -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
        <link rel="icon" type="image" href="assets/img/favicon.ico">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous" defer></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous" defer></script>
            <script src="js/scripts.js" defer></script>
            <script src="assets/demo/chart-area-demo.js" defer></script>
            <script src="assets/demo/chart-bar-demo.js" defer></script>
            <script src="js/datatables-simple-demo.js" defer></script>
        </div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.php">Bulaluhan ni Kuya Will</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><button class="dropdown-item" onclick="window.location.href='changePassword.php';">Change Password</button></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Navigation</div>
                            <a class="nav-link" href="index.php">Current Reservations</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['Username']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <h1 class="container-fluid px-4 mt-4">Current Reservations</h1>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Current Reservations
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Reservation_ID</th>
                                            <th>Customer_First_Name</th>
                                            <th>Customer_Last_Name</th>
                                            <th>Number_Of_Guests</th>
                                            <th>Customer_Phone</th>
                                            <th>Reservation_Date</th>
                                            <th>Reservation_Time</th>
                                            <th>Status</th>
                                            <th>Submitted_Reservation</th>
                                            <!-- <th>Update</th> -->
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Reservation_ID</th>
                                            <th>Customer_First_Name</th>
                                            <th>Customer_Last_Name</th>
                                            <th>Number_Of_Guests</th>
                                            <th>Customer_Phone</th>
                                            <th>Reservation_Date</th>
                                            <th>Reservation_Time</th>
                                            <th>Status</th>
                                            <th>Submitted_Reservation</th>
                                            <!-- <th>Update</th> -->
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
    <?php
                                        $sql  = "SELECT * FROM current_reservations ORDER BY Reservation_ID";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $Reservation_ID        = $row['Reservation_ID'];
                                            $Customer_First_Name   = $row['Customer_First_Name'];
                                            $Customer_Last_Name    = $row['Customer_Last_Name'];
                                            $Number_Of_Guests      = $row['Number_Of_Guests'];
                                            $Customer_Phone        = $row['Customer_Phone'];
                                            $Reservation_Date      = $row['Reservation_Date'];
                                            $Reservation_Time      = $row['Reservation_Time'];
                                            $Status                = $row['Status'];
                                            $Submitted_Reservation = $row['Submitted_Reservation'];
                                            echo
                                                '
                                                <tr>
                                                    <td>' . $Reservation_ID . '</td>
                                                    <td>' . $Customer_First_Name . '</td>
                                                    <td>' . $Customer_Last_Name . '</td>
                                                    <td>' . $Number_Of_Guests . '</td>
                                                    <td>' . $Customer_Phone . '</td>
                                                    <td>' . $Reservation_Date . '</td>
                                                    <td>' . $Reservation_Time . '</td>
                                                    <td>' . $Status . '</td>
                                                    <td>' . $Submitted_Reservation . '</td>
                                                    <td><button class="btn btn-danger"><a href="delete.php?deleteID=' . $Reservation_ID . '" class="text-decoration-none text-light">Delete</a></button></td>
                                                </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="float-start">
                            <div class="text-muted">Copyright &copy; Bulaluhan ni Kuya Will 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
