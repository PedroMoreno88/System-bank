
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
