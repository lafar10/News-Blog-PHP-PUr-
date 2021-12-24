<?php

session_start();
include('../config/dbcon.php');


if (isset($_POST['register_btn'])) {
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);

    $category_query = "INSERT INTO categories(category_name) VALUES('$category_name')";
    $category_query_run = mysqli_query($con, $category_query);

    if ($category_query_run) {
        $_SESSION['message'] = "Created with success $-$";
        header('Location: ../admin/categories.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something went wrong $-$";
        header('Location: ../admin/add_categories.php');
        exit(0);
    }
}

if (isset($_POST['btn-delete'])) {
    $category_id = $_POST['btn-delete'];

    $category_delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $category_delete_query_run = mysqli_query($con, $category_delete_query);

    if ($category_delete_query_run) {
        $_SESSION['message'] = "Deleted with success $*$";
        header('Location: ../admin/categories.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something went wrong $-$";
        header('Location: ../admin/categories.php');
        exit(0);
    }
}

if (isset($_POST['update_btn'])) {

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);

    $category_query_update = "UPDATE categories SET category_name='$category_name' WHERE id='$category_id'";
    $category_query_update_run = mysqli_query($con, $category_query_update);

    if ($category_query_update_run) {
        $_SESSION['message'] = "Updated with success $-$";
        header('Location: ../admin/categories.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something went wrong $-$";
        header('Location: ../admin/update_category.php');
        exit(0);
    }
}
