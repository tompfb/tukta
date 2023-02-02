<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "you should log in";
    echo "you should log in";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:index.php');
}
require('../functions/db.php');

$id = $_GET["idad"];
$sql = "DELETE FROM tb_admin WHERE id =$id";

$result = mysqli_query($connect, $sql);
if ($result) {
    echo "Delete success <br>";
    header("location: ../add-admin.php");
} else {
    echo "Error";
}
