<div class="container">
    <h2 class="mb-4 mt-4">แดชบอร์ด</h2>
</div>

<?php
include_once('functions/db.php');
include_once('functions/admin-function.php');
include_once('functions/article-function.php');
include_once('functions/product-function.php');
include_once('functions/tag-function.php');
include_once('functions/category-functions.php');
$adminsFn = new adminFunction();
$articleFn = new articleFunction();
$productFn = new productFunction();
$tagFn = new tagFunction();
$cateFn = new cateFunction();

$products = $productFn->productCount();
$articles = $articleFn->articleCOUNT();
$admins = $adminsFn->adminCOUNT();
$tags = $tagFn->tagCount();
$cates = $cateFn->cateCount();
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 col-xxl-3 pd-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            <i class="fab fa-reddit-alien"></i>
                        </h5>
                        <div></div>
                        <div></div>
                        <h5>
                            <?php
                            $row = $products->fetch_assoc();
                            echo $row['COUNT(*)'];
                            ?>
                        </h5>
                        <span class="d-flex">ทั้งหมด</span>
                    </div>
                    <div class="d-flex justify-content-between">
                    </div>
                    <p class="card-text">สินค้า</p>
                    <a href="add-product.php" class="btn btn-dark">รายละเอียด</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 col-xxl-3 pd-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            <span class="material-icons icon-dash">
                                feed
                            </span>
                        </h5>
                        <div></div>
                        <div></div>
                        <h5>
                            <?php
                            $row = $articles->fetch_assoc();
                            echo $row['COUNT(*)'];
                            ?>
                        </h5>
                        <span class="d-flex">ทั้งหมด</span>
                    </div>
                    <div class="d-flex justify-content-between">
                    </div>
                    <p class="card-text">บทความ</p>
                    <a href="add-article.php" class="btn btn-dark">รายละเอียด</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 col-xxl-3 pd-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            <span class="material-icons icon-dash">
                                tag
                            </span>
                        </h5>
                        <div></div>
                        <div></div>
                        <h5>
                            <?php
                            $row = $tags->fetch_assoc();
                            echo $row['COUNT(*)'];
                            ?>
                        </h5>
                        <span class="d-flex">ทั้งหมด</span>
                    </div>
                    <div class="d-flex justify-content-between">
                    </div>
                    <p class="card-text">แท็ก</p>
                    <a href="tag.php" class="btn btn-dark">รายละเอียด</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 col-xxl-3 pd-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            <i class="fas fa-layer-group  icon-padding"></i>
                        </h5>
                        <div></div>
                        <div></div>
                        <h5>
                            <?php
                            $row = $cates->fetch_assoc();
                            echo $row['COUNT(*)'];
                            ?>
                        </h5>
                        <span class="d-flex">ทั้งหมด</span>
                    </div>
                    <div class="d-flex justify-content-between">
                    </div>
                    <p class="card-text">หมวดหมู่</p>
                    <a href="category.php" class="btn btn-dark">รายละเอียด</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 col-xxl-3 pd-10">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            <span class="material-icons icon-dash">
                                admin_panel_settings
                            </span>
                        </h5>
                        <div></div>
                        <div></div>
                        <h5>
                            <?php
                            $row = $admins->fetch_assoc();
                            echo $row['COUNT(*)'];
                            ?>
                        </h5>
                        <span class="d-flex">ทั้งหมด</span>
                    </div>
                    <div class="d-flex justify-content-between">
                    </div>
                    <p class="card-text">ผู้ดูแลระบบ</p>
                    <a href="add-admin.php" class="btn btn-dark">รายละเอียด</a>
                </div>
            </div>
        </div>
    </div>
</div>