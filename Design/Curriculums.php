<?php

session_start();
$adName=$_SESSION['FullName'];

$Querysult = array();

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("select CURRNAME from CURRICULUM");

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $Querysult = $result;   
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
    <script>
        function currSelect(){
            var a=document.getElementById("level");
            var distext=a.options[a.selectedIndex].text;
            if(distext!='--Select Education Level--'){
            document.getElementById("textValue").value=distext;
            }else {
            document.getElementById("textValue").value="";
            }
        }
    </script>
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="adminName">
            <div><?php echo $adName; ?></div>
                <div>Admin</div>
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
           <div class="header">Curriculums</div> 
           <div class="Curr">
                <select id="level" onchange="currSelect();">
                <option value="default">--Select Education Level--</option>
                <?php 
                    foreach($Querysult as $CurrName){
                        echo '<option value="'.$CurrName['ID'].'">' . $CurrName['CURRNAME'] . '</option>';
                    }                
                ?>
                </select>
           </div>
           <div class="CurrContent">
               <input type="text" id="textValue">
           </div>
        </div>
    </div>
</body>
</html>