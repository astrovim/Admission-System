<?php

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
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="style.css">  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="https://kit.fontawesome.com/65130005cf.js" crossorigin="anonymous"></script>

        <title>NEU Integrated School Admission</title>
    </head>

    <body>
      <a name="home"></a>
      <!--HEADER-->
      <div class="header">
        <img src="img/NEUIS_header_logo.png" class="logo">
      </div>


       <!--NAVBAR-->

      <div class="navbar-fixed">
        <nav class="grey darken-4">
          
          <div class="container">
            <div class="nav-wrapper">
             <div class="brand-logo center">
              <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                <i class="material-icons">menu</i>
              </a>
              <ul class="right hide-on-med-and-down" >
                <li>
                  <a href="StudentUI.php">Home</a>
                </li>
                 <li>
                  <a href="#requirements">Requirements</a>
                </li>
                 <li>
                  <a href="#registartion">Registration</a>
                </li>
                 <li>
                  <a href="Announcement.php">Announcements</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      </div>
 
         <!--MOBILE NAV-->
        <ul class="sidenav" id="mobile-nav">
                <li>
                  <a href="StudentUI.php">Home</a>
                </li>
                 <li>
                  <a href="#requirements">Requirements</a>
                </li>
                 <li>
                  <a href="#registartion">Registration</a>
                </li>
                 <li>
                  <a href="Announcement.php">Announcements</a>
                </li>
              </ul>

               <!--ADMISSION CONTENT-->

              <div class="container">

                <div class="row">
                  <div class="col s12"><img class="responsive-img" src="img/banner.png"></div>
                <div class="col s6"><h5 style="color: #4169E1;">Announcement</h5></div>
                <div class="col s12"><p style="text-align: justify;">
                   <?php echo $ment ?>
                </p></div>
              </div>
            </div>

           
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type = "text/javascript" src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>    

      <script>
        //Sidenav
        const sideNav = document.querySelector('.sidenav');
        M.Sidenav.init(sideNav, {});

    


      
      </script>
    </body>
  </html>
        