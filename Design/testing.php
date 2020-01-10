<?php

session_start();
$adName=$_SESSION['FullName'];
$yearNow = date("Y");


try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statement = $connection->prepare("select CURRNAME from CURRICULUM");

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $Querysult = $result;  
    
try {
    $IDconnection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statementID = $IDconnection->prepare("select ID from STUDENTINFO");
    $statementID->execute();
    $IDresult = $statementID->fetchAll(PDO::FETCH_ASSOC);
    $QueryID = $IDresult;


if(isset($_POST['selectID'])){
    $ID = $_POST['selectID'];
    try {
        $editConnection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS', 'root', '');
        } catch (PDOException $e) {
            die('Could not connect.');
        }
    
        $statementStudInfo = $editConnection->prepare("SELECT FROMYEAR,TOYEAR,GRADELEVEL,LASTNAME,FIRSTNAME,MIDDLENAME,GENDER,BIRTHDATE,BIRTHMUNTOWCITY,BIRTHPROVINCE,LASTSCHOOLATTENDED,LASTSCHOOLYEAR,LASTSCHOOLGRADELEVEL,LASTSCHOOLADDRESS FROM STUDENTINFO WHERE ID = $ID");
        $statementStudInfo->execute();
        $StudInfoResult = $statementStudInfo->fetchAll(PDO::FETCH_ASSOC);
        $QueryStudInfo = $StudInfoResult;
    
        foreach ($QueryStudInfo as $val){
            $fromYear = $val['FROMYEAR'];
            $toYear = $val['TOYEAR'];
            $last = $val['LASTNAME'];
            $first = $val['FIRSTNAME'];
            $middle = $val['MIDDLENAME'];
            $gender = $val['GENDER'];
            $birthdate = $val['BIRTHDATE'];
            $birthMunTowCity = $val['BIRTHMUNTOWCITY'];
            $birthProvince = $val['BIRTHPROVINCE'];
            $gradeLevel = $val['GRADELEVEL'];
            $lastSchoolName = $val['LASTSCHOOLATTENDED'];
            $lastYear = $val['LASTSCHOOLYEAR'];
            $lastAddress = $val['LASTSCHOOLADDRESS'];
            $lastGradeLevel = $val['LASTSCHOOLGRADELEVEL'];
        }

        $statementCitizen = $editConnection->prepare("SELECT CITIZENSHIP, VISATYPE, VISAISSUEDIN, VEXPIRATION,PASSPORTNO, PISSUEDIN, PEXPIRATION, COMPLETEADDRESS, CONTACTNO FROM CITIZEN WHERE ID = $ID");
        $statementCitizen->execute();
        $CitizenResult = $statementCitizen->fetchAll(PDO::FETCH_ASSOC);
        $QueryCitizen = $CitizenResult;
    
        foreach ($QueryCitizen as $val){
            $citizen = $val['CITIZENSHIP'];
            $visaType = $val['VISATYPE'];
            $visaIssuedIn = $val['VISAISSUEDIN'];
            $visaExpire = $val['VEXPIRATION'];
            $passportNo = $val['PASSPORTNO'];
            $pIssuedIn = $val['PISSUEDIN'];
            $pExpire = $val['PEXPIRATION'];
            $CompleteAddress = $val['COMPLETEADDRESS'];
            $ContactNo = $val['CONTACTNO'];
           
        }

        $statementReligion = $editConnection->prepare("SELECT RELIGIOUSAFFILIATION, INCAREA, INCGROUP, INCLOACLE, INCDISTRICT, INCRECOMMENDNAME, INCRECOMMENDADDRESS,INCRECOMMENDCONTACTNO FROM RELIGON WHERE ID = $ID");
        $statementReligion->execute();
        $ReligionResult = $statementReligion->fetchAll(PDO::FETCH_ASSOC);
        $QueryLigion = $ReligionResult;
    
        foreach ($QueryLigion as $val){
            $religion = $val['RELIGIOUSAFFILIATION'];
           
        }

        $statementParents = $editConnection->prepare("SELECT FATHERNAME,FATHERRELIGION, FATHERLOCALE, FATHERADDRESS, FATHERCONTACT, FATHEREMAIL, FATHEROCCUPATION, FATHERWORKADDRESS, FATHERWORKCONTACTNO,MOTHERNAME,MOTHERRELIGION, MOTHERLOCALE, MOTHERADDRESS, MOTHERCONTACT, MOTHEREMAIL, MOTHEROCCUPATION, MOTHERWORKADDRESS, MOTHERWORKCONTACTNO FROM PARENTS WHERE ID = $ID");
        $statementParents->execute();
        $ParentsResult = $statementParents->fetchAll(PDO::FETCH_ASSOC);
        $QueryParents = $ParentsResult;
    
        foreach ($QueryParents as $val){
            $fatherName = $val['FATHERNAME'];
            $fatherReligion = $val['FATHERRELIGION'];
            $fatherLocale = $val['FATHERLOCALE'];
            $fatherAddress = $val['FATHERADDRESS'];
            $fatherContact = $val['FATHERCONTACT'];
            $fatherEmail = $val['FATHEREMAIL'];
            $fatherOccupation = $val['FATHEROCCUPATION'];
            $fatherWorkAddress = $val['FATHERWORKADDRESS'];
            $fatherWorkContactNo = $val['FATHERWORKCONTACTNO'];
            
            $motherName = $val['MOTHERNAME'];
            $motherReligion = $val['MOTHERRELIGION'];
            $motherLocale = $val['MOTHERLOCALE'];
            $motherAddress = $val['MOTHERADDRESS'];
            $motherContact = $val['MOTHERCONTACT'];
            $motherEmail = $val['MOTHEREMAIL'];
            $motherOccupation = $val['MOTHEROCCUPATION'];
            $motherWorkAddress = $val['MOTHERWORKADDRESS'];
            $motherWorkContactNo = $val['MOTHERWORKCONTACTNO']; 
           
        }


}    
 

?>

<!DOCTYPE html>
<head>
    <link rel="text/css" href="css/materialize.min.css" media="screen,projection">       
    <link rel="stylesheet" href="regStyle.css" type="text/css" media="screen,projection">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEU-IS: Administrator</title>
    <link rel="neu icon" href="rsrc/neu_logo.png">
    <script type="text/javascript">

function editAppear(){
    var a=document.getElementById("selectID");
    var distext=a.options[a.selectedIndex].value;
    if (distext != "default") {
        document.getElementById('regForm').style.display = 'inline';
        document.getElementById('editForm').style.display = 'none';
    }
    else {
        document.getElementById('regForm').style.display = 'none';
        document.getElementById('editForm').style.display = 'none';
    }
}

function INCcheck() {
    if (document.getElementById('NONINC').checked) {
        document.getElementById('ifNONINC').style.display = 'block';
        document.getElementById('ifINC').style.display = 'none';
        document.getElementById('Religion').required = true;
        document.getElementById('INCRecommendName').required = true;                
        document.getElementById('INCRecommendAddress').required = true;                
        document.getElementById('INCRecommendContactNo').required = true;                
        document.getElementById('Area').required = false;
        document.getElementById('Group').required = false;                
        document.getElementById('Locale').required = false;                
        document.getElementById('District').required = false;

    }
    else {
        document.getElementById('ifNONINC').style.display = 'none';
        document.getElementById('ifINC').style.display = 'block';
        document.getElementById('Religion').required = false;
        document.getElementById('INCRecommendName').required = false;                
        document.getElementById('INCRecommendAddress').required = false;                
        document.getElementById('INCRecommendContactNo').required = false;                
        document.getElementById('Area').required = true;
        document.getElementById('Group').required = true;                
        document.getElementById('Locale').required = true;                
        document.getElementById('District').required = true;
        
    }
}


function PinoyCheck() {
    if (document.getElementById('NONFILIPINO').checked) {
        document.getElementById('ifNONFil').style.display = 'block';
        document.getElementById('ifFIL').style.display = 'block';
        document.getElementById('NonFil').required = true;
        document.getElementById('VisaType').required = true;
        document.getElementById('VisaIssuedIn').required = true;
        document.getElementById('VExpiration').required = true;
        document.getElementById('PassportNo').required = true;
        document.getElementById('PIssuedin').required = true;
        document.getElementById('PExpiration').required = true;
    }
    else {
        document.getElementById('ifFIL').style.display = 'block';
        document.getElementById('ifNONFil').style.display = 'none';
        document.getElementById('NonFil').required = false;
        document.getElementById('VisaType').required = false;
        document.getElementById('VisaIssuedIn').required = false;
        document.getElementById('VExpiration').required = false;
        document.getElementById('PassportNo').required = false;
        document.getElementById('PIssuedin').required = false;
        document.getElementById('PExpiration').required = false;
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
           <div class="header">Student Info Management</div> 
           <div class="">
           <form action="" method="POST">
                <div>
               <select id="selectID" name="selectID" onchange="editAppear();" required>
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
               <div id ="editForm" style="<?php echo (isset($ID)) ? 'display:block' :'display:none' ?>">
               <form action="">
               <div>
               <select id="level" name="level" required>
                <!-- <option value="default"><?php echo (isset($gradeLevel)) ? "$gradeLevel" :'--Select Education Level--' ?></option> -->
                <option value="default">--Select Education Level--</option>
                <?php 
                    foreach($Querysult as $CurrName){
                        if ($CurrName['CURRNAME']==$gradeLevel)
                        {
                            echo '<option value="'.$CurrName['CURRNAME'].'"selected>' . $CurrName['CURRNAME'] . '</option>';
                        }else{
                            echo '<option value="'.$CurrName['CURRNAME'].'">' . $CurrName['CURRNAME'] . '</option>';
                        }
                    }                
                ?>
                </select>
                </div>
                <ul>
                    <li class="categories">School Year</li>
                    <li class = "schoolYear">
                    <input id="fromYear" name="fromYear" type="number" min="<?php echo $yearNow-1 ?>" max="<?php echo $yearNow ?>" value="<?php echo (isset($fromYear)) ? "$fromYear" :'none' ?>" required> to
                    <input id="toYear" name="toYear" type="number" min="<?php echo $yearNow ?>" max="<?php echo $yearNow+1 ?>" value="<?php echo (isset($toYear)) ? "$toYear" :'none' ?>" required>
                    </li>
                    <li class="categories">Name of Student</li>
                    <li class="StudName">
                        <!-- <label class='input-label' for="lastName">Lastname</label>  -->
                        <input id="lastName" name="lastName" type="text" placeholder="Lastname" value="<?php echo (isset($last)) ? "$last" :'none' ?>" required> 
                        <!-- <label class='input-label' for="firstName">Firstname</label>  -->
                        <input id="firstName" name="firstName" type="text" placeholder="Firstname" value="<?php echo (isset($first)) ? "$first" :'none' ?>" required>
                        <!-- <label class='input-label' for="MunTowCity">MunTowCity</label>  -->
                        <input id="MiddleName" name="MiddleName" type="text" placeholder="Middlename" value="<?php echo (isset($middle)) ? "$middle" :'none' ?>" required> 
                    </li>
                    <li class="categories">Gender</li>
                    <!-- <li style="display:none">   
                        <input type="radio" id ="filler" name="gender" value="" checked>
                    </li> -->
                    <li>
                    <?php 
                        if($gender=='MALE'){
                            echo '<input type="radio" name="gender" value="MALE" checked required>MALE<input type="radio" name="gender" value="FEMALE">FEMALE';
                        }else {
                            echo '<input type="radio" name="gender" value="MALE" required>MALE<input type="radio" name="gender" value="FEMALE" checked>FEMALE';
                        }
                    ?>
                    </li>
                    <li class="categories">Date of Birth</li>
                    <li class="BirthDate">
                        <input type="date" name="Birthdate" max="<?php echo date('Y-m-d'); ?>" value="<?php echo (isset($birthdate)) ? "$birthdate" :'none' ?>">
                    </li>
                    <li class="categories">Place of Birth</li>
                    <li class="BirthPlace">
                        <input id="MunTowCity" name="MunTowCity" type="text" placeholder="Municipality/Town/City" value="<?php echo (isset($birthMunTowCity)) ? "$birthMunTowCity" :'none' ?>" required>
                        <input id="Province" name="Province" type="text" placeholder="Province" value="<?php echo (isset($birthProvince)) ? "$birthProvince" :'none' ?>" required>
                    </li>
                    <li class="categories">Citizenship</li>
                    <li>
                    <?php 
                        if($citizen=='FILIPINO'){
                            echo '<input type="radio" id ="FILIPINO" onchange="javascript:PinoyCheck();" name="Citizenship" value="FILIPINO" checked required>FILIPINO<input type="radio" id="NONFILIPINO" onclick="javascript:PinoyCheck();" name="Citizenship" value="NON FILIPINO">NON FILIPINO';
                        }else {
                            echo '<input type="radio" id ="FILIPINO" onchange="javascript:PinoyCheck();" name="Citizenship" value="FILIPINO" required>FILIPINO<input type="radio" id="NONFILIPINO" onclick="javascript:PinoyCheck();" name="Citizenship" value="NON FILIPINO" checkedd>NON FILIPINO';
                        }
                    ?>                        
                    </li>
                    <div id="ifNONFil" style="<?php echo ($citizen!='FILIPINO') ? 'display:block' :'display:none' ?>">
                        <li>
                        <input id="NonFil" name="NonFil" type="text" placeholder="(Specify Citizenship)" value="<?php echo ($citizen!='FILIPINO') ? "$citizen" :'none' ?>" required> 
                        </li>
                        <li>
                        <input id="VisaType" name="VisaType" type="text" placeholder="Visa Type" value="<?php echo (isset($visaType)) ? "$visaType" :'none' ?>" required> 
                        Issued in: <input id="VisaIssuedIn" name="VisaIssuedIn" type="date" value="<?php echo (isset($visaIssuedIn)) ? "$visaIssuedIn" :'none' ?>" required> 
                        Expiration: <input id="VExpiration" name="VExpiration" type="date" value="<?php echo (isset($visaExpire)) ? "$visaExpire" :'none' ?>" required> 
                        </li>
                        <li>
                        <input id="PassportNo" name="PassportNo" type="text" placeholder="Passport No#" value="<?php echo (isset($passportNo)) ? "$ContactNo" :'none' ?>" required> 
                        Issued in: <input id="PIssuedin" name="PIssuedin" type="date" value="<?php echo (isset($pIssuedIn)) ? "$pIssuedIn" :'none' ?>" required> 
                        Expiration: <input id="PExpiration" name="PExpiration" type="date" value="<?php echo (isset($pExpire)) ? "$pExpire" :'none' ?>" required> 
                        </li>
                    </div>
                    <li id ="ifFIL" style="<?php echo ($citizen=='FILIPINO') ? 'display:block' :'display:none' ?>">
                        <input id="CompleteAddress" name="CompleteAddress" type="text" placeholder="Complete Address" value="<?php echo (isset($CompleteAddress)) ? "$CompleteAddress" :'none' ?>" required>
                        <input id="ContactNo" name="ContactNo" type="text" placeholder="Contact No#" value="<?php echo (isset($ContactNo)) ? "$ContactNo" :'none' ?>" required>
                    </li>
                    <li class="categories">Religious Affiliation</li>
                    <!-- <li style="display:none">   
                        <input type="radio" id ="filler" name="Religion" value="" checked>
                    </li> -->
                    <li class="religion">
                    <?php 
                        if($gender=='MALE'){
                            echo '<input type="radio" name="gender" value="MALE" checked required>MALE<input type="radio" name="gender" value="FEMALE">FEMALE';
                        }else {
                            echo '<input type="radio" name="gender" value="MALE" required>MALE<input type="radio" name="gender" value="FEMALE" checked>FEMALE';
                        }
                    ?>
                        <input type="radio" id ="INC" onclick="javascript:INCcheck();" name="RReligion" value="INC" required>INC
                        <input type="radio" id="NONINC" onclick="javascript:INCcheck();" name="RReligion" value="NON INC">NON INC
                    <li id="ifNONINC" style="display:none">
                        <input id="Religion" name="Religion" type="text" placeholder="(Specify Religion)" required>
                        <div class="parents">INC member who recommended the applicant: </div>
                        <div>
                        <input id="INCRecommendName" name="INCRecommendName" type="text" placeholder="Fullname" required> 
                        <input id="INCRecommendAddress" name="INCRecommendAddress" type="text" placeholder="Address" required>
                        <input id="INCRecommendContactNo" name="INCRecommendContactNo" type="text" placeholder="Contact No" required>
                        </div>
                    </li>
                    <li id="ifINC" style="display:none">
                        <input id="Area" name="Area" type="text" placeholder="Area" required>
                        <input id="Group" name="Group" type="text" placeholder="Group" required>
                        <input id="Locale" name="Locale" type="text" placeholder="Locale" required>
                        <input id="District" name="District" type="text" placeholder="District" required>                                        
                    </li>
                    </li>
                    <li class="categories">Last School Attended</li>
                    <li class="LastSchool">
                        <input id="LastSchoolName" name="LastSchoolName" type="text" placeholder="Complete School Name" value="<?php echo (isset($lastSchoolName)) ? "$lastSchoolName" :'none' ?>" required>
                        <input id="LastSchoolYear" name="LastSchoolYear" type="text" placeholder="School Year" value="<?php echo (isset($lastYear)) ? "$lastYear" :'none' ?>" required>
                        <input id="GradeLevel" name="GradeLevel" type="text" placeholder="Grade/Year Level" value="<?php echo (isset($lastGradeLevel)) ? "$lastGradeLevel" :'none' ?>" required>
                    </li>
                    <li>
                    <input id="LastSchoolAddress" name="LastSchoolAddress" type="text" placeholder="Complete School Address" value="<?php echo (isset($lastAddress)) ? "$lastAddress" :'none' ?>" required>
                    </li>
                    <li class="categories">Parents</li>
                    <li class="parents">Father</li>
                    <li class="FatherInfo">
                        <input id="FatherName" name="FatherName" type="text" placeholder="Fullname" value="<?php echo (isset($fatherName)) ? "$fatherName" :'none' ?>" required>
                        <input id="FatherContactNo" name="FatherContactNo" type="text" placeholder="Contact No#" value="<?php echo (isset($fatherContact)) ? "$fatherContact" :'none' ?>" required>
                        <input id="FatherReligion" name="FatherReligion" type="text" placeholder="Religion" value="<?php echo (isset($fatherReligion)) ? "$fatherReligion" :'none' ?>" required>
                        <input id="FatherLocale" name="FatherLocale" type="text" placeholder="Locale" value="<?php echo (isset($fatherLocale)) ? "$fatherLocale" :'none' ?>" required>
                    </li>
                    <li>
                    <input id="FatherAddress" name="FatherAddress" type="text" placeholder="Complete Address" value="<?php echo (isset($fatherAddress)) ? "$fatherAddress" :'none' ?>" required>
                    </li>
                    <li>
                        <input id="FatherOccupation" name="FatherOccupation" type="text" placeholder="Occupation" value="<?php echo (isset($fatherOccupation)) ? "$fatherOccupation" :'none' ?>" required>
                        <input id="FatherWorkContactNo" name="FatherWorkContactNo" type="text" placeholder="Work Contact No#" value="<?php echo (isset($fatherWorkContactNo)) ? "$fatherWorkContactNo" :'none' ?>" required>                    
                    </li>
                    <li>
                        <input id="FatherWorkAddress" name="FatherWorkAddress" type="text" placeholder="Work Address" value="<?php echo (isset($fatherWorkAddress)) ? "$fatherWorkAddress" :'none' ?>" required>                    
                    </li>
                    <li class="parents">Mother</li>
                    <li class="MotherInfo">
                        <input id="MotherName" name="MotherName" type="text" placeholder="Fullname" value="<?php echo (isset($motherName)) ? "$motherName" :'none' ?>" required>
                        <input id="MotherContactNo" name="MotherContactNo" type="text" placeholder="Contact No#" value="<?php echo (isset($motherContact)) ? "$motherContact" :'none' ?>" required>
                        <input id="MotherReligion" name="MotherReligion" type="text" placeholder="Religion" value="<?php echo (isset($motherReligion)) ? "$motherReligion" :'none' ?>" required>
                        <input id="MotherLocale" name="MotherLocale" type="text" placeholder="Locale" value="<?php echo (isset($motherLocale)) ? "$motherLocale" :'none' ?>" required>
                    </li>
                    <li>
                        <input id="MotherAddress" name="MotherAddress" type="text" placeholder="Complete Address" value="<?php echo (isset($motherAddress)) ? "$motherAddress" :'none' ?>" required>
                    </li>
                    <li>
                        <input id="MotherOccupation" name="MotherOccupation" type="text" placeholder="Occupation" value="<?php echo (isset($motherOccupation)) ? "$motherOccupation" :'none' ?>" required>
                        <input id="MotherWorkContactNo" name="MotherWorkContactNo" type="text" placeholder="Work Contact No#" value="<?php echo (isset($motherWorkContactNo)) ? "$motherWorkContactNo" :'none' ?>" required>                    
                    </li>
                    <li>
                        <input id="MotherWorkAddress" name="MotherWorkAddress" type="text" placeholder="Work Address" value="<?php echo (isset($motherWorkAddress)) ? "$motherWorkAddress" :'none' ?>" required>                    
                    </li>                    
                    <li class="submitton">
                    <button class="btn" type="submit" name="submit" name="action">Submit</button>
                    </li>
                </ul>
                </div>
                <!-- <div class="input-field">                    
                    <label class='input-label' for="lastName">Lastname</label> 
                    <input id="lastName" name="lastName" type="text" required>    
                </div> -->
               </form>
               </div>
           </div>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>