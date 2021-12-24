<?php

session_start();
include('../config/dbcon.php');


if (isset($_POST['btn-delete'])) {
    $user_id = $_POST['btn-delete'];

    $user_delete = "DELETE FROM users WHERE id='$user_id'";
    $user_delete_run = mysqli_query($con, $user_delete);

    if ($user_delete_run) {
        $_SESSION['message'] = "Delete with success";
        header('Location: ../admin/users.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Wrong !!";
        header('Location: ../admin/users.php');
        exit(0);
    }
}

if (isset($_POST['update_user'])) {

    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);

    $user_update_query = "UPDATE users SET name='$name', email='$email', role_as='$role_as' WHERE id='$user_id'";
    $user_update_query_run = mysqli_query($con, $user_update_query);

    if ($user_update_query_run) {
        $_SESSION['message'] = "Updated with success";
        header('Location: ../admin/users.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Wrong !!";
        header('Location: ../admin/user_update.php');
        exit(0);
    }
}
