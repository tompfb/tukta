<h3 class="py-2 ms-5">หมวดหมู่สินค้า</h3>
<ul class="product-categories">
    <li class="cat-item">
        <a class="uppercase" href="../../shop-page/category/all">
            ทั้งหมด
        </a>
    </li>
    <?php
    include_once('functions/category-functions.php');
    $cateFn = new cateFunction();
    $cates = $cateFn->getFromAllcate();
    include_once('functions/db.php');

    $sql = "SELECT tb_product.Product_category,tb_category.category_url,COUNT(*) FROM tb_product INNER JOIN tb_category ON tb_product.Product_category=tb_category.c_name WHERE tb_product.Product_category = tb_category.c_name GROUP BY tb_category.c_sequence";
    // $result = ($connect->query($sql));

    foreach ($connect->query('SELECT tb_product.Product_category,tb_category.category_url,COUNT(*) FROM tb_product JOIN tb_category ON tb_product.Product_category=tb_category.c_name WHERE tb_product.Product_category = tb_category.c_name GROUP BY tb_category.c_sequence') as $row) { ?>
        <li class="cat-item">
            <a class="uppercase" href="../../shop-page/category/<?php echo $row['category_url']; ?>">
                <?php echo $row['Product_category'];  ?>
            </a>
            <span class="count">
                <?php echo $row['COUNT(*)']; ?>
            </span>
        </li>
    <?php
    }
    ?>
</ul>