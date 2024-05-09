<?php
require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();
$id = $_GET['id'];
$query = "DELETE FROM `Investment` WHERE id='$id'";
mysqli_query($conn, $query);
header("location: index.php");
?>