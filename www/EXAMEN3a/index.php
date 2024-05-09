<!DOCTYPE html>
<html lang="en">
<?php
			require_once "autoloader.php";
	        $conn = new mysqli('db', 'root', 'test', "stadium");
                
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

            
            $objetoEmpresa = new Empresa('lighting.csv');
			/* $query = "SELECT * From Investment";
			$result = $conn->query($query);
			$rows = mysqli_num_rows($result);
			$limit = 5;
			$paginas = ceil($rows/$limit);
			$pag = isset($_GET["pag"]) ? (int) $_GET["pag"] : 1;
			if($pag == 0){
				$pag = 1;
			}
		 	$firstreg = ($pag-1) * $limit;
			$query2 = "SELECT * FROM Investment limit $firstreg, $limit";
			$result2 = $conn->query($query2);

			echo '<table class="table table-striped">';
			echo "<tr>";
				echo '<th>Id</th>
					<th>Company</th>
					<th>Investment</th>
					<th>Date</th>
					<th>Active</th>
					<th colspan="3">Actions</th>
				</tr>';
			while($value = $result2->fetch_array(MYSQLI_ASSOC)){
				echo '<tr>';
				foreach($value as $element){
					echo '<td>' . $element . '</td>';
				}
            	echo "<td><a href='edit.php?id=" . $value["id"] .  "'><img src='edit_icon.png' width = '25'> </td>";
				echo "<td><a href='delete.php?id=" . $value["id"] .  "'><img src='del_icon.png' width = '25'> </td>";
				echo "<td><a href='add.php?id=" . $value["id"]  . "'><img src='perros-graciosos.png' width='50'></a></td>";
				echo '</tr>';
			}
			echo '</table>';
			$result->close();
			mysqli_close($conn); */
	?>
<head>
    <script src="ev3.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightcyan;
        }

        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
            background-color: lightgreen;
        }

        .element {
            display: inline-block;
            width: 100px;
            height: 120px;
            font-size: .6em;
            text-align: center;
            margin: 10px;
        }

        .element,
        .center {
            -moz-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            -webkit-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            border-radius: 10px;
            /*supported by all latest Browser*/
            -moz-border-radius: 10px;
            /*For older Browser*/
            -webkit-border-radius: 10px;
            /*For older Browser*/
            border: 3px solid navy;
        }

        .element img {
            width: 3em;
            vertical-align: middle;
        }

        .on {
            background-color: lightyellow;
        }

        .off {
            background-color: lightslategray;
        }

        h1 {
            font-size: 1.5em;
            text-align: center;
            background-color: black;
            color: azure;
        }

        form {
            text-align: center;
        }
        .light {
            height: 40px;
            width: 40px;
        }
        #imprescindible{
            background-color: rgb(144, 238, 144);
        }
        
    </style>
</head>

<body>
    <div class="center">
        <h1>BIG STADIUM - LIGHTING CONTROL PANEL</h1>
        <?= $objetoEmpresa->drawZonesOptions() ?>
        <div id="imprescindible">
        <p> La potencia en la zona norte es de: <?= $objetoEmpresa->powerZone()[0]?> </p>
       <p> La potencia en la zona sur es de: <?= $objetoEmpresa->powerZone()[1]?> </p>
       <p> La potencia en la zona este es de: <?= $objetoEmpresa->powerZone()[2]?> </p>
       <p> La potencia en la zona oeste es de: <?= $objetoEmpresa->powerZone()[3]?> </p>
    </div>
        <table>
        <?= $objetoEmpresa->drawLampsList() ?>
       <table>
</body>

</html>