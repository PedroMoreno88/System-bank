<?php
include "../../Config/database.php";
include '../../app/Views/Layout/cards.php';
$userName = "Maria";

if($conn->connect_error){
    die("Falha ao conectar com o banco: " . $conn->connect_error);
}

// Inicializar variáveis com valores padrão
$cardNumber = "No card found";
$cardValid = "N/A";
$cardName = "No name";
$nameClient = "No client";

// Preparar e executar a consulta SQL
$query = $conn->prepare("SELECT cardNumber, CardValid, CardName, nameClient FROM card WHERE nameClient = ?");
$query->bind_param("s", $userName);
$query->execute();
$result = $query->get_result();

// Verificar se houve resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cardNumber = $row['cardNumber'];
        $cardValid = $row['CardValid'];
        $cardName = $row['CardName'];
        $nameClient = $row['nameClient'];

        // Chamar a função showCard para cada linha de resultado
    }
} else {
    echo "Nenhum cartão encontrado para o cliente $userName";
}

// Fechar a conexão
$conn->close();

// Inclua as views depois que as variáveis estiverem definidas e a função showCard for chamada
include '../../app/Views/Layout/sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/Views/Layout/ahref.module.css">
    <link rel="stylesheet" href="../../app/Views/Layout/cards.module.css">
    <link rel="stylesheet" href="../../app/Views/Layout/sidebar.module.css">
    <title>Bank</title>
</head>
<body>

    <div class="cards">
        <?php

showCard($cardName, $nameClient, $cardValid, $cardNumber);


        ?>
    </div>

</body>
</html>
