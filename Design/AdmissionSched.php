<?php

session_start();
$adName=$_SESSION['FullName'];
if(isset($_SESSION['CURRENT'])){
    $current=$_SESSION['CURRENT'];
}

try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("SELECT ID,LASTNAME,FIRSTNAME,MIDDLENAME,PASSFAIL,EXAMSCHED FROM STUDENTINFOTEMP ORDER BY LASTNAME");

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $Querysult = $result;  

    foreach ($Querysult as $val){
        $last = $val['LASTNAME'];
        $first = $val['FIRSTNAME'];
        $middle = $val['MIDDLENAME'];
    }

try {
    $AnnounceConnection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $aDstatement = $AnnounceConnection->prepare("SELECT ADMISSIONSCHED FROM ANNOUNCEMENT");

    $aDstatement->execute();

    $AdResult = $aDstatement->fetchAll(PDO::FETCH_ASSOC);

    $AdQuery = $AdResult;  

    foreach ($AdQuery as $val){
        $ment = $val['ADMISSIONSCHED'];
    }

?>

<!DOCTYPE html>
<head>
    <link rel="text/css" href="css/materialize.min.css" media="screen,projection">
    <link rel="stylesheet" href="AdmiSchedStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEU-IS: Administrator</title>
    <link rel="neu icon" href="rsrc/neu_logo.png">

    <script>

    function ExamResultBlock(){
        document.getElementById('ExRes').style.display = 'block';
        document.getElementById('ExSched').style.display = 'none';
        document.getElementById('Admis').style.display = 'none';
        document.getElementById('ERbtn').style.backgroundColor="yellow";
        document.getElementById('ESbtn').style.backgroundColor="orange";
        document.getElementById('ASbtn').style.backgroundColor="orange";

    
}

function ExamScheduleBlock(){
        document.getElementById('ExSched').style.display = 'block';
        document.getElementById('ExRes').style.display = 'none';
        document.getElementById('Admis').style.display = 'none';
        document.getElementById('ESbtn').style.backgroundColor="yellow";
        document.getElementById('ERbtn').style.backgroundColor="orange";
        document.getElementById('ASbtn').style.backgroundColor="orange";

    
}

function AdmissionSchedBlock() {
        document.getElementById('Admis').style.display = 'block';    
        document.getElementById('ExSched').style.display = 'none';
        document.getElementById('ExRes').style.display = 'none';
        document.getElementById('ASbtn').style.backgroundColor="yellow";
        document.getElementById('ERbtn').style.backgroundColor="orange";
        document.getElementById('ESbtn').style.backgroundColor="orange";

}

function highlight_Result_row() {
    var table = document.getElementById('ExamRes');
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        // Take each cell
        var cell = cells[i];
        // do something on onclick event for cell
        cell.onclick = function () {
            // Get the row id where the cell exists
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
                rowsNotSelected[row].classList.remove('selected');
            }
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "yellow";
            rowSelected.className += " selected";

            document.getElementById("ExamResRef").value=rowSelected.cells[0].innerHTML;
            var last =rowSelected.cells[1].innerHTML;
            var first = rowSelected.cells[2].innerHTML;
            var mid = rowSelected.cells[3].innerHTML;
            document.getElementById("ExamResFullname").value=last + ", " + first + " " + mid.charAt(0) +".";
            document.getElementById("ExamineePF").value=rowSelected.cells[4].innerHTML;

            document.getElementById("ExamResRefdis").value=rowSelected.cells[0].innerHTML;
            document.getElementById("ExamResFullnamedis").value=last + ", " + first + " " + mid.charAt(0) +".";
            document.getElementById("ExamineePFdis").value=rowSelected.cells[4].innerHTML;
        }
    }

}

function highlight_Sched_row() {
    var table = document.getElementById('ExSched');
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        // Take each cell
        var cell = cells[i];
        // do something on onclick event for cell
        cell.onclick = function () {
            // Get the row id where the cell exists
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
                rowsNotSelected[row].classList.remove('selected');
            }
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "yellow";
            rowSelected.className += " selected";

            document.getElementById("ExamSchedRef").value=rowSelected.cells[0].innerHTML;
            var last =rowSelected.cells[1].innerHTML;
            var first = rowSelected.cells[2].innerHTML;
            var mid = rowSelected.cells[3].innerHTML;
            document.getElementById("ExamSchedFullname").value=last + ", " + first + " " + mid.charAt(0) +".";
            document.getElementById("ExamSched").value=rowSelected.cells[4].innerHTML;

            document.getElementById("ExamSchedRefdis").value=rowSelected.cells[0].innerHTML;
            document.getElementById("ExamSchedFullnamedis").value=last + ", " + first + " " + mid.charAt(0) +".";

        }
    }

}

