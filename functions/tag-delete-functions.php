<!-- DELETE FROM `tag` WHERE `tag`.`id` = 3 -->
<?php
include_once("db.php");
include('tag-function.php');
$tagFn = new tagFunction();
session_start();
date_default_timezone_set('Asia/Bangkok');
if ($_GET['tagId']) {
    $tagId = $_GET['tagId'];
    $userId = $_SESSION["username"];
    $sqlQueryString = "DELETE FROM `tag` WHERE `tag`.`Tag_id` = $tagId;";
    $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
    if ($result_set) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location='../tag.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to delete tag again');";
        echo "</script>";
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Inavlid Please Try Again');";
    echo "</script>";
}
