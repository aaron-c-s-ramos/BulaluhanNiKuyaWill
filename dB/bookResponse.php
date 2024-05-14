<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]))
{
  // Clean the input to prevent SQL injection
  $Reservation_ID = clean_input($_POST['Reservation_ID']);
  $Customer_First_Name = fix_name(clean_input($_POST['Customer_First_Name']));
  $Customer_Last_Name = fix_name(clean_input($_POST['Customer_Last_Name']));
  $Number_Of_Guests = clean_input($_POST['Number_Of_Guests']);
  $Customer_Phone = clean_input($_POST['Customer_Phone']);
  $Reservation_Date = clean_input($_POST['Reservation_Date']);
  $Reservation_Time = clean_input($_POST['Reservation_Time']);
  try
  {
    // Prepare SQL query
    $sql  = " INSERT INTO current_reservations (Reservation_ID, Customer_First_Name, Customer_Last_Name, Number_Of_Guests, Customer_Phone, Reservation_Date, Reservation_Time)
              VALUES (:Reservation_ID, :Customer_First_Name, :Customer_Last_Name, :Number_Of_Guests, :Customer_Phone, :Reservation_Date, :Reservation_Time)";
    $stmt = $conn->prepare($sql);
    // Bind the parameter to the prepared statement
    $stmt->bindParam(':Reservation_ID', $Reservation_ID, PDO::PARAM_INT);
    $stmt->bindParam(':Customer_First_Name', $Customer_First_Name, PDO::PARAM_STR);
    $stmt->bindParam(':Customer_Last_Name', $Customer_Last_Name, PDO::PARAM_STR);
    $stmt->bindParam(':Number_Of_Guests', $Number_Of_Guests, PDO::PARAM_INT);
    $stmt->bindParam(':Customer_Phone', $Customer_Phone, PDO::PARAM_INT);
    $stmt->bindParam(':Reservation_Date', $Reservation_Date);
    $stmt->bindParam(':Reservation_Time', $Reservation_Time);
    // Execute the query
    $stmt->execute();
    $sql  = "SELECT Reservation_ID, Status FROM current_reservations WHERE Customer_Phone = :Customer_Phone";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Customer_Phone', $Customer_Phone, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0)
    {
      // Fetch the first row as an associative array
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // Check if the fetched row is an array
      if (is_array($row)) {
        $Reservation_ID = $row['Reservation_ID'];
        $Status = $row['Status'];
        echo '
              <html>
              <head>
              </head>
              <body>
              <!-- Script to show a success modal upon submitting the form -->
                <script type="text/javascript">
                  document.addEventListener("DOMContentLoaded", function()
                  {
                    // Create a new Bootstrap modal instance for success display
                    var successModal = new bootstrap.Modal(document.getElementById(\'successModal\'), {});
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
                          <span class="text-center">';
                            echo 'Your reservation number is <b>'. $Reservation_ID .'</b>.<br><br>';
                            echo 'The status of your current reservation is <b>' . $Status . '</b>.<br><br>';
                            echo 'You will receive a <b>text confirmation</b> once your table booking has been <b>confirmed</b>.<br>';
                            echo '
                          </span>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-evenly fs-5">
                      <!-- Modal footer with error button for downloading error details -->';
                        echo '  <span class="text-center">
                                    Please save and download the details above.<br>
                                    <div class="col-md-12">
                                      <button type="button" class="btn btn-lg btn-success text-nowrap mt-3 mb-3" onclick="downloadDetails(\'forScreenshot\')">Download Details</button>
                                      <button type="button" class="btn btn-lg btn-danger mt-3 mb-3" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                    </div>
                                </span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Script to capture the screenshot -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
                <!-- Script for downloading submitted details -->
                <script src="js/downloadDetails.js" defer></script>
              </body>
              </html>';
      }
    }
  }
  catch (Exception $e)
  {
    // Output an error modal with details of the exception
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
          var successModal = new bootstrap.Modal(document.getElementById(\'successModal\'), {});
          // Show the error modal immediately
          successModal.show();
        });
      </script>
      <!-- Error Modal -->
      <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
          <!-- Container for the screenshot content -->
            <div id="forScreenshot">
              <div class="modal-header d-flex justify-content-center">
                <h1 class="modal-title fs-3" id="successModalLabel">Error: Connection Failed</h1>
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
            <!-- Modal footer for downloading error details -->';
              echo '  <span class="center-all">
                          Please save this message and contact the developer.<br>
                          <button class="btn btn-lg btn-secondary text-nowrap mt-3 mb-2" onclick="downloadError(\'forScreenshot\')">Download Message</button>
                      </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Script to capture the screenshot -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
      <!-- Script for downloading error details -->
      <script src="js/downloadDetails.js" defer></script>
    </body>
    </html>';
  }
  // Close the database connection
  $conn = null;
}