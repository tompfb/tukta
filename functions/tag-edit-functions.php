<?php
session_start();

include_once("db.php");
include('tag-function.php');
$tagFn = new tagFunction();

date_default_timezone_set('Asia/Bangkok');
if ($_POST['tagName'] && $_POST['tagId']) {
    $tagName = $_POST['tagName'];

    $tagId = $_POST['tagId'];
    $userId = $_SESSION["username"];
    $checkDuplicate = $tagFn->checkDuplicateTagName($tagName);
    if ($checkDuplicate == 0) {
        $sqlQueryString = "UPDATE `tag` SET `Tag_name` = '$tagName' WHERE `tag`.`Tag_id` =  $tagId;";
        $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
        if ($result_set) {
            echo "<script type='text/javascript'>";
            echo "alert('เเก้ไขข้อมูลสำเร็จ');";
            echo "window.location='../tag.php';";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Error back to edit tag again');";
            echo "window.location='../tag.php';";
            echo "</script>";
        }
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error Tag Name is duplicate data');";
        echo "window.location='../tag.php';";
        echo "</script>";
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Inavlid Please Try Again');";
    echo "window.location='../tag/';";
    echo "</script>";
}
