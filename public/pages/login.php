
<?php
    include "../../Config/database.php";

    if($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    
    $msg = "";
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login_button"])){
       $username = $_POST["username"];
       $password = $_POST["password"];

       $query = $conn->prepare("SELECT * FROM users WHERE name = ? AND password = ?" );
       $query->bind_param("ss", $username, $password);
       $query->execute();
       

       $result = $query->get_result();
       $query->close();
       $conn->close();

  

       if($result->num_rows == 1){
        $msg = "Login feito com sucesso!";
       }
       else{
        $msg = "Login mal sucessido!"
       }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.module.css">
    <title>Bank</title>
</head>
<body>
<h1 class="title">Welcome the bank</h1>  

<div class="container-login">
    <form action="asd.com" method="POST" class="login-form">
    <h1 class="container-login_title">Login</h1>
            <label for="Login" class="login-form_label">Login</label>
            <input type="text" class="login-form_input" name="username" requerid>

            <label for="" class="password-form_label">Password</label>
            <input type="text" class="password-form_input" name="password" requerid>

            <p class="login-form_paragraph">You dont have an account? <a href="register.php">create here!</a></p>
            <?php
            
            echo '<p>' . htmlspecialchars($msg) . '</p>'
            ?>
            <input type="submit" value="Login" name="login_button" class="login_button">
        </form>
    </div>

</body>
</html>