<?php

$ment= $_POST['announce'];

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("UPDATE ANNOUNCEMENT SET ADMISSIONSCHED=? WHERE ID = '1'");


    $statement->execute([$ment]);

    // header('Location: ConfirmValidation.php');

?>