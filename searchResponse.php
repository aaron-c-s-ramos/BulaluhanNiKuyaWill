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
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function(){
                    var errorModal = new bootstrap.Modal(document.getElementById(\'errorModal\'), {});
                    errorModal.show();
                });
            </script>
            <div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="errorModalLabel">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <h1 class="modal-title fs-3" id="errorModalLabel">Error: Connection Failed</h1>
                        </div>
                        <div class="modal-body fs-5">
                            <span>';
                                echo $sql. '<br>'. $e->getMessage().'<br>';
                                echo '<hr>';
                                echo $sql. '<br>'. $e->getTraceAsString().'<br>';
                                echo '
                            </span>
                        </div>
                        <div class="modal-footer justify-content-evenly fs-5">';
                            echo '<span>Please save this message and contact the developer.</span>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>';
    }
    // Close the database connection
    $conn = null;
}
