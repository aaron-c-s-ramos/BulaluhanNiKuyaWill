<?php
include("connection.php");

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

if (isset($_GET["submit"]))
{
    $Reservation_ID        = $_GET['Reservation_ID'];
    $Customer_First_Name   = $_GET['Customer_First_Name'];
    $Customer_Last_Name    = $_GET['Customer_Last_Name'];
    $Number_Of_Guests      = $_GET['Number_Of_Guests'];
    $Customer_Phone        = $_GET['Customer_Phone'];
    $Reservation_Date      = $_GET['Reservation_Date'];
    $Reservation_Time      = $_GET['Reservation_Time'];
    $Status                = $_GET['Status'];
    $Submitted_Reservation = $_GET['Submitted_Reservation'];

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
