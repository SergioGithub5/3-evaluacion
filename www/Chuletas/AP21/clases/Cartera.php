<?php

class Cartera
{
    private $clients = [];


    public function getClient($id)
    {
        foreach ($this->clients as $client) {
            if ($client->getId() == $id)
                return $client;
        }
        return new Empresa(null, null, null, null, null);
    }

   

    public function delete($id)
    {
       
    }

    public function update($datos)
    {
        $id = $_POST["id"];
        $company = $_POST["company"];
        $investment = $_POST["investment"];
        $date = $_POST["date"];
        $active = $_POST["active"];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "INSERT INTO `Investment`(`id`,`company`,`investment`,`date`,`active`) VALUES ('$id', '$company', '$investment', '$date', '$active')";
        $result = mysqli_query($conn, $query);
    }

   

    public function insert($datos)
    {

    }

    public function drawList()
    {
        $conn = new mysqli('db', 'root', 'test', "AP21");
                
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * From Investment";
        $result = $conn->query($query);

        echo '<table class="table table-striped">';
        echo '<tr>
                <th>Id</th>
                <th>Company</th>
                <th>Investment</th>
                <th>Date</th>
                <th>Active</th>
                <th colspan="2">Actions</th>
            </tr>';
        while($value = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<tr>';
            foreach($value as $element){
                echo '<td>' . $element . '</td>';
            }

            echo '</tr>';
        }
        echo '</table>';

        $result->close();
        mysqli_close($conn);
    }
}
?>