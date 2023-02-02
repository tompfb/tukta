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

include_once('../functions/picture-function.php');
$pictureFn = new pictureFunction();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);
$pictureId = $query['pictureId'];
$articleId = $query['articleId'];

// remove file in folder "uploads"
$picture = $pictureFn->pictureGetById($pictureId)->fetch_assoc();
$file_to_delete = '../uploads/' . $picture['Picture_name'];
unlink($file_to_delete);

$result = $pictureFn->pictureDelete($pictureId);
if ($result) {
    echo "<script>window.location.href='./article-picture.php?pId=$articleId'</script>";
} else {
    echo "<script>window.alert('Failed to delete file.')</script>";
    echo "<script>window.location.href='./article-picture.php?pId=$articleId'</script>";
}
