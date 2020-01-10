<?php
session_start();
$username = $_SESSION['username'];
$Querysult = array();
$adName="";

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("select FULLNAME from ADMIN where username='$username'");

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $Querysult = $result;

    foreach ($Querysult as $val){
        $adName = $val['FULLNAME'];
    }

    $_SESSION['FullName']=$adName;
    
?>

<!DOCTYPE html>
<head>
    <link rel="text/css" href="css/materialize.min.css" media="screen,projection">
    <link rel="stylesheet" href="homeStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEU-IS: Administrator</title>
    <link rel="neu icon" href="rsrc/neu_logo.png">
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="adminName">
                <div><?php echo $adName; ?></div>
                <div class="adminLabel">Admin</div>
            </div>            
            <ul>
                <li><a href="Curriculums.php">Curriculums</a></li>
                <li><a href="Requirements.php">Requirements</a></li>
                <li><a href="AdmissionSched.php">Admission Schedule</a></li>
                <li><a href="Registration.php">Registration</a></li>
                <li><a href="Validation.php">Validation</a></li>
                <li><a href="StudInfoManagement.php">Student Info Management</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
           <div class="header">Admission</div> 
           <div class="notice">
            <div><strong>NOTICE:</strong><br>Please note that every activity is monitored. For any problem in the system, contact System Administrator for details. Click the link on the SIDE MENU to select operation. It is recommended to logout after using the system everytime you leave your PC<br><br> IF YOU DO NOT AGREE WITH THE CONDITIONS OR YOU ARE NOT AN ADMIN, PLEASE LOGOUT. </div></div>
           </div>
        </div>
    </div>
</body>
</html>