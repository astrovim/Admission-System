<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$Querysult = array();
$use="";
$pass = "";

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("SELECT * FROM ADMIN WHERE USERNAME='$username'");

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $Querysult = $result;

    foreach ($Querysult as $val){
        $use = $val['USERNAME'];
    }

    foreach ($Querysult as $Que){
        $pass = $Que['PASSWORD'];
    }
    
    if($username==$use && $password==$pass){        
        $_SESSION['username'] = $username;
        header('Location: Home.php');
    }else {
        header('Location: Login.php?credentials=Invalid Credentials!');
        session_destroy();
    }

?>