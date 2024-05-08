<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]))
{
    $search = clean_input($_POST['search']);

    try
    {
        $sql = "SELECT * FROM current_reservations WHERE Reservation_ID = :Reservation_ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Reservation_ID', $search, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (is_array($row))
            {
            $Reservation_ID = $row['Reservation_ID'];
            }
        }
        else
        {
            $Reservation_ID = -1;
        }
    }
    catch (Exception $e)
    {
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
                                echo $sql . '<br>' . $e->getMessage().'<br>';
                                echo '<hr>';
                                echo $sql . '<br>' . $e->getTraceAsString().'<br>';
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
    $conn = null;
}