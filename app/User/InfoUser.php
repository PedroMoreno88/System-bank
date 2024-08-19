<?php


function getInfo($id, $name, $balance, $email, $password) {

    include '../../Config/database.php';

    $query = $conn->prepare("SELECT * from users where id = ?");
    $query->bind_param("s", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $balance = $row['saldo'];
            $email = $row['email'];
            $password = $row['password'];   
            
        }
    }
}

function getBalance($nameClient) {
    include '../../Config/database.php';

    $query = $conn->prepare("SELECT saldo from users where name = ?");
    $query->bind_param("s", $nameClient);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo 'Saldo:' . $row['saldo'];
    }
}
?>