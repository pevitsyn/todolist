<?php
    session_start();
    ?>
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <form action="testreg.php" method="post">
 <p>
    <label>your login:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p> 
    <p>
    <label>your password:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
    <input type="submit" name="submit" value="enter">
<br>
    </p></form>
    <br>
    </body>
    </html>
