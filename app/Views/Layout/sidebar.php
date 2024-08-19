<?php
include 'ahref.php';
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
            <h1>Pedro</h1>
            <a href="" class="ahref-sidebar"><img src="../../public/assents/" alt="" class="sidebar_img"></a>
        </div>

        <div class="options-sidebar">

        <?php
            createAhref("Home", "home");
            createAhref("Transition", "transition");
            createAhref("Historic", "historic");
            createAhref("Info", "info");
            createAhref("Logout", "/System-Bank/public/pages/login.php");
        ?>

        </div>

    </div>

    <div class="cards-container">
        
    </div>
</body>
</html>