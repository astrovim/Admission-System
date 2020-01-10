
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>NEU-IS Admin Portal</title>

    <link rel="neu icon" href="rsrc/neu_logo.ico">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" href="loginStyle.css" type="text/css" media="screen,projection">
</head>
<body> 
    <form method="GET">
        <input type="hidden" name="credentials" value="">
    </form>   
    <div class="LoginArea">
        <div class="LoginTitle">
            NEU-IS <br> Admin </br>
        </div>
        <form action="LoginValidation.php" method="POST">
        <div class="input-field">
            <input id="username" name="username" type="text" required>
            <label class='input-label' for="username">Username</label>     
        </div>
        <div class="input-field">
            <input id="password" name="password" type="password" required>
            <label class="input-label" for="password">Password</label>
        </div>
        <div class="credentials">
           <h6> <?php if(isset($_GET['credentials'])) { echo $_GET['credentials']; } ?> </h6>
        </div>
        <div>
            <button class="btn" type="submit" name="submit" name="action">Login</button>
        </div>
        </form>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>