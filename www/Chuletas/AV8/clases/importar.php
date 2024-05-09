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
            $stmt->close();
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } 
    }


    public function getBrandId($brand)
    {   
        if (!$brand == NULL) {
            $stmt = $this->conn->prepare('SELECT `brandId` FROM `brands` WHERE `brandName` = ? ');
            $stmt->bind_param("s", $brand);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0){
                $id = $result->fetch_assoc()['brandId'];
                $stmt->close();
                return $id;
            }else{
                $stmt->close();
                return NULL;
            }
        }
    }
    
public function brandCustomer()
{
    $file = fopen('customers.csv', "r") or die("Unable to open file!");
    while (!feof($file)) {
        $data = fgetcsv($file, NULL, '#');
        $customerId = $data[0];
        $brands = explode(', ', $data[2]);
        foreach ($brands as $brand) {
            if (!$brand == NULL) {
                $brandId = $this->getBrandId($brand);
                if (!$brandId == NULL) {
                    $stmt = $this->conn->prepare("INSERT INTO `brandCustomer` VALUES(?, ?) ");
                    $stmt->bind_param('ss', $customerId, $brandId);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
    }
}
}
?>