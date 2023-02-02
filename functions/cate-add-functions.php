<?php
include_once("db.php");
include('category-functions.php');
$cateFn = new cateFunction();
session_start();
date_default_timezone_set('Asia/Bangkok');

if ($_POST['cateName']) {
    $cateName = $_POST['cateName'];
    $cateSqu = $_POST['cateSqu'];
    $userId = $_SESSION["username"];
    $checkDuplicate = $cateFn->checkDuplicateCateName($cateName);

    //friendly URL conversion
    $url = $_POST['cateName'];
    function to_pretty_url($url)
    {
        if ($url !== mb_convert_encoding(mb_convert_encoding($url, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
            $url  = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url));
            $url  = htmlentities($url, ENT_NOQUOTES, 'UTF-8');
            $url  = preg_replace('`&([ก-เ][a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $url);
            $url  = html_entity_decode($url, ENT_NOQUOTES, 'UTF-8');
            $url  = preg_replace(array('`[^a-z0-9ก-เ]`i', '`[-]+`'), '-', $url);
            $url  = strtolower(trim($url, '-'));
        return $url;
    }
    $url = to_pretty_url($url);
    if ($checkDuplicate == 0) {
        $sqlQueryString = "INSERT INTO `tb_category` (`c_id`, `c_name`, `c_username`,`c_sequence`, `c_create_at`,`category_url`) VALUES (NULL, '$cateName','$userId','$cateSqu',current_timestamp(),'$url ');";
        $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
        if ($result_set) {
            echo "<script type='text/javascript'>";
            echo "alert('เพิ่มข้อมูลสำเร็จ!!!');";
            echo "window.location='../category.php';";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Error back to add category again');";
            echo "window.location='../category.php';";
            echo "</script>";
        }
        // if ($_POST['cateName'] == trim($_POST['cateName']) && strpos($_POST['cateName'], ' ') !== false) {
        //     $newUrl = str_replace(" ", "-", $_POST['cateName']);
        //     $sqlQueryString = "INSERT INTO `tb_category` (`c_id`, `c_name`, `c_username`,`c_sequence`, `c_create_at`,`category_url`) VALUES (NULL, '$cateName','$userId','$cateSqu',current_timestamp(),'$newUrl');";
        //     $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
        //     if ($result_set) {
        //         echo "<script type='text/javascript'>";
        //         echo "alert('เพิ่มข้อมูลสำเร็จ!!!');";
        //         echo "window.location='../category.php';";
        //         echo "</script>";
        //     } else {
        //         echo "<script type='text/javascript'>";
        //         echo "alert('Error back to add category again');";
        //         echo "window.location='../category.php';";
        //         echo "</script>";
        //     }
        // } else {
        //     $sqlQueryString = "INSERT INTO `tb_category` (`c_id`, `c_name`, `c_username`,`c_sequence`, `c_create_at`,`category_url`) VALUES (NULL, '$cateName','$userId','$cateSqu',current_timestamp(),'$cateName');";
        //     $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
        //     if ($result_set) {
        //         echo "<script type='text/javascript'>";
        //         echo "alert('เพิ่มข้อมูลสำเร็จ!!!');";
        //         echo "window.location='../category.php';";
        //         echo "</script>";
        //     } else {
        //         echo "<script type='text/javascript'>";
        //         echo "alert('Error back to add category again');";
        //         echo "window.location='../category.php';";
        //         echo "</script>";
        //     }
        // }
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error category Name is duplicate data');";
        echo "window.location='../category.php';";
        echo "</script>";
    }
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Inavlid Please Try Again');";
    echo "window.location='../category.php';";
    echo "</script>";
}
