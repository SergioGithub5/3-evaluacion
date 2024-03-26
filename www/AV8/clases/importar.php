<?php
Class Importar extends Conexion {

    public function customers(){
        $configFile = fopen("customers.csv", "r") or die("Unable to open file!");
        while (!feof($configFile)) {
            $connData = fgetcsv($configFile, NULL, "#");
            $stmt = $conn->prepare("UPDATE `customers` SET `customerName` = ? WHERE customerId = ?");
            $stmt->bind_param("ss", $customerName, $customerId);
            $customerName = "$connData[1]";
            $customerId = "$connData[0]";
            $stmt->execute();
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } 
    }

}
?>