function Pasado() {
    document.getElementById("ExamineePF").value="PASSED";
    document.getElementById("ExamineePFdis").value="PASSED";
}

function Bagsak() {
    document.getElementById("ExamineePF").value="FAILED";
    document.getElementById("ExamineePFdis").value="FAILED";
}

    </script>

</head>
<body onload="highlight_Result_row(); highlight_Sched_row();">
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
           <div class="header">Admission Schedule</div> 
           <span class="panel"></span>
           <div class="Admis">
           <button id ="ERbtn" onclick="ExamResultBlock();" style="<?php echo isset($current) && $current=='ER' ? 'background-color: yellow' :'' ?>">Exam Result</button>
           <button id ="ESbtn" onclick="ExamScheduleBlock();" style="<?php echo isset($current) && $current=='ES' ? 'background-color: yellow' :'' ?>">Exam Schedule</button>
           <button id ="ASbtn" onclick="AdmissionSchedBlock();" style="<?php echo isset($current) && $current=='AS' ? 'background-color: yellow' :'' ?>">Admission Schedule</button>
           
           <div class="AdmisContent" id ="ExRes" style="<?php echo isset($current) && $current=='ER' ? 'display:block' :'display:none' ?>">
           <div>
           <form action="ExamResult.php" method="POST">
           <input type="hidden" name="ExamResRef" id="ExamResRef">
           <input type="text" id="ExamResRefdis" name="ExamResRefdis" disabled>
           <input type="hidden" id="ExamResFullname" name="ExamResFullname">
           <input type="text" id="ExamResFullnamedis" name="ExamResFullnamedis" disabled>
           <input type="hidden" id="ExamineePF" name="ExamineePF">
           <input type="text" id="ExamineePFdis" name="ExamineePFdis" disabled>
           <input type="hidden" name="ER" id="ER" value="set">
           <div>
           <button type="button" onclick="Pasado();">PASSED</button>
           <button type="button" onclick="Bagsak();">FAILED</button>
           <button type="submit">SUBMIT</button>
           </div>
           </form>
           </div>

            <div class="table">
            <table id="ExamRes" cellspacing="0" cellpadding="1" border="2" width="100%">
            <tr>
                <th>Ref No#</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Result</th>
            </tr>
            <?php

            foreach ($Querysult as $val){
                echo '<tr>'.
                '<td>'.$val['ID'].'</td>'.
                '<td>'.$val['LASTNAME'].'</td>'.
                '<td>'.$val['FIRSTNAME'].'</td>'.
                '<td>'.$val['MIDDLENAME'].'</td>'.
                '<td>'.$val['PASSFAIL'].'</td>'.
                '</tr>';
            }

            ?>
            </table>
            </div>
           </div>

           <div class="AdmisContent" id ="ExSched" style="<?php echo isset($current) && $current=='ES' ? 'display:block' :'display:none' ?>">
           <div>
           <form action="ExamSched.php" method="POST">
           <input type="hidden" id="ExamSchedRef" name="ExamSchedRef">
           <input type="text" id="ExamSchedRefdis" name="ExamSchedRefdis" disabled>
           <input type="hidden" id="ExamSchedFullname" name="ExamSchedFullname">
           <input type="text" id="ExamSchedFullnamedis" name="ExamSchedFullnamedis" disabled>
           <input type="date" id="ExamSched" name="ExamSched">
           <input type="hidden" name="ES" id="ES" value="set">           
           <div>
           <button>SET</button>
           <button>EDIT</button>
           </div>
           </form>
           </div>

            <div class="table">
            <table id="ExamRes" cellspacing="0" cellpadding="1" border="2" width="100%" >
            <tr>
                <th>Ref No#</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Schedule</th>
            </tr>
            <?php

            foreach ($Querysult as $val){
                echo '<tr>'.
                '<td>'.$val['ID'].'</td>'.
                '<td>'.$val['LASTNAME'].'</td>'.
                '<td>'.$val['FIRSTNAME'].'</td>'.
                '<td>'.$val['MIDDLENAME'].'</td>'.
                '<td>'.$val['EXAMSCHED'].'</td>'.
                '</tr>';
            }

            ?>
            </table>
            </div>
           </div>
            
            <div class="AdmisContent" id ="Admis" style="display:none">
            <form action="AdScheduling.php" method="POST">
            <textarea name="announce" id="announce"><?php echo $ment ?></textarea>
            <div>
            <button type="submit">POST</button>
            </div>
            </form>
            
            <div>
            <?php echo nl2br($ment) ?>
            </div>

            </div>

           </div>
        </div>
    </div>
</body>
</html>