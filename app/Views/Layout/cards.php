<?php

function showCard($nameCard,$clientName,$valid,$number){
    echo '    <div class="card-container">
        <h1 class="name-card">'. $nameCard . '</h1>
        <p class="clientName-card">Cliente:'. $clientName . '</p>
        <p class="valid-card">Invalid:'. $valid . '</p>
        <p class="number-card">'. $number . '</p>
    </div>';
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cards.module.css">
    <title>Document</title>
</head>
<body>
</body>
</html>