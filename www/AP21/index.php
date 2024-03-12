<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Document</title>
	<style>
		nav{
			background-color: lightgrey;
			height: 40px;
			margin-bottom: 15px;
			text-align:center;
			padding: 5px;
			font-size: 20px;
			font-family: "Times New Roman";
		}
	</style>
</head>

<body>
	<nav>CONSULTA DE EMPRESAS</nav>
	<?php
			require_once "autoloader.php";
	        $conn = new mysqli('db', 'root', 'test', "AP21");
                
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
	
			$query = "SELECT * From Investment";
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
			mysqli_close($conn);
	?>

	<a href ="index.php?pag=<?= $pag -1 ?>"> Anterior </a>
	<?php 
	for($i = 1; $i <= $paginas; $i++){
		echo '<a href ="index.php?pag= '. $i . '"> ' . $i . ' </a>';
	} 
	?>
	<a href ="index.php?pag=<?= $pag +1 ?>"> Siguiente </a>
</body>

</html>