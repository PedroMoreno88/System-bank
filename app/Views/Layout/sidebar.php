<?php
include 'ahref.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.module.css">
    <title>Document</title>
        <script>
function closeSidebar(){
    var sidebar = document.getElementById('sidebar');
    var buttonClose = document.getElementById('button-close-sidebar');

    sidebar.classList.toggle("closed");
    buttonClose.classList.toggle("Open")

    if(buttonClose.classList.contains('Open')){
        buttonClose.textContent = "➤"
    }
    else{
        buttonClose.textContent = "╳"

    }
}
    </script>
</head>
<body>
    <div class="sidebar-container" id="sidebar">
        
        <button type="submit" onclick="closeSidebar()" id="button-close-sidebar">╳</button>

        <div class="profile-sidebar">
            <h1>
                <?php

                echo $_SESSION['username'];

                ?>
            </h1>
            <a href="" class="ahref-sidebar"><img src="../../public/assents/perfil.jpeg" alt="" class="sidebar_img"></a>
            <p class="balance">    
                <?php

                echo 'Saldo:' . $_SESSION['user_balance'];

                ?>
            </p>
        </div>

        <div class="options-sidebar">

        <?php
            createAhref("Home", "home");
            createAhref("Historic", "historic");
            createAhref("Info", "profile.php");
            createAhref("Logout", "/System-Bank/public/pages/login.php");
        ?>

        </div>

    </div>

    <div class="cards-container">
        
    </div>
</body>
</html>