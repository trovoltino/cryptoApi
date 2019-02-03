<?php

require_once(__DIR__ . '/base-connection.php');
require_once(__DIR__ . '/forgot-password.php');
require_once(__DIR__ . '/login-user.php');
require_once(__DIR__ . '/add-user.php');
require_once(__DIR__ . '/add-attribute.php');
/**
* Depending on which button got pressed will execute coresponding query.
*/
(isset($_POST['btnLogin']) ?
$LoginUser = new LoginUser($_POST['email'], $_POST['userPw']) : '');

(isset($_POST['btnSignup']) ?
$AddUser = new AddUser($_POST['email'], $_POST['userName'], $_POST['userPw']) : '');

(isset($_POST['btnForgot']) ?
$ForgotPassword = new ForgotPassword($_POST['forgotEmail']) : '');

(isset($_POST['btnAttribute']) ?
$AddAttribute = new AddAttribute($_POST['attribute'], $_POST['attributeValue']) : '');
