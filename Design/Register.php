<?php
session_start();

$lrn = $_POST['LRN'];
$level = $_POST['level'];
$fromYear = $_POST['fromYear'];
$toYear = $_POST['toYear'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$MiddleName = $_POST['MiddleName'];
$gender = $_POST['gender'];
$Birthdate = $_POST['Birthdate'];
$MunTowCity = $_POST['MunTowCity'];
$Province = $_POST['Province'];
$LastSchoolname = $_POST['LastSchoolName'];
$LastSchoolYear = $_POST['LastSchoolYear'];
$GradeLevel = $_POST['GradeLevel'];
$LastSchoolAddress = $_POST['LastSchoolAddress'];

$Citizenship = $_POST['Citizenship'];
$Foreigner = $_POST['NonFil'];
$Citizenship=='FILIPINO'? $Citizen=$Citizenship : $Citizen=$Foreigner ;
$VisaType = $_POST['VisaType'];
$VisaIssuedIn = $_POST['VisaIssuedIn'];
$VExpiration = $_POST['VExpiration'];
$PassportNo = $_POST['PassportNo'];
$PIssuedin = $_POST['PIssuedin'];
$PExpiration = $_POST['PExpiration'];
$CompleteAddress = $_POST['CompleteAddress'];
$ContactNo = $_POST['ContactNo'];

$RReligion = $_POST['RReligion'];
$NonINC = $_POST['Religion'];
$RReligion=='INC'? $Religion=$RReligion : $Religion=$NonINC;
$Area = $_POST['Area'];
$Group = $_POST['Group'];
$Locale = $_POST['Locale'];
$District = $_POST['District'];
$INCRecommendName = $_POST['INCRecommendName'];
$INCRecommendAddress = $_POST['INCRecommendAddress'];
$INCRecommendContactNo = $_POST['INCRecommendContactNo'];

$FatherName = $_POST['FatherName'];
$FatherContactNo = $_POST['FatherContactNo'];
$FatherReligion = $_POST['FatherReligion'];
$FatherLocale = $_POST['FatherLocale'];
$FatherAddress = $_POST['FatherAddress'];
$FatherOccupation = $_POST['FatherOccupation'];
$FatherWorkContactNo = $_POST['FatherWorkContactNo'];
$FatherWorkAddress = $_POST['FatherWorkAddress'];
$MotherName = $_POST['MotherName'];
$MotherContactNo = $_POST['MotherContactNo'];
$MotherReligion = $_POST['MotherReligion'];
$MotherLocale = $_POST['MotherLocale'];
$MotherAddress = $_POST['MotherAddress'];
$MotherOccupation = $_POST['MotherOccupation'];
$MotherWorkContactNo = $_POST['MotherWorkContactNo'];
$MotherWorkAddress = $_POST['MotherWorkAddress'];


try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=NEU_IS_APPLICATION', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Could not connect.');
    }

// INSERT INTO STUDENTINFOTEMP(FROMYEAR, TOYEAR, GRADELEVEL, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, BIRTHMUNTOWCITY, BIRTHPROVINCE, GENDER, LASTSCHOOLATTENDED, LASTSCHOOLYEAR, LASTSCHOOLGRADELEVEL,LASTSCHOOLADDRESS) 
// VALUES ($fromYear, $toYear, $level, $lastName, $firstName, $MiddleName, $Birthdate, $MunTowCity, $Province, $gender, $LastSchoolname, $LastSchoolYear, $GradeLevel, $LastSchoolAddress)

// INSERT INTO CITIZENTEMP(CITIZENSHIP, VISATYPE, VISAISSUEDIN, VEXPIRATION, PASSPORTNO, PISSUEDIN, PEXPIRATION, COMPLETEADDRESS, CONTACTNO) 
// VALUES ('$Citizenship', '$VisaType', '$VisaIssuedIn', '$VExpiration', '$PassportNo', '$PIssuedin', '$PExpiration', '$CompleteAddress', '$ContactNo')

// INSERT INTO RELIGIONTEMP(RELIGIOUSAFFILIATION, INCAREA, INCGROUP, INCLOCALE, INCDISTRICT, INCRECOMMENDNAME, INCRECOMMENDADDRESS, INCRECOMMENDCONTACTNO) 
// VALUES ('$Religion', '$Area', '$Group', '$Locale', '$District', '$INCRecommendName', '$INCRecommendAddress', '$INCRecommendContactNo')

