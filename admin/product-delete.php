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

include_once('../functions/product-function.php');
include_once('../functions/picture-function.php');

$productFn = new productFunction();
$pictureFn = new pictureFunction();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);
$pId = $query['pId'];

echo "deleting...";

// delete all picture
$pictures = $pictureFn->pictureGetByProductId($pId);
while ($picture = $pictures->fetch_assoc()) {
    // remove file in folder "uploads"
    $file_to_delete = '../uploads/' . $picture['Picture_name'];
    unlink($file_to_delete);

    $resultPicture = $pictureFn->pictureDelete($picture['Picture_id']);
}

// delete product
echo "<br>pId => " . $pId . "<br>";
$result = $productFn->productDelete($pId);
echo "result => " . $result . "<br>";
if ($result) {
    echo "<script>window.location.href='../add-product.php'</script>";
} else {
    echo "<script>window.alert('Failed to delete product.')</script>";
    echo "<script>window.location.href='../add-product.php'</script>";
}
