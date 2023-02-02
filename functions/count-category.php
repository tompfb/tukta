<?php
session_start();
include_once('db.php');
include_once('product-function.php');
include_once('picture-function.php');

$productFn = new productFunction();
$pictureFn = new pictureFunction();

$products = $productFn->productGetAll();

// $productCate = $productFn->productCountCategory();
foreach ($connect->query('SELECT Product_category,COUNT(*)
FROM tb_product WHERE Product_category="Marvel";') as $row) {
    echo "<td>" . $row['Product_category'] . "</td>";
    echo $row['COUNT(*)'];
}
foreach ($connect->query('SELECT Product_category,COUNT(*)
FROM tb_product WHERE Product_category="BEAR";') as $row) {
    echo "<td>" . $row['Product_category'] . "</td>";
    echo $row['COUNT(*)'];
}
