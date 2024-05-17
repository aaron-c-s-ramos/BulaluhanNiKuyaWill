<?php
require_once("session-checker.php");
require_once("connection.php");

$id = $_GET['updateID'];

$sql = "SELECT * FROM current_reservations WHERE Reservation_ID = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$Reservation_ID        = $row['Reservation_ID'];
$Customer_First_Name   = $row['Customer_First_Name'];
$Customer_Last_Name    = $row['Customer_Last_Name'];
$Number_Of_Guests      = $row['Number_Of_Guests'];
$Customer_Phone        = $row['Customer_Phone'];
$Reservation_Date      = $row['Reservation_Date'];
$Reservation_Time      = $row['Reservation_Time'];
$Status                = $row['Status'];
$Submitted_Reservation = $row['Submitted_Reservation'];

if (isset($_POST["submit"]))
{
    $Reservation_ID        = $_POST['Reservation_ID'];
    $Customer_First_Name   = $_POST['Customer_First_Name'];
    $Customer_Last_Name    = $_POST['Customer_Last_Name'];
    $Number_Of_Guests      = $_POST['Number_Of_Guests'];
    $Customer_Phone        = $_POST['Customer_Phone'];
    $Reservation_Date      = $_POST['Reservation_Date'];
    $Reservation_Time      = $_POST['Reservation_Time'];
    $Status                = $_POST['Status'];
    $Submitted_Reservation = $_POST['Submitted_Reservation'];

    try {
        $sql = "UPDATE current_reservations
                SET Customer_First_Name = :Customer_First_Name, Customer_Last_Name = :Customer_Last_Name, Number_Of_Guests = :Number_Of_Guests, Customer_Phone = :Customer_Phone, Reservation_Date = :Reservation_Date, Reservation_Time = :Reservation_Time, Status = :Status, Submitted_Reservation = :Submitted_Reservation
                WHERE Reservation_ID = :Reservation_ID";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Reservation_ID', $Reservation_ID, PDO::PARAM_INT);
        $stmt->bindParam(':Customer_First_Name', $Customer_First_Name, PDO::PARAM_STR);
        $stmt->bindParam(':Customer_Last_Name', $Customer_Last_Name, PDO::PARAM_STR);
        $stmt->bindParam(':Number_Of_Guests', $Number_Of_Guests, PDO::PARAM_INT);
        $stmt->bindParam(':Customer_Phone', $Customer_Phone, PDO::PARAM_INT);
        $stmt->bindParam(':Reservation_Date', $Reservation_Date);
        $stmt->bindParam(':Reservation_Time', $Reservation_Time);
        $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);
        $stmt->bindParam(':Submitted_Reservation', $Submitted_Reservation);

        $stmt->execute();

        header("Location: index.php");
    } catch (Exception $e) {
        echo '
    <html>
    <head>
    </head>
    <body>
    <!-- Script to show an error modal when the page loads -->
      <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function()
        {
          // Create a new Bootstrap modal instance for error display
          var errorModal = new bootstrap.Modal(document.getElementById(\'errorModal\'), {});
          // Show the error modal immediately
          errorModal.show();
        });
      </script>
      <!-- Error Modal -->
      <div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="errorModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
          <!-- Container for the screenshot content -->
            <div id="forScreenshot">
              <div class="modal-header d-flex justify-content-center">
                <h1 class="modal-title fs-3" id="errorModalLabel">Error: Connection Failed</h1>
              </div>
              <div class="modal-body fs-5">
              <!-- Error details to be displayed -->
                <span>
                  <!-- PHP code to echo SQL error and stack trace -->';
        echo $sql . '<br>' . $e->getMessage() . '<br>';
        echo '<hr>';
        echo $sql . '<br>' . $e->getTraceAsString() . '<br>';
        echo '
                </span>
              </div>
            </div>
            <div class="modal-footer justify-content-evenly fs-5">
            <!-- Modal footer with error button for downloading error details -->';
        echo '  <span class="center-all">
                          Please save this message and contact the developer.<br>
                          <button class="btn btn-lg btn-secondary text-nowrap mt-3 mb-2" onclick="downloadError(\'forScreenshot\')">Download Message</button>
                          <button type="button" class="btn btn-lg btn-danger mt-3 mb-3" data-bs-dismiss="modal" aria-label="Close">Close</button>
                      </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Script to capture the screenshot -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
      <!-- Script for downloading error details -->
      <script src="../js/downloadDetails.js" defer></script>
    </body>
    </html>';
    }
    $conn = null;
}
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
              <a class="nav-link" href="#">Edit Reservations</a>
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
          <h1 class="container-fluid px-4 mt-4">Edit Reservations</h1>
          <div class="container-fluid px-4">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Reservations
              </div>
              <div class="card-body bg-success bg-light bg-dark-subtle bg-gradient">
                <div class="card container p-5 my-5 rounded-5 text-dark text-center bg-body-secondary bg-gradient">
                  <div class="card-body rounded-5 border border-secondary-subtle bg-body-tertiary bg-gradient">
                    <h2 class="card-title p-0 pb-2 m-0 display-5">Reservation Editing</h2><hr>
                    <div class="p-3 m-3">
                      <div class="row g-3">
                        <form class="text-center" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="POST">
                          <div>
                            <label for="Reservation_ID" class="form-label col-form-label-lg">Reservation ID</label>
                            <input type="number" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_ID" placeholder="Reservation ID" aria-label="Reservation ID" name="Reservation_ID" value="<?php echo $Reservation_ID; ?>">
                          </div>
                          <div>
                            <label for="Status" class="form-label col-form-label-lg">Status</label>
                            <!-- <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Status" placeholder="Status" aria-label="Status" name="Status" value="<?php echo $Status; ?>"> -->
                            <select class="form-select form-select-lg text-center border border-secondary-subtle" id="Status" name="Status" value="<?php echo $Status; ?>">
                              <option value="Pending">Pending</option>
                              <option value="Approved">Approved</option>
                              <option value="Rejected">Rejected</option>
                            </select>
                          </div>
                          <div>
                            <label for="Customer_First_Name" class="form-label col-form-label-lg">First Name</label>
                            <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Customer_First_Name" placeholder="First Name" aria-label="First Name" name="Customer_First_Name" value="<?php echo $Customer_First_Name; ?>">
                          </div>
                          <div>
                            <label for="Customer_Last_Name" class="form-label col-form-label-lg">Last Name</label>
                            <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Customer_Last_Name" placeholder="Last Name" aria-label="Last Name" name="Customer_Last_Name" value="<?php echo $Customer_Last_Name; ?>">
                          </div>
                          <div>
                            <label for="Number_Of_Guests" class="form-label col-form-label-lg">Guest Quantity</label>
                            <input type="number" class="form-control form-control-lg border border-secondary-subtle" id="Number_Of_Guests" placeholder="Number of Guests" aria-label="- Number of Guests -" name="Number_Of_Guests" value="<?php echo $Number_Of_Guests; ?>">
                          </div>
                          <div>
                            <label for="Customer_Phone" class="form-label col-form-label-lg">Phone Number</label>
                            <input type="tel" class="form-control form-control-lg border border-secondary-subtle" id="Customer_Phone" placeholder="Phone Number" aria-label="Phone Number" name="Customer_Phone" value="<?php echo $Customer_Phone; ?>">
                          </div>
                          <div>
                            <label for="Reservation_Date" class="form-label col-form-label-lg">Date</label>
                            <input type="date" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_Date" aria-label="Date" name="Reservation_Date" value="<?php echo $Reservation_Date; ?>">
                          </div>
                          <div>
                            <label for="Reservation_Time" class="form-label col-form-label-lg">Time</label>
                            <input type="time" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_Time" aria-label="Time" name="Reservation_Time" value="<?php echo $Reservation_Time; ?>">
                          </div>
                          <div>
                            <label for="Submitted_Reservation" class="form-label col-form-label-lg">Submitted On</label>
                            <input type="datetime-local" class="form-control form-control-lg border border-secondary-subtle" id="Submitted_Reservation" aria-label="Submitted Reservation Date" name="Submitted_Reservation" value="<?php echo $Submitted_Reservation; ?>">
                          </div>
                          <div class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-lg btn-success bg-gradient mt-3 mb-1" name="submit" id="submit">Submit Edit</button>
                            <button type="button" class="btn btn-lg btn-danger bg-gradient mt-3 mb-1" name="back" id="back" onclick="window.location.href='index.php';">Back</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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