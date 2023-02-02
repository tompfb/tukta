<?php
include_once("db.php");
include('tag-function.php');
$tagFn = new tagFunction();
session_start();
date_default_timezone_set('Asia/Bangkok');
if ($_POST['tagName']) {
    $tagName = $_POST['tagName'];
    $tagName  = mb_convert_encoding($tagName, 'UTF-8', mb_detect_encoding($tagName));
    $tagName  = htmlentities($tagName, ENT_NOQUOTES, 'UTF-8');
    $tagName  = preg_replace('`&([ก-เ][a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $tagName);
    $tagName  = html_entity_decode($tagName, ENT_NOQUOTES, 'UTF-8');
    $tagName  = preg_replace(array('`[^a-z0-9ก-เ]`i', '`[-]+`'), '', $tagName);
    $tagName  = strtolower(trim($tagName, ''));
    $userId = $_SESSION["username"];
    $checkDuplicate = $tagFn->checkDuplicateTagName($tagName);
    if ($checkDuplicate == 0) {
        $sqlQueryString = "INSERT INTO `tag` (`Tag_id`, `Tag_name`, `Tag_username`, `Tag_create_at`) VALUES (NULL, '$tagName', '$userId', current_timestamp());";
        $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
        if ($result_set) {
            echo "<script type='text/javascript'>";
            echo "alert('เพิ่มข้อมูลสำเร็จ');";
            echo "window.location='../tag.php';";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Error back to add tag again');";
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
    echo "window.location='../tag.php';";
    echo "</script>";
}
