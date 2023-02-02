<!-- DELETE FROM `tag` WHERE `tag`.`id` = 3 -->
<?php
include_once("db.php");
include('category-functions.php');
$cateFn = new cateFunction();
session_start();
date_default_timezone_set('Asia/Bangkok');
if ($_GET['cateId']) {
    $cateId = $_GET['cateId'];
    $userId = $_SESSION["username"];
    $sqlQueryString = "DELETE FROM `tb_category` WHERE `tb_category`.`c_id` = $cateId;";
    $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
    if ($result_set) {
        echo "<script type='text/javascript'>";
        echo "alert('ลบข้อมูลสำเร็จ');";
        echo "window.location='../category.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to delete category again');";
        echo "</script>";
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Inavlid Please Try Again');";
    echo "</script>";
}
