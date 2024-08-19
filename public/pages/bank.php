<?php
    
    session_start();
    if (!isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === "sim") 
    {
        echo "Sessão não autenticada";
        header("Location: login.php?error=login2");
    } 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "../../Config/database.php";
include '../../app/Views/Layout/cards.php';
include '../../app/Views/Layout/sidebar.php';
include_once '../../app/User/InfoUser.php';


$username = ($_SESSION['username']);

if($conn->connect_error){
    die("Falha ao conectar com o banco: " . $conn->connect_error);
}


$cardNumber = "";
$cardValid = "N/A";
$cardName = "No name";
$nameClient = "No client";


$query = $conn->prepare("SELECT `cardNumber`, `cardValid`, `cardName`, `nameClient`, `userId` FROM `card` WHERE userId = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cardNumber = $row['cardNumber'];
        $cardValid = $row['CardValid'];
        $cardName = $row['CardName'];
        $nameClient = $row['nameClient'];

        
    }
}



$conn->close();
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
