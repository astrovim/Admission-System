<?php

session_start();
$adName=$_SESSION['FullName'];
$Querysult = array();
$QueryID = array();
if(isset($_POST['selectID'])){
    $ID = $_POST['selectID'];
}
    
try {
    $IDconnection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statementID = $IDconnection->prepare("SELECT ID FROM STUDENTINFOTEMP WHERE PASSFAIL='PASSED'");
    $statementID->execute();
    $IDresult = $statementID->fetchAll(PDO::FETCH_ASSOC);
    $QueryID = $IDresult;

    // foreach ($QueryID as $val){
    //     $ID = $val['ID'];
    // }

    if(isset($_POST['selectID'])){
        $ID = $_POST['selectID'];
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
            } catch (PDOException $e) {
                die('Could not connect.');
            }
        
            $statement = $connection->prepare("SELECT LASTNAME,FIRSTNAME,MIDDLENAME FROM STUDENTINFOTEMP WHERE ID=?");
        
            $statement->execute([$ID]);
        
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            $Querysult = $result;  
    
            foreach ($Querysult as $val){
                $last = $val['LASTNAME'];
                $first = $val['FIRSTNAME'];
                $middle = $val['MIDDLENAME'];
            }
    }    
 
?>

<!DOCTYPE html>
<head>
    <link rel="text/css" href="css/materialize.min.css" media="screen,projection">       
    <link rel="stylesheet" href="ValStyle.css" type="text/css" media="screen,projection">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEU-IS: Administrator</title>
    <link rel="neu icon" href="rsrc/neu_logo.png">

    <script type="text/javascript">
    function regAppear(){
    var a=document.getElementById("selectID");
    var distext=a.options[a.selectedIndex].value;
    if (distext != "default") {
        document.getElementById('regForm').style.display = 'inline';
    }
    else {
        document.getElementById('regForm').style.display = 'none';
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
           <div class="header"> Validation </div> 
           <div class="">
               <form action="" method="POST">
                <div>
               <select id="selectID" name="selectID" onchange="regAppear();" required>
                <option value="default">--Select Student No--</option>
                <?php 
                    foreach($QueryID as $CurrName){
                        echo '<option value="'.$CurrName['ID'].'">' . $CurrName['ID'] . '</option>';
                    }                
                ?>
                </select>
                <span id="regForm" style="display:none">
                <button class="btn" type="submit" name="selectBtn">View</button>
                </span>
               
                </div>                
                <!-- <div class="input-field">                    
                    <label class='input-label' for="lastName">Lastname</label> 
                    <input id="lastName" name="lastName" type="text" required>    
                </div> -->
               </form>
               <form action="Validate.php" method="POST"  onsubmit="return confirm('Are you sure you want to validate?')">
                <div id="" style="<?php echo (isset($ID)) ? 'display:block' :'display:none' ?>">
                    <span style="display:inline-block"> 
                    <div>
                        <div>
                        <label for="IdTxt">Student No.</label>
                        </div>               
                        <input type="text" id="IdTxt" name="IdTxt" value="<?php if(isset($ID)) echo $ID ?>" disabled>
                        <input type="hidden" value="<?php if(isset($ID)) echo $ID ?>" name="ValidID" />
                        </span>
                        </div>
                        <span style="display:inline-block">
                        <div>
                        <label for="lastTxt">Lastname</label>
                        </div>  
                        <input type="text" id="lastTxt" value="<?php if(isset($last)) echo $last ?>" disabled>
                        </span>
                        <span style="display:inline-block">
                        <div>
                        <label for="firstTxt">Firstname</label>
                        </div>  
                        <input type="text" id="firstTxt" value="<?php if(isset($first)) echo $first ?>" disabled>
                        </span>
                        <span style="display:inline-block">
                        <div>
                        <label for="middleTxt">Middlename</label>
                        </div>  
                        <input type="text" id="middleTxt" value="<?php if(isset($middle)) echo $middle ?>" disabled>
                        </span>
                        <span style="display:inline-block">
                        <button class="btn" type="submit" name="valBtn">Validate</button>
                        </span>

                        <!-- <label for="idTxt">Student No.</label>
                        <input type="text" id="IdTxt" value="<?php if(isset($ID)) echo $ID ?>" disabled>
                        <input type="text" id="lastTxt" value="<?php if(isset($last)) echo $last ?>" disabled>
                        <input type="text" id="firstTxt" value="<?php if(isset($first)) echo $first ?>" disabled>
                        <input type="text" id="middleTxt" value="<?php if(isset($middle)) echo $middle ?>" disabled>
                        <button class="btn" type="submit" name="valBtn">Validate</button> -->
                </div>
               </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>