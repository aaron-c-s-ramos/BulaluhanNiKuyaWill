<?php
// Define the server name, port, username, password, and database name
$servername = "localhost"; // The server where the database is hosted
$port = 3307; // The port number on which the database server is listening
$username = "id22124684_root"; // The username for database access
$password = "KUYAWILLbulaluhan1!"; // The password for database access
$dbName = "id22124684_bulaluhan_ni_kuya_will"; // The name of the database to connect to

try
{
  // Attempt to create a new PDO instance for database connection
  $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbName", $username, $password);
  
  // Set the error mode to throw exceptions for errors
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Set the default fetch mode to return results as associative arrays
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
  // Disable emulation of prepared statements if the driver supports them
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch (Exception $e)
{
  // If there's an error during connection, display the error message and stack trace
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
          <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <!-- Container for the screenshot content -->
              <div id="forScreenshot">
                <div class="modal-header d-flex justify-content-center">
                  <svg class="bi flex-shrink-0 me-2" width="1.5rem" height="1.5rem" role="img" aria-label="Danger:" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
                  <h1 class="modal-title fs-3" id="errorModalLabel">Error: Connection Failed</h1>
                </div>
                <div class="modal-body fs-5">
                <!-- Error details to be displayed -->
                  <span>
                    <!-- PHP code to echo SQL error and stack trace -->';
                    echo $e->getMessage() . '<br>';
                    echo '<hr>';
                    echo $e->getTraceAsString() . '<br>';
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
