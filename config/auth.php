<?php

session_start();
include('../config/dbcon.php');


if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Login First";
    header('Location: ../front/login.php');
    exit(0);
} else {
    if ($_SESSION['auth_role_as'] != "1") {
        $_SESSION['message'] = "You are not Authorized";
        header('Location: ../front/index.php');
        exit(0);
    } elseif ($_SESSION['auth_role_as'] == "0") {
        $_SESSION['message'] = "Welcome to dashboard";
        header('Location: ../admin/dashboard.php');
        exit(0);
    }
}
