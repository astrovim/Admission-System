<?php

session_start();
$adName=$_SESSION['FullName'];
$yearNow = date("Y");
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
    
try {
    $IDconnection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
    } catch (PDOException $e) {
        die('Could not connect.');
    }

    $statementID = $IDconnection->prepare("select ID from STUDENTINFOTEMP");
    $statementID->execute();
    $IDresult = $statementID->fetchAll(PDO::FETCH_ASSOC);
    $QueryID = $IDresult;
    

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

function regAppear(){
    var a=document.getElementById("level");
    var distext=a.options[a.selectedIndex].value;
    if (distext != "default") {
        document.getElementById('regForm').style.display = 'block';
    }
    else {
        document.getElementById('regForm').style.display = 'none';
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
           <div class="header">Registration</div> 
           <div class="">
               <form action="Register.php" method="POST" onsubmit="return confirm('Are you sure you want to submit?')">
                <div>
               <select id="level" name="level" onchange="regAppear();" required>
                <option value="default">--Select Education Level--</option>
                <?php 
                    foreach($Querysult as $CurrName){
                        echo '<option value="'.$CurrName['CURRNAME'].'">' . $CurrName['CURRNAME'] . '</option>';
                    }                
                ?>
                </select>
                </div>
                <div id="regForm" style="display:none">
                <ul>
                    <li class="categories">School Year</li>
                    <li class = "schoolYear">
                    <input id="fromYear" name="fromYear" type="number" min="<?php echo $yearNow-1 ?>" max="<?php echo $yearNow ?>" value="<?php echo $yearNow ?>" placeholder="From" required> to
                    <input id="toYear" name="toYear" type="number" min="<?php echo $yearNow ?>" max="<?php echo $yearNow+1 ?>" value="<?php echo $yearNow+1 ?>" placeholder="To" required>
                    <input id="LRN" name="LRN" type="text" placeholder="LRN" maxlength="12" required> 
                    </li>
                    <li class="categories">Name of Student</li>
                    <li class="StudName">
                        <!-- <label class='input-label' for="lastName">Lastname</label>  -->
                        <input id="lastName" name="lastName" type="text" placeholder="Lastname" onkeypress="javascript:this.value=this.value.toUpperCase();" required> 
                        <!-- <label class='input-label' for="firstName">Firstname</label>  -->
                        <input id="firstName" name="firstName" type="text" placeholder="First fuckin name" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <!-- <label class='input-label' for="MunTowCity">MunTowCity</label>  -->
                        <input id="MiddleName" name="MiddleName" type="text" placeholder="Middlename" onkeypress="javascript:this.value=this.value.toUpperCase();" required> 
                    </li>
                    <li class="categories">Gender</li>
                    <!-- <li style="display:none">   
                        <input type="radio" id ="filler" name="gender" value="" checked>
                    </li> -->
                    <li>
                        <input type="radio" name="gender" value="MALE" required>MALE
                        <input type="radio" name="gender" value="FEMALE">FEMALE
                    </li>
                    <li class="categories">Date of Birth</li>
                    <li class="BirthDate">
                        <input type="date" name="Birthdate" max="<?php echo date('Y-m-d'); ?>" required>
                    </li>
                    <li class="categories">Place of Birth</li>
                    <li class="BirthPlace">
                        <input id="MunTowCity" name="MunTowCity" type="text" placeholder="Municipality/Town/City" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="Province" name="Province" type="text" placeholder="Province" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li class="categories">Citizenship</li>
                    <li>
                        <input type="radio" id ="FILIPINO" onclick="javascript:PinoyCheck();" name="Citizenship" value="FILIPINO" required>FILIPINO
                        <input type="radio" id="NONFILIPINO" onclick="javascript:PinoyCheck();" name="Citizenship" value="NON FILIPINO">NON FILIPINO
                    </li>
                    <div id="ifNONFil" style="display:none">
                        <li>
                        <input id="NonFil" name="NonFil" type="text" placeholder="(Specify Citizenship)" onkeypress="javascript:this.value=this.value.toUpperCase();" required> 
                        </li>
                        <li>
                        <input id="VisaType" name="VisaType" type="text" placeholder="Visa Type" onkeypress="javascript:this.value=this.value.toUpperCase();" required> 
                        Issued in: <input id="VisaIssuedIn" name="VisaIssuedIn" type="date" required> 
                        Expiration: <input id="VExpiration" name="VExpiration" type="date" required> 
                        </li>
                        <li>
                        <input id="PassportNo" name="PassportNo" type="text" placeholder="Passport No#" required> 
                        Issued in: <input id="PIssuedin" name="PIssuedin" type="date" required> 
                        Expiration: <input id="PExpiration" name="PExpiration" type="date" required> 
                        </li>
                    </div>
                    <li id ="ifFIL" style="display:none">
                        <input id="CompleteAddress" name="CompleteAddress" type="text" placeholder="Complete Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="ContactNo" name="ContactNo" type="text" pattern="\d*" maxlength="11" placeholder="Contact No#" required>
                    </li>
                    <li class="categories">Religious Affiliation</li>
                    <!-- <li style="display:none">   
                        <input type="radio" id ="filler" name="Religion" value="" checked>
                    </li> -->
                    <li class="religion">
                        <input type="radio" id ="INC" onclick="javascript:INCcheck();" name="RReligion" value="INC" required>INC
                        <input type="radio" id="NONINC" onclick="javascript:INCcheck();" name="RReligion" value="NON INC">NON INC
                    <li id="ifNONINC" style="display:none">
                        <input id="Religion" name="Religion" type="text" placeholder="(Specify Religion)" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <div class="parents">INC member who recommended the applicant: </div>
                        <div>
                        <input id="INCRecommendName" name="INCRecommendName" type="text" placeholder="Fullname" onkeypress="javascript:this.value=this.value.toUpperCase();" required> 
                        <input id="INCRecommendAddress" name="INCRecommendAddress" type="text" placeholder="Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="INCRecommendContactNo" name="INCRecommendContactNo" type="text" pattern="\d*" maxlength="11" placeholder="Contact No" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                    </li>
                    <li id="ifINC" style="display:none">
                        <input id="Area" name="Area" type="text" placeholder="Area" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="Group" name="Group" type="text" placeholder="Group" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="Locale" name="Locale" type="text" placeholder="Locale" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="District" name="District" type="text" placeholder="District" onkeypress="javascript:this.value=this.value.toUpperCase();" required>                                        
                    </li>
                    </li>
                    <li class="categories">Last School Attended</li>
                    <li class="LastSchool">
                        <input id="LastSchoolName" name="LastSchoolName" type="text" placeholder="Complete School Name" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="LastSchoolYear" name="LastSchoolYear" type="text" placeholder="School Year (e.g., 2019-2020)" pattern="^\d+(?:-\d+)*$" required>
                        <input id="GradeLevel" name="GradeLevel" type="text" placeholder="Grade/Year Level" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li>
                    <input id="LastSchoolAddress" name="LastSchoolAddress" type="text" placeholder="Complete School Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li class="categories">Parents</li>
                    <li class="parents">Father</li>
                    <li class="FatherInfo">
                        <input id="FatherName" name="FatherName" type="text" placeholder="Fullname" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="FatherContactNo" name="FatherContactNo" type="text" pattern="\d*" maxlength="11" placeholder="Contact No#" required>
                        <input id="FatherReligion" name="FatherReligion" type="text" placeholder="Religion" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="FatherLocale" name="FatherLocale" type="text" placeholder="Locale" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li>
                    <input id="FatherAddress" name="FatherAddress" type="text" placeholder="Complete Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li>
                        <input id="FatherOccupation" name="FatherOccupation" type="text" placeholder="Occupation" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="FatherWorkContactNo" name="FatherWorkContactNo"  type="text" pattern="\d*" maxlength="11" placeholder="Work Contact No#" required>                    
                    </li>
                    <li>
                        <input id="FatherWorkAddress" name="FatherWorkAddress" type="text" placeholder="Work Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>                    
                    </li>
                    <li class="parents">Mother</li>
                    <li class="MotherInfo">
                        <input id="MotherName" name="MotherName" type="text" placeholder="Fullname" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="MotherContactNo" name="MotherContactNo" type="text" pattern="\d*" maxlength="11" placeholder="Contact No#" required>
                        <input id="MotherReligion" name="MotherReligion" type="text" placeholder="Religion" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="MotherLocale" name="MotherLocale" type="text" placeholder="Locale" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li>
                        <input id="MotherAddress" name="MotherAddress" type="text" placeholder="Complete Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                    </li>
                    <li>
                        <input id="MotherOccupation" name="MotherOccupation" type="text" placeholder="Occupation" onkeypress="javascript:this.value=this.value.toUpperCase();" required>
                        <input id="MotherWorkContactNo" name="MotherWorkContactNo" type="text" pattern="\d*" maxlength="11" placeholder="Work Contact No#" required>                    
                    </li>
                    <li>
                        <input id="MotherWorkAddress" name="MotherWorkAddress" type="text" placeholder="Work Address" onkeypress="javascript:this.value=this.value.toUpperCase();" required>                    
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
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>