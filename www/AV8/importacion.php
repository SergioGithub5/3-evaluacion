<?php

require_once "autoloader.php";
new Importar("customers.csv");
$conn = $connection->getConn();