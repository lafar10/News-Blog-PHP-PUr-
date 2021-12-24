<?php

session_start();
include('../config/dbcon.php');

if (isset($_POST['post_sub_btn'])) {

    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];


    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    $imageExt = pathinfo($image_name, PATHINFO_EXTENSION);
    $imageActualExt = strtolower($imageExt);

    $allowed = array("png", "jpg", "jpeg");

    if (in_array($imageActualExt, $allowed)) {
        if ($error === 0) {
            if ($image_size < 1000000) {
                $new_image_name = uniqid("", true) . "." . $imageActualExt;
                $imageDestination = '../uploads/' . $new_image_name;
                move_uploaded_file($tmp_name, $imageDestination);

                $post_save_query = "INSERT INTO post(name,description,category_id,meta_title,meta_description,meta_keyword,image)    
                                     VALUES('$name','$description','$category_id','$meta_title','$meta_description','$meta_keyword','$new_image_name')";
                $post_save_query_run = mysqli_query($con, $post_save_query);

                if ($post_save_query_run) {
                    $_SESSION['message'] = "Created with success $-$";
                    header('Location: ../admin/posts.php');
                    exit(0);
                } else {

                    $_SESSION['message'] = "something went wrong $-$";
                    header('Location: ../admin/add_posts.php');
                    exit(0);
                }
            } else {
                $_SESSION['message'] = "Size to Large $-$";
                header('Location: ../admin/add_posts.php');
                exit(0);
            }
        } else {
            $_SESSION['message'] = "something went wrong $-$";
            header('Location: ../admin/add_posts.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "You can't upload this file $-$";
        header('Location: ../admin/add_posts.php');
        exit(0);
    }
}

if (isset($_POST['delete_btn'])) {
    $post_id = $_POST['delete_btn'];

    $post_query = "DELETE FROM post WHERE id='$post_id'";

    $post_query_run = mysqli_query($con, $post_query);

    if ($post_query_run) {

        $_SESSION['message'] = "Delete With Success ^+^";
        header('Location: ../admin/posts.php');
        exit(0);
    } else {

        $_SESSION['message'] = "something went wrong";
        header('Location: ../admin/posts.php');
        exit(0);
    }
}

if (isset($_POST['post_update_btn'])) {

    $post_id = $_POST['post_id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $old_filename = $_POST['old_image'];

    $updated_file = "";

    if ($image_name != NULL) {
        $imageExt = pathinfo($image_name, PATHINFO_EXTENSION);
        $imageActualExt = strtolower($imageExt);
        $updated_file = $imageActualExt;
    } else {
        $updated_file = $old_filename;
    }

    $query_up = "UPDATE post SET name='$name',description='$description',category_id='$category_id',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',image='$updated_file') Where id='$post_id'";
    $query_run = mysqli_query($con, $query_up);

    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('../uploads' . $old_filename)) {
                unlink("'../uploads' . $old_filename");
            }
            $new_image_name = uniqid("", true) . "." . $imageActualExt;
            $imageDestination = '../uploads/' . $new_image_name;
            move_uploaded_file($tmp_name, $imageDestination);
        }

        $_SESSION['message'] = "Post Updated With success";
        header('Location: ../admin/posts.php');
        exit(0);
    } else {

        $_SESSION['message'] = "something went wrong";
        header('Location: ../admin/posts.php');
        exit(0);
    }
}
