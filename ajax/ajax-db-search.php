<?php
require_once('../functions/db.php');
include_once('../functions/picture-function.php');
include_once('../functions/product-function.php');
$productFn = new productFunction();
$pictureFn = new pictureFunction();

$products = $productFn->productGetAll();

if (isset($_POST['query'])) {
    $query = "SELECT * FROM tb_product WHERE Product_name LIKE '{$_POST['query']}%' LIMIT 100";
    $result = mysqli_query($connect, $query); ?>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_array($result)) {
            $productName = $product['Product_name'];
            $productPrice = $product['Product_price'];
            $productDesc = $product['Product_description'];

            $Pictures = $pictureFn->pictureGetByProductId($product['Product_id']);
            $picture = $Pictures->fetch_assoc(); ?>

            <div class="col-6 col-md-4 col-lg-4 col-xl-3 p-2">
                <!-- <div class="col col-md col-lg col-xl p-2"> -->
                <a <?php echo "href='./view-product.php?vId=" . $product["Product_id"] . "'" ?> class="card card-product">
                    <?php if (isset($picture['Picture_name'])) { ?>
                        <img class="img-product img-thumbnail" <?php echo "src='uploads/" . $picture['Picture_name'] . "'" ?> alt="" class="card-img-top">
                    <?php } else { ?>
                        <img class="img-product img-thumbnail" <?php echo "src='assets/no-image.png'" ?> alt="" class="card-img-top">
                    <?php } ?>

                    <div class="card-body">
                        <h5 class="card-title"><?php print_r($productName); ?></h5>
                        <p class="card-text"><?php print_r($productDesc); ?></p>
                        <p class="card-text"> <span class="text-danger float-start"><?php print_r(number_format($productPrice)); ?> ฿ &nbsp; &nbsp;
                                <span><?php
                                        // print_r(number_format($product['Product_amount'])); 
                                        ?> </span></span></p>
                    </div>
                </a>
                <!-- </div> -->
            </div>
        <?php  } ?>
<?php } else {
        echo "<p style='color:red'>ยังไม่มีสินค้า...</p>";
    }
}
