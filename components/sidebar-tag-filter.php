<div class="tag-part-line">
    <h3 class="py-2 ms-5">Tags</h3>
    <?php
    include_once('functions/db.php');
    include_once('functions/product-function.php');
    $prodFn = new productFunction();
    $products = $prodFn->getProductTag();
    while ($prod = $products->fetch_assoc()) { ?>
        <a class="tag" href="../../shop-page/tag/<?php echo $prod['Tag_name']; ?>">
            <?php echo $prod['Tag_name'];  ?>
        </a>
    <?php
    }
    ?>
</div>