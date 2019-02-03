<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ .'/includes/head.inc.php'; ?>
<body>
    <div id="cursor"></div>
    <div class="main">
        <img class="birds" src="img/real-bird.jpg" alt="birds flying">
            <div class = "registration-done">
                <p id="login">Login has been successfull! Enjoy Content!</p>
                <form action="post">
                    <div class="attribute">attribute</div>
                    <div class="attribute"><input id="attribute" type="text" name="attribute" placeholder="Random Attribute"></div>
                    <div class="attribute">value</div>
                    <div class="attribute"><input id="attribute-value" type="text" name="value" placeholder="Random Attribute Value"></div>
                    <button id="btn-attribute" class="btn-login" type="button">Add Attribute</button>
                </form>
                <div class="attribute"><a href="logout.php">Logout</a></div>
            </div>
        <div class="footer"><p>all rights reserved "magebit" 2016.</p></div>
    </div>
    <script src="js/add-attribute.js"></script>
    <script src="js/mouse-controls.js"></script>
</body>
</html>