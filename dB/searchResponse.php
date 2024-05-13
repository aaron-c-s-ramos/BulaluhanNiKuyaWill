<?php
// Check if the request method is POST and the submit button is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]))
{
  // Clean the input to prevent SQL injection
  $search = clean_input($_POST['search']);
  try
  {
    // Prepare SQL query to select reservation by ID
    $sql = "SELECT * FROM current_reservations WHERE Reservation_ID = :Reservation_ID";
    $stmt = $conn->prepare($sql);
    // Bind the parameter to the prepared statement
    $stmt->bindParam(':Reservation_ID', $search, PDO::PARAM_INT);
    // Execute the query
    $stmt->execute();
    // Check if any rows were returned
    if ($stmt->rowCount() > 0)
    {
      // Fetch the first row as an associative array
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // Check if the fetched row is an array
      if (is_array($row))
      {
        // Assign the Reservation_ID to a variable
        $Reservation_ID = $row['Reservation_ID'];
      }
    }
    else
    {
      // Set Reservation_ID to -1 if no match found
      $Reservation_ID = -1;
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
                  echo $sql. '<br>'. $e->getMessage().'<br>';
                  echo '<hr>';
                  echo $sql. '<br>'. $e->getTraceAsString().'<br>';
                  echo '
                </span>
              </div>
            </div>
            <div class="modal-footer justify-content-evenly fs-5">
            <!-- Modal footer with error button for downloading error details -->';
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
      <script src="../js/downloadError.js" defer></script>
    </body>
    </html>';
  }
  // Close the database connection
  $conn = null;
}