<?php
require_once "autoloader.php";
header("location: index.php");
$connection = new Empresa();
$conn = $connection->getConn();
$connection->changeStatus($_GET['id'], $_GET['status']);
