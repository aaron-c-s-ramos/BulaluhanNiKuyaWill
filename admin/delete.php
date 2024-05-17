<?php
require_once("connection.php");
try
{
    $deleteID = $_GET["deleteID"];

    $sql = "DELETE FROM current_reservations WHERE Reservation_ID = :Reservation_ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Reservation_ID', $deleteID, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: index.php");
}
catch (Exception $e)
{
    echo $sql . "<br>" . $e->getMessage();
    echo $sql . "<br>" . $e->getTraceAsString();
}
$conn = null;
