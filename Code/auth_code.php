<?php

session_start();
include('../config/dbcon.php');


if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_ps = mysqli_real_escape_string($con, $_POST['confirm_ps']);

    if ($password == $confirm_ps) {
        $register_check = "SELECT * FROM users WHERE email='$email'";
        $register_check_run = mysqli_query($con, $register_check);
        if (mysqli_num_rows($register_check_run) > 0) {
            $_SESSION['message'] = "Email Already Taken";
            header('Location: ../front/register.php');
            exit(0);
        } else {
            $register_query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
            $register_query_run = mysqli_query($con, $register_query);

            if ($register_query_run) {
                $_SESSION['message'] = "Registered With Successfully";
                header('Location: ../front/index.php');
                exit(0);
            } else {
                $_SESSION['message'] = "Something Went Wrong";
                header('Location: ../front/register.php');
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Confirm PassWord does match";
        header('Location: ../front/register.php');
        exit(0);
    }
}


if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        foreach ($login_query_run as $log) {
            $name = $log['name'];
            $email = $log['email'];
            $role_as = $log['role_as'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_name'] = $name;
        $_SESSION['auth_email'] = $email;
        $_SESSION['auth_role_as'] = $role_as;

        if ($_SESSION['auth_role_as'] == '1') {
            $_SESSION['message'] = "welcome to dashboard";
            header('Location: ../admin/dashboard.php');
            exit(0);
        } else if ($_SESSION['auth_role_as'] == '0') {
            $_SESSION['message'] = "welcome to index page";
            header('Location: ../front/index.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        header('Location: ../front/login.php');
        exit(0);
    }
} else {

    $_SESSION['message'] = "You are not login";
    header('Location: ../front/login.php');
    exit(0);
}


if (isset($_POST['logout_btn'])) {

    if (isset($_SESSION['auth']) === TRUE) {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_name']);
        unset($_SESSION['auth_email']);
        unset($_SESSION['auth_role_as']);



        $_SESSION['message'] = "You are Logout";
        header('Location: ../front/index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "You are not Login";
        header('Location: ../front/index.php');
        exit(0);
    }
}
