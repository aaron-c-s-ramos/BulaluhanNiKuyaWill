<?php
session_start();

if(!isset($_SESSION['Username']) && !isset($_SESSION['Password']))
{
	header("location:login.php");
    exit();
}
