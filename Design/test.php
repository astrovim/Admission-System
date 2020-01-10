<!-- <?php
session_start();
$username = 'alca';
$password = 'baza';
$valid = array();
$testing = "";
try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("select * from ADMIN where username='$username'");

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $valid = $result;
    // echo '<pre>';
    // die(var_dump($result));
    // echo '</pre>';

    foreach ($valid as $val){
        $testing = $val['PASSWORD'];
    }

    $_SESSION['username'] = $testing;

    echo $_SESSION['username'];
    // echo $testing;


?> -->

<?php
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<script type="text/javascript">
function testCheck() {
    if (document.getElementById('check').checked) {
        document.getElementById('testing'). = true;
    }
}
</script>
</head>
<body>

<!-- <input id="check" type="checkbox" onclick="testCheck();">

<form action="Login.php">

<input id="testing" type="text">

<input type="submit">


</form> -->
<!-- <?php

if (isset($_POST['level'])) {
    $post = $_POST['level'];    
    echo "$post";
} else {    
    echo "N0";
}

?>

<form action="" method ="POST">
<select id="level" name="level" >
                <option value="default">--Select Education Level--</option>
                <?php 
                    foreach($Querysult as $CurrName){
                        echo '<option value="'.$CurrName['CURRNAME'].'">' . $CurrName['CURRNAME'] . '</option>';
                    }                
                ?>
</select>
<input type="submit">

</form> -->

<?php 

if (isset($_POST['Citizenship'])) {
    $Citizenship = $_POST['Citizenship'];
    $Citizen = "";
$Citizenship=='FILIPINO'? $Citizen=$Citizenship : $Citizen='foreign' ;
$VisaType = $_POST['VisaType'];
$VisaIssuedIn = $_POST['VisaIssuedIn'];
$VExpiration = $_POST['VExpiration'];
$PassportNo = $_POST['PassportNo'];
$PIssuedin = $_POST['PIssuedin'];
$PExpiration = $_POST['PExpiration'];
$CompleteAddress = $_POST['CompleteAddress'];
$ContactNo = $_POST['ContactNo'];

echo "$Citizen,$VisaType,$VisaIssuedIn,$VExpiration,$PassportNo,$PIssuedin,$PExpiration,$CompleteAddress,$ContactNo"; 

} else {    
    echo "N0";
}

?>

<form action="" method="POST" onsubmit="return confirm('Are you sure you want to submit?')")>

<li>
                        <input type="radio" id="FILIPINO" onclick="javascript:PinoyCheck();" name="Citizenship" value="FILIPINO" >FILIPINO
                        <input type="radio" id="NONFILIPINO" onclick="javascript:PinoyCheck();" name="Citizenship" value="NON FILIPINO">NON FILIPINO
                    </li>
                    <div id="ifNONFil">
                        <li>
                        <input id="NonFil" name="NonFil" type="text" placeholder="(Specify Citizenship)" > 
                        </li>
                        <li>
                        <input id="VisaType" name="VisaType" type="text" placeholder="Visa Type" > 
                        Issued in: <input id="VisaIssuedIn" name="VisaIssuedIn" type="date" > 
                        Expiration: <input id="VExpiration" name="VExpiration" type="date" > 
                        </li>
                        <li>
                        <input id="PassportNo" name="PassportNo" type="text" placeholder="Passport No#" > 
                        Issued in: <input id="PIssuedin" name="PIssuedin" type="date" > 
                        Expiration: <input id="PExpiration" name="PExpiration" type="date" > 
                        </li>
                    </div>
                    <li id ="ifFIL">
                        <input id="CompleteAddress" name="CompleteAddress" type="text" placeholder="Complete Address" >
                        <input id="ContactNo" name="ContactNo" type="text" pattern="^\d+(?:-\d+)*$" maxlength="11" placeholder="Contact No#" >
                    </li>

                    <li>
                    <input type="submit">
                    </li>

</form>

<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>