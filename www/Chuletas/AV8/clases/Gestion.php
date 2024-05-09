<?php
class Gestion extends Conexion
{
    public function getBrands()
    {
        $stmt = $this->conn->prepare('SELECT * FROM brands');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $brands = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $input = "";
            foreach ($brands as $brand) {
                $input .= " <input type='checkbox' value='" . $brand['brandId'] . " 'name='" . $brand['brandName'] . "'>" . $brand['brandName'] . "<br>";
            }
            return $input;
        } 
        else {
            $stmt->close();
            return NULL;
        }
    } 
}
?>