<?php

class Modelo extends Conexion{

public function importar()
    {
        $configFile = fopen("tareas.csv", "r") or die("Unable to open file!");
        while (!feof($configFile)) {
            $connData = fgetcsv($configFile);
            $query = "INSERT INTO `tareas`(`titulo`,`descripcion`,`fecha_creacion`,`fecha_vencimiento`) VALUES ( '$connData[1]', '$connData[2]', '$connData[3]', '$connData[4]')";
            $result = mysqli_query($this->conn, $query);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } 
    }
public function deleteList()
    {
        $query = "DELETE FROM `tareas`";
        $result = mysqli_query($this->conn, $query);
    }
public function init()
    {
        $this->deleteList();
        $query = "SELECT COUNT(*) FROM tareas;";
        $result = mysqli_query($this->conn, $query)->fetch_row()[0];
        if($reault[0] == 0){
        $this->importar();
        }
    }



     
}
?>