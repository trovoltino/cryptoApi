<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ .'/includes/head.inc.php'; ?>
<body>
    <div id="cursor"></div>
    <main class="main">
        <img class="birds" id="birds" src="img/real-bird.jpg" alt="birds flying">
        <div class="container">
            <div class="grid">
                <div id="sliding-field" class="login-field">
                    <?php include __DIR__ .'/includes/form.inc.php'; ?>
                </div>
                <?php include __DIR__ .'/includes/fields.inc.php'; ?>
            </div>
        </div>
        <div class="footer"><p>all rights reserved "magebit" 2016.</p></div>
    </main>
    <script src="js/add-user.js"></script>
    <script src="js/login-user.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mouse-controls.js"></script>
</body>
</html>