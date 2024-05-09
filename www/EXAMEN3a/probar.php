<?php
require_once "autoloader.php";

$connection = new Empresa();
$conn = $connection->getConn();
$connection->powerZone();