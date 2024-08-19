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
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.module.css">
    <title>Document</title>
</head>
<body>

    <div class="container-profile">
        <h1 class="name_title">
        <?php
            echo 'Welcome the your profile ' . $_SESSION['username'];
        ?>
        </h1>
        <p>

        </p>
        <p>
        <?php
            echo 'Email: ' . $_SESSION['email'];
        ?>
        </p>
        <p>
        <?php
           echo 'agencia:' . $_SESSION['user_id'];
        ?>
        </p>
        <input type="submit" value="voltar" name="backtohome">
    </div>
</body>
</html>