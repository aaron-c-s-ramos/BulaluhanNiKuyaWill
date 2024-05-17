<?php
include("conn.php");

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

    try {
        $sql = "UPDATE current_reservations
                SET Customer_First_Name = :Customer_First_Name, Customer_Last_Name = :Customer_Last_Name, Number_Of_Guests = :Number_Of_Guests, Customer_Phone = :Customer_Phone, Reservation_Date = :Reservation_Date, Reservation_Time = :Reservation_Time, Status = :Status
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
        $stmt->execute();
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
<html>
  <head>
    <!-- Include common head elements from a separate PHP file -->
    <?php require_once ("../head.php"); ?>
    <link rel="icon" href="../public/favicon.ico" type="icon/ico" sizes="256x256"/>
    <link rel="stylesheet" href="../styles/style.css" title="…"/>
    <!-- Include database connection and utility functions -->
    <!-- Link to the main stylesheet for this page -->
    <link href="../styles/reservation.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Navigation bar included from a separate PHP file -->
    <?php require_once ("../navBar.php"); ?>
    <div class="home-container">
      <!-- Main banner section -->
      <div class="mainBanner" id="mainBanner" name="mainBanner">
        <div class="spinner-grow text-secondary position-absolute top-50 start-50 translate-middle" id="spinner" role="status"></div>
        <div id="bgImage" class="bgImage visually-hidden"></div>
      </div>
      <!-- Food menu modal included from a separate PHP file -->
      <?php require_once ("../foodMenuModal.php"); ?>
    </div>
    <!-- Placeholder background -->
    <div class="reserve-container"></div>
  <!-- Script to show a success modal upon submitting the form -->
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function()
      {
        // Create a new Bootstrap modal instance for success display
        var successModal = new bootstrap.Modal(document.getElementById('successModal'), {});
        // Show the success modal immediately
        successModal.show();
      });
    </script>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <!-- Container for the screenshot content -->
          <div id="forScreenshot">
            <div class="modal-header d-flex justify-content-center">
              <h1 class="modal-title text-uppercase fs-3 text-center" id="successModalLabel">Thank you for booking!</h1>
            </div>
            <div class="modal-body fs-5">
            <!-- Success details to be displayed -->
              <span class="text-center">
              You have successfully edited your information.<br>
              Please double check your edited information by going to the View Reservations tab.
              </span>
            </div>
          </div>
          <div class="modal-footer justify-content-evenly fs-5">
          <!-- Modal footer with error button for downloading error details -->
            <span class="text-center">
              <div class="col-md-12">
                <button type="button" class="btn btn-lg btn-danger mt-3 mb-3" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='/';">Close</button>
              </div>
            </span>
          </div>
        </div>
      </div>
    </div>
    <?php require_once ("../footer.php"); ?>
    <!-- Script to capture the screenshot -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <!-- JavaScript for loading placeholder for cover banner -->
    <script src="../js/loading.js" defer></script>
    <!-- JavaScript for the scroll to top floating button -->
    <script src="../js/scrollTop.js" defer></script>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>