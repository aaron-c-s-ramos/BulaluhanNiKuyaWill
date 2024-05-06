<?php
$servername = "localhost";
$port = 3307;
$username = "root";
$password = "";
$dbName = "bulaluhan_ni_kuya_will";

try
{
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo "Connection Failed: ". $e->getMessage() . "<br>";
    echo "Connection Failed: ". $e->getTraceAsString() . "<br>";
}
