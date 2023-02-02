<?php
session_start();
include_once("db.php");
include('category-functions.php');
$cateFn = new cateFunction();

date_default_timezone_set('Asia/Bangkok');
if ($_POST['cateName'] && $_POST['cateId']) {
    $cateName = $_POST['cateName'];
    $cateSqu = $_POST['cateSqu'];
    $cateSqu2 = $_POST['cateSqu2'];
    $cateId = $_POST['cateId'];
    $userId = $_SESSION["username"];
    $checkDuplicateName = $cateFn->checkDuplicateCateName($cateName);
    $checkDup = $cateFn->checkDupSqu($cateSqu, $cateSqu2, $cateId);
    if ($checkDuplicateName == 0) {
        if ($_POST['cateName'] == trim($_POST['cateName']) && strpos($_POST['cateName'], ' ') !== false) {
            $newUrl = str_replace(" ", "-", $_POST['cateName']);
            $sqlQueryString = "UPDATE `tb_category` SET `c_name` = '$cateName',`c_sequence`='$cateSqu',`category_url`='$newUrl' WHERE `tb_category`.`c_id` = '$cateId';";
            $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
            if ($result_set) {
                echo "<script type='text/javascript'>";
                echo "alert('แก้ไขข้อมูลสำเร็จ!!!');";
                echo "window.location='../category.php';";
                echo "</script>";
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('Error back to add category again');";
                echo "window.location='../category.php';";
                echo "</script>";
            }
        } else {
            $sqlQueryString = "UPDATE `tb_category` SET `c_name` = '$cateName',`c_sequence`='$cateSqu',`category_url`='$cateName' WHERE `tb_category`.`c_id` = '$cateId';";
            $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
            if ($result_set) {
                echo "<script type='text/javascript'>";
                echo "alert('แก้ไขข้อมูลสำเร็จ!!!');";
                echo "window.location='../category.php';";
                echo "</script>";
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('Error back to add category again');";
                echo "window.location='../category.php';";
                echo "</script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error category Name is duplicate data');";
        echo "window.location='../category.php';";
        echo "</script>";
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Invalid Please Try Again');";
    echo "window.location='../category/';";
    echo "</script>";
}
