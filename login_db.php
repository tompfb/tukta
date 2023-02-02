<?php
session_start();
include('functions/admin-function.php');
$errors = array();
$adminFn = new adminFunction();

if (isset($_POST['login_user'])) {
   
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $result = $adminFn->adminLogin($username, $password);
        if ($result->num_rows >= 1) {
            $member = $result->fetch_assoc();
            $_SESSION['username'] = $member['username'];
            $_SESSION['user_id'] = $member['id'];
            $user = $_SESSION['user_id'];
            $_SESSION['success'] = "Your are now logged in";
            echo "<script> window.location.href = 'products-management.php'; </script>";
        } else {
            echo "<script> window.alert('Username or Password incorrected!'); </script>";
            $_SESSION['error'] = "Why you try to login ?";
            echo mysqli_fetch_row($result);
            header("location: login.php");
        }

    }
} else {

    array_push($errors, "Username & Password is required");

    $_SESSION['error'] = "Username & Password is required";

    header("location: login.php");

}

