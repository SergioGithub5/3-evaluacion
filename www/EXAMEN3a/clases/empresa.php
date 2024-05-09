<?php
Class Empresa extends Connection {

    public function getModelId($modelName){
        $query = "SELECT model_id FROM lamp_models WHERE model_part_number = '$modelName'";
        $result = mysqli_query($this->conn, $query);
        $task = [];
        $task = $result->fetch_array();
        foreach ($task as $line) {
            return $line;
        }
    }
    public function getZoneId($zoneName){
        $query = "SELECT zone_id FROM zones WHERE zone_name = '$zoneName'";
        $result = mysqli_query($this->conn, $query);
        $task = [];
        $task = $result->fetch_array();
        foreach ($task as $line) {
            return $line;
        }
    }
    public function getOnId($lampOn){
        $light = 0;
        if ($lampOn == "on"){
            $light = 1;
        }
        else{
            $light = 0;
        }
        return $light;
    }
public function importLamps(){
    $ConfigFile = fopen("lighting.csv", "r") or die("Unable to open file!");
    $stmt = $this->conn->prepare('DELETE FROM lamps');
    $stmt->execute();
    while (!feof($ConfigFile)) {
        $data = fgetcsv($ConfigFile);
        $model = $this->getModelId($data[2]);
        $zone = $this->getZoneId($data[3]);
        $lampOn = $this->getOnId($data[4]);
        $query = "INSERT INTO lamps (lamp_id, lamp_name, lamp_model, lamp_zone, lamp_on)
         VALUES ('$data[0]', '$data[1]', '$model', '$zone', '$lampOn');";
        $result = mysqli_query($this->conn, $query);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } 
    }

public function getAllLamps(){
      /* $query = "SELECT * From lamps;";*/
    $query = "SELECT lamps.*, lamp_models.model_wattage From lamps JOIN lamp_models ON model_id = lamp_model ORDER BY lamps.lamp_id;";
    $result = mysqli_query($this->conn, $query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $result->close();
     return $rows; 
/*     var_dump($rows); */
} 

public function drawLampsList()
    {
        $tasks = $this->getAllLamps();
        $table = "";
        foreach ($tasks as $task) {
 
           $table.= "<div class='element, element off'>";
           $table.= "<h4><a href='changestatus.php?id=" . $task['lamp_id'] . "&status=" . $task['lamp_on'] . "'><img src='img/bulb-icon-off.png'></a>" . $task['lamp_name'] . "</h4>";
           $table.= "<h1>" . $task['model_wattage'] . " W</h1>";
           $table.= "<h4>" . $task['lamp_zone'] . "</h4>";
           $table.= "</div>";
        }
        echo $table;
    }

    public function changeStatus($id, $status){
        
        if($status == 0){
            $query = "UPDATE lamps SET lamp_on = 1 WHERE lamp_id = $id;";
            $stats = "on";
        }
        else{
            $query = "UPDATE lamps SET lamp_on = 0 WHERE lamp_id = $id;";
            $stats = "off";
        }
        return $stats;
    }


/* Es de las lamparas que no estan encendidas porque me salen todas apagadas */
 
    public function powerZone(){
        $lamps = $this->getAllLamps();
        $norte = 0;
        $sur = 0;
        $este = 0;
        $oeste = 0;
        $zones = [$norte, $sur, $este, $oeste];
        foreach($lamps as $lamp){
            if( $lamp['lamp_on'] == 0){
                $zones[$lamp['lamp_zone']-1] +=  $lamp['model_wattage'];
            }
        }
        return $zones;
    } 

    
 public function drawZonesOptions(){
    $table="";
    $table .= " <form action='' method='post'>";
    $table .= " <select name='filter'>";
    $table .= " <option value='all'>All</option>";
    $table .= " <option value='1'>Fondo Norte</option>";
    $table .= " <option value='2'>Fondo Sur</option>";
    $table .= " <option value='3'>Grada Este</option>";
    $table .= " <option value='4'>Grada Oeste</option>";
    $table .= " </select>";
    $table .= "<input type='submit' value='Filter by zone'>";
    $table .= "</form>";
    return $table;
}
}
        /* $table .= "<tr>";
           $table .= "<td>";
           $table .= "<div>";
           $table .= "<p><img class = 'light' src='img/bulb-icon-on.png'> Lamp id: " . $task['lamp_id'] . " Lamp name: " . $task['lamp_name'] . 
           " Lamp model: " . $task['lamp_model'] . " Lamp zone: " . $task['lamp_zone'] . " Light on: " . $task['lamp_on'] . "</p>";
           $table .= "</td>";
           $table .= "</tr>"; */
?>

