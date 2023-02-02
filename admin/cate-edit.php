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

include_once('../functions/category-functions.php');
$cateFn = new cateFunction();

if ($_GET['cateId']) {
    $cateId = $_GET['cateId'];
    $result = $cateFn->getFromCateById($cateId);
    $row = mysqli_fetch_array($result);
    // print_r($row);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products management</title>

    <link rel="stylesheet" type="text/css" href="../style/products-management.css">
    <link rel="stylesheet" type="text/css" href="../style/dashboard.css">

    <?php include_once('../assets/styles.html'); ?>
    <style>
        .icon-sidebar {
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <div class="navbar-wrapper" id="navbar-content">
            <div class="navbar navbar-expand">
                <a href="javascript:;" class="link-light" onclick="setSidebarCollapse()">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link dropdown-toggle link-light" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> บัญชี</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="index.php">หน้าแรก</a></li>
                            <li><a class="dropdown-item" href="products-management.php?logout='1'">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="sidebar-wrapper" id="sidebar-content">
        <div class="sidebar-content">
            <div class="sidebar-header">
                <a href="javascript:;" class="sidebar-brand link-light">
                    <span class="brand">Brandner</span>
                    <span class="brand-collapsed">B</span>
                </a>
            </div>
            <div class="sidebar-menu">
                <div for="" class="menu-label"> </div>
                <ul class="menu-group">
                    <li> <a class="menu-item link-light" href="../products-management.php">
                            <i class="fas fa-chart-line icon-padding"></i>
                            <span class="menu-item-label">แดชบอร์ด</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../add-product.php">
                            <i class="fab fa-reddit-alien icon-padding"></i>
                            <span class="menu-item-label">จัดการสินค้า</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../add-article.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                feed
                            </span>
                            <span class="menu-item-label">จัดการบทความ</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../tag.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                tag
                            </span>
                            <span class="menu-item-label">แท็ก</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../category.php">
                            <i class="fas fa-layer-group  icon-padding"></i>
                            <span class="menu-item-label">หมวดหมู่</span> </a>
                    </li>
                    <li> <a class="menu-item link-light" href="../add-admin.php">
                            <span class="material-icons icon-sidebar icon-padding">
                                admin_panel_settings
                            </span>
                            <span class="menu-item-label">ผู้ดูแลระบบ</span> </a>
                    </li>
                </ul>
                <div class="mt-auto text-end">
                    <a href="javascript:;" class="icon-toggle link-light" onclick="setSidebarCollapse()">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-wrapper" id="page-content">
        <div class="page-content">

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="col-md-12">
                        <div class="row">
                            <form method="POST" action="../functions/category-edit-function.php">
                                <div class="form-group">
                                    <label for="labelTagName">Category Name</label>
                                    <input type="hidden" class="form-control" id="cateId" placeholder="Please Input Category" name="cateId" value="<?php echo $row['c_id'] ?? $row['c_id']; ?>">
                                    <input type="text" class="form-control" id="cateName" placeholder="Please Input Category" name="cateName" value="<?php echo $row['c_name'] ?? $row['c_name']; ?>">

                                    <!-- <label for="labelStatus" class="mt-2">Status <?php echo $row['c_status']; ?></label>
                                    <select id="cateSta" name="cateSta" class="form-select form-select-sm" aria-label=".form-select-sm example" value="<?php echo $row['c_status']; ?>">
                                        <option <?php if ($row['c_status'] == 1) {
                                                    echo "selected";
                                                } ?> value="1">เปิดสถานะ</option>
                                        <option <?php if ($row['c_status'] == 0) {
                                                    echo "selected";
                                                } ?> value="0">ปิดสถานะ</option>
                                    </select> -->

                                    <label for="labelSquence" class="mt-2">Sequence number</label>
                                    <input type="number" class="form-control mt-2" id="cateSqu" placeholder="Please Input Sequence" name="cateSqu" value="<?php echo $row['c_sequence']; ?>">
                                    <input type="hidden" class="form-control mt-2" id="cateSqu2" placeholder="Please Input Sequence" name="cateSqu2" value="<?php echo $row['c_sequence']; ?>">

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <?php include_once('../assets/scripts.html'); ?>
</body>

</html>