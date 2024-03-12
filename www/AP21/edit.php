<?php
require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();
$id = $_GET['id'];

$query = "SELECT * FROM Investment WHERE id='$id'";
$result = mysqli_query($conn,$query);
$client = $result->fetch_array(MYSQLI_ASSOC);

if (count($_POST) > 0) {
  $id = $_POST["id"];
  $company = $_POST["company"];
  $investment = $_POST["investment"];
  $date = $_POST["date"];
  $active = $_POST["active"];
  $query = "UPDATE Investment SET id = '$id', company = '$company', investment = '$investment', date = '$date', active = '$active' WHERE id='$id' ";
  mysqli_query($conn, $query);
  header("location: index.php");
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Inversión</title>
  <style>
  body {
  font-family: 'Times New Roman';
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  color: #333;
}

form {
  max-width: 400px;
  margin: 30px auto;
  background-color: #fff;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border: solid 2px;
}

label {
  display: block;
  margin-bottom: 10px;
  color: #333;
  font-weight: bold;
}

input,
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 2px solid black;
  border-radius: 4px;
  box-sizing: border-box;
}

select {
  height: 40px; 
}

input[type="submit"] {
  background-color: #4caf50;
  color: #fff;
  padding: 15px 15px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  font-size: 20px;
} 
</style>
</head>
<body>

  <h1>Formulario de Inversión</h1>

  <form action="edit.php?id=<?= $id ?>" method="post">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" value="<?= $client["id"] ?>" required><br>

    <label for="company">Company:</label>
    <input type="text" id="company" name="company" value="<?= $client["company"]  ?>" required><br>

    <label for="investment">Investment:</label>
    <input type="text" id="investment" name="investment" value="<?= $client["investment"]  ?>" required><br>

    <label for="date">Date:</label>
    <input type="text" id="date" name="date" value="<?= $client["date"]  ?>" required><br>

    <label for="active">Active:</label>
    <select id="active" name="active" value="<?= $client["active"]  ?>" required>
      <option value="1">Si</option>
      <option value="0">No</option>
    </select><br>

    <input type="submit" value="Editar">
  </form>

</body>
</html>

