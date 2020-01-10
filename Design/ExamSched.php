
<?php

session_start();
$_SESSION['CURRENT']="ES";

$ID = $_POST['ExamSchedRef'];
$ExamSched = $_POST['ExamSched'];

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("UPDATE STUDENTINFOTEMP SET EXAMSCHED=? WHERE ID = $ID");


    $statement->execute([$ExamSched]);

    header('Location: AdmissionSched.php');

?>