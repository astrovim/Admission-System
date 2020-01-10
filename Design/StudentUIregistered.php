<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="StudentUIregStyle.css">  

</head>
<body>
<div class="Registered">
               <div>
               <img src="/rsrc/download.png" width="200" height="200">
               </div>
               Registration Successful!
               <div>
                   <form action="StudentUIreg.php">
                       <span id="Ref">Here is your Reference Number:</span>
                   <div>
                   <input id="Reg" type="text" value="<?php echo $regID ?>" disabled>
                   </div>
                   <button class="btn" type="submit">BACK</button>
                   </form>
               </div>
            </div>
</body>
</html>