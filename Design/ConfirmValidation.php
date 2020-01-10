<?php

session_start();
$adName=$_SESSION['FullName'];
$ValID=$_SESSION['ValID'];

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
           <div class="ConfirmValidation">
               <div>
               <img src="/rsrc/download.png" width="200" height="200">
               </div>
               Validation Successful!
               <div>
                   <form action="Validation.php">
                   <span id="Ref">Here is your New Student Number:</span>
                   <div>
                   <input id="Val" type="text" value="<?php echo $ValID ?>" disabled>
                   </div>
                   <button class="btn" type="submit">BACK</button>
                   </form>
               </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>