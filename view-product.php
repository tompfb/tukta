<?php
include_once('functions/db.php');
include_once('functions/product-function.php');
include_once('functions/picture-function.php');
$productFn = new productFunction();
$pictureFn = new pictureFunction();


$sql1 = "UPDATE tb_product SET Product_view=Product_view+1 WHERE Product_name='$_GET[Product_name]'";
mysqli_query($connect, $sql1) or die('ข้อผิดพลาด' . mysqli_error($connect));

$product_names = $_GET["Product_name"];
$products = $productFn->getProductByName($_GET["Product_name"]);
$product = $products->fetch_assoc();
$Pictures = $pictureFn->pictureGetByProductId($product['Product_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['Product_name']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" content="th" />
    <meta name="description" content="<?php echo $product['Product_description']; ?>">
    <meta name="robots" content="index,follow">

    <link rel="alternate" href="https://www.xn--12cai0ebh3gtfbb3dua6s.net/view-product/<?php echo $product_names ?>" hreflang="th-TH" />
    <link rel="canonical" href="https://www.xn--12cai0ebh3gtfbb3dua6s.net/view-product/<?php echo $product_names ?>" />


    <link rel="shortcut icon" href="../assets/logo.ico" type="image/x-icon">
    <link rel="icon" href="../assets/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/view-product.css">


    <?php include_once('assets/styles.html'); ?>

    <style>
        .tag {

            border-radius: 20px;

            border: #FF339B solid 1px;

            padding: 2px 10px;

            margin: 2px;

        }



        .tag:hover {

            background-color: #FF339B;

        }



        a.tag:hover {

            background-color: #FF339B;

            color: #fff;

        }



        a {

            text-decoration: none;

            color: #000;

        }



        .page-title {

            text-align: center;

        }



        .product-img {

            width: 100%;

            height: 100px;

            object-fit: contain;

            cursor: pointer;

            transition: all 0.2 ease;

        }



        .product-img:hover {

            transform: scale(1.05);

        }



        .img-showing {

            width: 100%;

            object-fit: contain;

            object-position: top;

            height: 500px;

        }



        .backcls {

            text-decoration: none;

            color: #333;

        }



        .backcls:hover {

            color: #ee7b7b;

        }



        .card {

            border: none;

        }



        .btn-shop a:hover {

            color: white;

            opacity: 0.8;

        }
    </style>

</head>



<body>

    <?php include('./header.php') ?>

    <div class="container py-5">

        <div class="container py-5">
            <div class="row">
                <div class="col-8">
                    <div class="border shadow-sm p-3 bg-light">

                        <div class="show-img mb-4">

                            <img class="img-showing" src="assets/no-image.png" alt="" id="img-showing">

                        </div>

                        <div class="row">

                            <?php while ($picture = $Pictures->fetch_assoc()) { ?>

                                <div class="col-3 mb-3">

                                    <img class="product-img" <?php echo "src='../uploads/" . $picture['Picture_name'] . "'"; ?> alt="" onclick="selectShowImage(this)">

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="col-4">



                    <a href="../shop-page/category/all" class="btn btn-sm btn-link border-0 mb-3  backcls">

                        กลับไปยังหน้าร้าน

                    </a>

                    <div class="card">

                        <div class="card-body">

                            <h2> <?php echo $product['Product_name']; ?> </h2>

                            <h4 class="price"> <?php echo "฿" . number_format($product['Product_price']); ?> </h4>

                            <p class="text-secondary"> <?php echo $product['Product_description']; ?> </p>

                            <div class="form-group mb-4" style="font-size: 16px;">

                                มีสินค้าทั้งหมด <?php echo number_format($product['Product_amount']); ?> ชิ้น

                            </div>

                            <div class="btn-shop">

                                <a href="https://line.me/ti/p/~yimyam888" target="_blank" role="button" class="btn btn-block btn-outline-light" style="background-color: #00B900;"> <i class="fab fa-line"></i> สั่งซื้อสินค้า </a>

                                <a href="https://www.facebook.com/dollytopfy" target="_blank" role="button" class="btn btn-block btn-outline-light" style="background-color: #3b5998;"> <i class="fab fa-facebook"></i> สั่งซื้อสินค้า </a>

                            </div>

                        </div>

                    </div>

                    <?php

                    include_once('functions/tag-function.php');

                    $tagFn = new tagFunction();

                    $tags = $tagFn->getTagByProduct($product['Product_id']);

                    ?>

                    <span>

                        <strong>

                            Tags :

                        </strong>

                        <?php

                        while ($tag = $tags->fetch_assoc()) {

                        ?>

                            <a class="tag" href="../shop-page/tag/<?php echo $tag['Tag_name']; ?>">

                                <?php echo $tag['Tag_name'];  ?>

                            </a>

                        <?php } ?>

                    </span>

                </div>
            </div>
        </div>

    </div>

    </div>

    <?php include('./footer.php') ?>
    <?php include_once('./assets/scripts.html'); ?>

    <script>
        window.document.body.onload = (event => {

            const elImages = document.getElementsByClassName('product-img');



            selectShowImage(elImages[0]);

        });



        function selectShowImage(event) {

            const elImgShowing = document.getElementById('img-showing');

            elImgShowing.src = event.src;

        }
    </script>



</body>