// INSERT INTO PARENTSTEMP VALUES(NULL, '$FatherName', '$FatherReligion', '$FatherLocale', '$FatherAddress', '$FatherContactNo', NULL, '$FatherOccupation', '$FatherWorkAddress', '$FatherWorkContactNo', 
// '$MotherName', '$MotherReligion', '$MotherLocale', '$MotherAddress', '$MotherContactNo', NULL, '$MotherOccupation', '$MotherWorkAddress', '$MotherWorkContactNo')

    $statement = $connection->prepare("INSERT INTO STUDENTINFOTEMP(FROMYEAR, TOYEAR, LRN, GRADELEVEL, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, BIRTHMUNTOWCITY, BIRTHPROVINCE, GENDER, LASTSCHOOLATTENDED, LASTSCHOOLYEAR, LASTSCHOOLGRADELEVEL,LASTSCHOOLADDRESS) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $statement2 = $connection->prepare("INSERT INTO RELIGIONTEMP(RELIGIOUSAFFILIATION, INCAREA, INCGROUP, INCLOCALE, INCDISTRICT, INCRECOMMENDNAME, INCRECOMMENDADDRESS, INCRECOMMENDCONTACTNO) 
    VALUES (?,?,?,?,?,?,?,?)");

    $statement3 = $connection->prepare("INSERT INTO PARENTSTEMP(FATHERNAME,FATHERRELIGION,FATHERLOCALE,FATHERADDRESS,FATHERCONTACT,FATHEROCCUPATION,FATHERWORKADDRESS,FATHERWORKCONTACTNO,MOTHERNAME,MOTHERRELIGION,MOTHERLOCALE,MOTHERADDRESS,MOTHERCONTACT,MOTHEROCCUPATION,MOTHERWORKADDRESS,MOTHERWORKCONTACTNO) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


// INSERT INTO CITIZENTEMP(CITIZENSHIP, VISATYPE, VISAISSUEDIN, VEXPIRATION, PASSPORTNO, PISSUEDIN, PEXPIRATION, COMPLETEADDRESS, CONTACTNO) 
//     VALUES ('FILIPINO','Visa','2019-12-02','2019-12-17','11112222','2019-12-03','2019-12-22','Caloocan','09999222212');

    $statement->execute([$fromYear, $toYear, $lrn, $level, $lastName, $firstName, $MiddleName, $Birthdate, $MunTowCity, $Province, $gender, $LastSchoolname, $LastSchoolYear, $GradeLevel, $LastSchoolAddress]);
    $_SESSION['RegID'] = $connection->lastInsertId();

    // $statement1->execute(['FILIPINO','Visa','2019-12-02','2019-12-17','11112222','2019-12-03','2019-12-22','Caloocan','09999222212']);

    $statement2->execute([$Religion, $Area, $Group, $Locale, $District, $INCRecommendName, $INCRecommendAddress, $INCRecommendContactNo]);

    $statement3->execute([$FatherName, $FatherReligion, $FatherLocale, $FatherAddress, $FatherContactNo, $FatherOccupation, $FatherWorkAddress, $FatherWorkContactNo, $MotherName, $MotherReligion, $MotherLocale, $MotherAddress, $MotherContactNo, $MotherOccupation, $MotherWorkAddress, $MotherWorkContactNo]);


    if ($_POST['NonFil'] != "") {
    $statement1 = $connection->prepare("INSERT INTO CITIZENTEMP(CITIZENSHIP, VISATYPE, VISAISSUEDIN, VEXPIRATION, PASSPORTNO, PISSUEDIN, PEXPIRATION, COMPLETEADDRESS, CONTACTNO) 
    VALUES (?,?,?,?,?,?,?,?,?)");

    $statement1->execute([$Citizen, $VisaType, $VisaIssuedIn, $VExpiration, $PassportNo, $PIssuedin, $PExpiration, $CompleteAddress, $ContactNo]);
    } else {   
    $statement1 = $connection->prepare("INSERT INTO CITIZENTEMP(CITIZENSHIP, COMPLETEADDRESS, CONTACTNO) 
    VALUES (?,?,?)");

    $statement1->execute([$Citizenship, $CompleteAddress, $ContactNo]); 
    }

// $sql = "INSERT INTO STUDENTINFOTEMP(FROMYEAR, TOYEAR, GRADELEVEL, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, BIRTHMUNTOWCITY, BIRTHPROVINCE, GENDER, LASTSCHOOLATTENDED, LASTSCHOOLYEAR, LASTSCHOOLGRADELEVEL,LASTSCHOOLADDRESS) VALUES ($fromYear, $toYear, $level, $lastName, $firstName, $MiddleName, $Birthdate, $MunTowCity, $Province, $gender, $LastSchoolname, $LastSchoolYear, $GradeLevel, $LastSchoolAddress);

// INSERT INTO CITIZENTEMP(CITIZENSHIP, VISATYPE, VISAISSUEDIN, VEXPIRATION, PASSPORTNO, PISSUEDIN, PEXPIRATION, COMPLETEADDRESS, CONTACTNO) VALUES ($Citizenship, $VisaType, $VisaIssuedIn, $VExpiration, $PassportNo, $PIssuedin, $PExpiration, $CompleteAddress, $ContactNo);

// INSERT INTO RELIGIONTEMP(RELIGIOUSAFFILIATION, INCAREA, INCGROUP, INCLOCALE, INCDISTRICT, INCRECOMMENDNAME, INCRECOMMENDADDRESS, INCRECOMMENDCONTACTNO) VALUES ($Religion, $Area, $Group, $Locale, $District, $INCRecommendName, $INCRecommendAddress, $INCRecommendContactNo);

// INSERT INTO PARENTSTEMP VALUES(NULL, $FatherName, $FatherReligion, $FatherLocale, $FatherAddress, $FatherContactNo, NULL, $FatherOccupation, $FatherWorkAddress, $FatherWorkContactNo, $MotherName, $MotherReligion, $MotherLocale, $MotherAddress, $MotherContactNo, NULL, $MotherOccupation, $MotherWorkAddress, $MotherWorkContactNo);
// ";

// $statement = $connection->prepare($sql);
// $statement->execute();

header('Location: Registered.php');
?>