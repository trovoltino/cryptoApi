<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>
<!DOCTYPE html>
<html>
<?php include __DIR__ .'/includes/head.inc.php'; ?>
<meta http-equiv="refresh" content="2; index.php">
<body>
    <div class="main">
        <img class="birds" src="img/real-bird.jpg" alt="birds flying">
            <div class="registration-done" class="f1">
                <div id="logout">You Have Logged Out</div>
            </div>
        <div class="footer"><p>all rights reserved "magebit" 2016.</p></div>
    </div>
</body>
</html>