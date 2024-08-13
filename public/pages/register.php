<?php
    include "../../Config/database.php";

    if($conn->connect_error){
        die("Falha na conexao:" . $conn->connect_error);
    }
        $msg = "";
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register-button"])){
        $name = $_POST["name"] ?? "";
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        $query = $conn->prepare("INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)");
        $query->bind_param("sss", $name,$email,$password);
        $result = $query->execute();

        $query->close();
        $conn->close();

        if($result){
            $msg =  "Login feito com sucesso!";
           }
    
        
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registe.module.css">
    <title>d</title>
</head>
<body>
    <div class="container-register">
        <form action="" method="POST" class="form-register">

            <h1 class="form-register_title">Register</h1>
            <label for="name" class="name-form_label">Name</label>
            <input type="text" class="name-form_input" name="name" >

            <label for="email" class="email-form_label">Email</label>
            <input type="text" class="email-form_input" name="email" >

            <label for="password" class="password-form_label">Password</label>
            <input type="text" class="password-form_input" name="password">
            <?php
            
            echo '<p>' . htmlspecialchars($msg) . '</p>'
            ?>
            <button type="submit" name="register-button" class="register-button">Register</button>

        </form>
    </div>

</body>
</html>
