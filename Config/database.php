<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bank";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (!$conn->select_db($dbname)) {
    die("Erro ao selecionar o banco de dados: " . $conn->error);
}
?>
</body>
</html>