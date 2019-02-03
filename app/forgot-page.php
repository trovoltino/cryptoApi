<!DOCTYPE html>
<html>
<?php include __DIR__ .'/includes/head.inc.php'; ?>
<body>
    <div id="cursor"></div>
    <div class="main">
        <img class="birds" src="img/real-bird.jpg" alt="birds flying">
        <div class="container">
            <form class="registration-done" class="f1" action="" method="post">
                <div><h4>Please Submit Your Email</h4></div>
                <input id="forgot-email" type="text" name="email" placeholder="Enter Your Email">
                <button id="btn-forgot" type="button">Change Password</button><br>
                <a href="index.php">Home Page</a>
            </form>
        </div>
        <div class="footer"><p>all rights reserved "magebit" 2016.</p></div>
    </div>
    <script src="js/forgot-password.js"></script>
    <script src="js/mouse-controls.js"></script>
</body>
</html>