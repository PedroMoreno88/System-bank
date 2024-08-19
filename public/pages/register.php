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

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->prepare("INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)");
        $query->bind_param("sss", $name,$email,$hashed_password);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">    <title>d</title>
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
            <p>You have a account? <a href="login.php">go to login</a></p>
            <?php
            
            echo '<p>' . htmlspecialchars($msg) . '</p>'
            ?>
            <button type="submit" name="register-button" class="register-button">Register</button>

        </form>
    </div>

</body>
</html>
