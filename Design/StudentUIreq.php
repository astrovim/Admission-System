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
        <script type="text/javascript">

        function newReq() {
        document.getElementById('newStud').style.display = 'block';
        document.getElementById('oldStud').style.display = 'none';
        }

        function oldReq() {
        document.getElementById('oldStud').style.display = 'block';
        document.getElementById('newStud').style.display = 'none';
        }

        </script>

        <title>NEU Integrated School Admission</title>
        <link rel="neu icon" href="rsrc/neu_logo.png">
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
                  <a href="StudentUIreq.php">Requirements</a>
                </li>
                 <li>
                  <a href="StudentUIreg.php">Registration</a>
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
                  <a href="StudentUIreq.php">Requirements</a>
                </li>
                 <li>
                  <a href="StudentUIreg.php">Registration</a>
                </li>
                 <li>
                  <a href="Announcement.php">Announcements</a>
                </li>
              </ul>

               <!--ADMISSION CONTENT-->
             <!--TABS-->


            <section class="container section" id="req">
              <div class="row">
                <h5 style="color: black;">Requirements</h5>
                <div class="col s12 l6 offset-12">
                  <ul style="position: static;" class="tabs">
                    <li class="tab col s4">
                      <a onclick="javascript:newReq();" href="#top" class="indigo-text text-darken-4">New Student</a>
                    </li>
                    <li class="tab col s4">
                      <a onclick="javascript:oldReq();" href="#top" class="indigo-text text-darken-4">Old Student</a>
                    </li>
                    <li class="tab col s4">
                      <a href="#foreign" class="indigo-text text-darken-4">Foreign</a>
                    </li>
                  </ul>


                </div>
            </section>

             <!--REQUIREMENTS-->



      
        <div class="container" id="newStud" style="display:none"> 

              <div class="row" style="padding-top: 0px;">

                  <div class="col l6 m4 s12" style="margin-bottom: 20px;">
                        <img class="hide-on-med-and-down" style="float:left; margin-right: 10px; margin-bottom: 20px;" src="img/ICON_REGFORM.jpg"  width="100" height="100"> 
                       
                           <p><font style="font-size: 20px;"> Online Registration Application</font><br>
                            1. Go to Registration.<br>
                            2. Fill up the form, make sure that is true and specific.<br>
                            3. Click "submit" after filling up the form.</p>
                  </div>

                  <div class="col l6 m4 s12">
                      <img class="hide-on-med-and-down" style="float:left; margin-right: 10px; margin-bottom: 20px;" src="img/ICON_GOODMORAL.jpg"  width="100" height="100"> 
                      <h6><strong>Certificate of Good Moral Character</strong> (for applicants from other school)</h6>
                  </div>

              </div>  <!--END OF ROW-->


                  <div class="row" style="padding-top: 0px;">
                       
                       <div class="col l6 m4 s12" style="margin-bottom: 20px;">
                          <img class="hide-on-med-and-down" style="float:left; margin-right: 5px; margin-bottom: 20px;" src="img/ICON_F138.jpg"  width="100" height="100"> 
                          <h6><strong>Progress Report Card <div F137=""></div></strong> (with a General Average Grade of at least 85% or its equivalent)</h6>
                       </div>

                       <div class="col l6 m4 s12" style="margin-bottom: 20px;">
                          <img class="hide-on-med-and-down" style="float:left; margin-right: 5px; margin-bottom: 20px;" src="img/ICON_PSA.jpg"  width="100" height="100"> 
                          <h6><strong>Birth Certificate</strong> (NSO/Embassy-authenticated)</h6>
                       </div>
        
                  </div> <!--END OF ROW-->

                    <div class="row" style="padding-top: 0px;">
                       
                       <div class="col l6 m4 s12" style="margin-bottom: 20px;">
                          <img class="hide-on-med-and-down" style="float:left; margin-right: 5px; margin-bottom: 20px;" src="img/ICON_2x2ID.jpg"  width="100" height="100"> 
                          <h6><strong>Four</strong> (4) copies of latest 2x2 colored photo</h6>
                       </div>

                     </div>  <!--END OF ROW-->
                          
         
              
              <div class="divider"></div>
              <div class="section">
              <h6><strong><u>For INC Members: </u></strong><br><strong>Certificate</strong> of <strong>Church Membership</strong> from Locale Congregation. (Patotoo ng Lokal)
                <br><br>
                <strong><u>For Non-INC Members:</u><br>
                Letter</strong> of <strong>Intent</strong> or Appeal to study at NEU.<br>
                <strong>Endorsement Letter</strong> from the <strong>INC Church Administration of the Locale Congregation</strong> that has geographic jurisdiction over the residence of the student and his/her family. (Rekomendasyon galing sa Lokal na nakasasakop sa tirahan ng mag-aaral, na may lagda ng Pangulong Kalihim, Pangulong Diakono, at Destinado)
              </h6>
              </div>
            </div>

            </div> <!--END OF CONTAINER-->

            
           
            <div class="container" id="oldStud" style="display:none">
             
              <div class="row" style="padding-top: 0px;">
                 <div class="col l6 m4 s12">
                      <img class="hide-on-med-and-down" style="float:left; margin-right: 10px; margin-bottom: 20px;" src="img/ICON_GOODMORAL.jpg"  width="100" height="100"> 
                      <h6><strong>Certificate of Good Moral Character</strong> (for applicants from other school)</h6>
                  </div>

                  <div class="col l6 m4 s12">
                      <img class="hide-on-med-and-down" style="float:left; margin-right: 10px; margin-bottom: 20px;" src="img/ICON_CLEARANCE.jpg"  width="100" height="100"> 
                      <h6><strong>Student Clearance</strong> (of last school year)</h6>
                  </div>

              </div>

               <div class="row" style="padding-top: 0px;">
                       
                       <div class="col l6 m4 s12" style="margin-bottom: 20px;">
                          <img class="hide-on-med-and-down" style="float:left; margin-right: 5px; margin-bottom: 20px;" src="img/ICON_2x2ID.jpg"  width="100" height="100"> 
                          <h6><strong>Four</strong> (4) copies of latest 2x2 colored photo</h6>
                       </div>

                </div>  
              
           
              
              <div class="divider"></div>
              <div class="section">
              <h6><strong><u>For INC Members: </u></strong><br><strong>Certificate</strong> of <strong>Church Membership</strong> from Locale Congregation. (Patotoo ng Lokal)
                <br><br>
                <strong><u>For Non-INC Members:</u><br>
                Letter</strong> of <strong>Intent</strong> or Appeal to study at NEU.<br>
                <strong>Endorsement Letter</strong> from the <strong>INC Church Administration of the Locale Congregation</strong> that has geographic jurisdiction over the residence of the student and his/her family. (Rekomendasyon galing sa Lokal na nakasasakop sa tirahan ng mag-aaral, na may lagda ng Pangulong Kalihim, Pangulong Diakono, at Destinado)
              </h6>
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
        