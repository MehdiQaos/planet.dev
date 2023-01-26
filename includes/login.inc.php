<?php

session_start();

include "../classes/dbh.class.php";
include "../classes/loginmodel.class.php";
include "../classes/logincontr.class.php";

if (isset($_POST['login'])) {
    $uid = $_POST['email'];
    $pwd = $_POST['password'];

    $login = new LoginContr($uid, $pwd);
    $row = $login->loginUser();
    if ($login->_error) {
        header('location: ../login.php?error=' . $login->_errorMsg);
        exit();
    }

    $_SESSION['user_info'] = $row;
    header('location: ../index.php?error=none');
}