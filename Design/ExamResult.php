<?php

session_start();
$_SESSION['CURRENT']="ER";

$ID = $_POST['ExamResRef'];
$PassOrFail = $_POST['ExamineePF'];

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("UPDATE STUDENTINFOTEMP SET PASSFAIL=? WHERE ID = $ID");


    $statement->execute([$PassOrFail]);

    header('Location: AdmissionSched.php');

?>
