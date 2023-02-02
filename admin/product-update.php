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

include_once('../functions/db.php');
include_once('../functions/product-function.php');
include_once('../functions/picture-function.php');
include_once('../functions/tag-function.php');

$pictureFn = new pictureFunction();
$productFn = new productFunction();
$tagFn = new tagFunction();

$products = $productFn->productGetAll();
$tags = $tagFn->getFromAllTag();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);
$pId = $query['pId'];

$product = $productFn->productGetById($pId)->fetch_assoc();
$product_id = $product['Product_id'];
$user_id =  $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $cate = $_POST['cate'];
    $username = $_SESSION['username'];
    $update_by = $_POST['update_by'];

    $url = $_POST['name'];
    function to_pretty_url($url)
    {
        if ($url !== mb_convert_encoding(mb_convert_encoding($url, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
            $url  = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url));
        $url  = htmlentities($url, ENT_NOQUOTES, 'UTF-8');
        $url  = preg_replace('`&([ก-เ][a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $url);
        $url  = html_entity_decode($url, ENT_NOQUOTES, 'UTF-8');
        $url  = preg_replace(array('`[^a-z0-9ก-เ]`i', '`[-]+`'), '-', $url);
        $url  = strtolower(trim($url, '-'));
        return $url;
    }
    $url = to_pretty_url($url);


    $result = $productFn->productUpdate($id, $name, $desc, $price,  $amount, $status, $url, $cate);
    if (!empty($result)) {
        $result_delete = $productFn->productTagDelete($id);
        if (!empty($result_delete)) {
            foreach ($_POST['tag'] as $tag_id) {
                $save_tag = $productFn->productUpdateTag($tag_id, $id, $update_by);
            }
            echo "<script type='text/javascript'>";
            echo  "alert('Update success!');";
            echo "window.location='../add-article.php';";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo  "alert('เพิ่ม แท็คผิดพลาด!');";
            echo "window.location='../add-article.php';";
            echo "</script>";
        }

        // header("location: ../add-product.php");
    } else {
        echo "<script>
                window.alert('Update Data Failed!!!. Try again later.');
              </script>";
        echo "<script>
                window.location.href = 'product-update.php?pId=$pId';
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product update</title>
    <link rel="icon" href="../assets/logo.ico" type="image/ico">

    <link rel="stylesheet" type="text/css" href="../style/products-management.css">
    <?php include_once('../assets/styles.html'); ?>
</head>

<style>


</style>

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

            <div class="container mt-3">
                <div class="form-inline">
                    <h5> <i class="fas fa-edit"></i> แก้ไขข้อมูลสินค้า</h5>
                </div>
                <form method="POST">
                    <input type="hidden" name="update_by" value="<?php echo $user_id; ?>">
                    <div class="form-group sr-only" hidden>
                        <label for="">รหัสสินค้า</label>
                        <input type="text" name="id" class="form-control" placeholder="" required <?php echo "value='" . $product["Product_id"] . "'"; ?>>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">ชื่อสินค้า</label>
                                <input type="text" name="name" class="form-control" placeholder="" required <?php echo "value='" . $product["Product_name"] . "'"; ?>>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">ราคาสินค้า</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">฿</div>
                                    </div>
                                    <input type="number" name="price" class="form-control" placeholder="0" min="0" max="9999999" required <?php echo "value='" . $product["Product_price"] . "'"; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">จำนวนคงเหลือ</label>
                                <div class="input-group">
                                    <input type="number" name="amount" class="form-control" placeholder="0" min="0" max="9999999" required <?php echo "value='" . $product["Product_amount"] . "'"; ?>>
                                    <div class="input-group-append">
                                        <div class="input-group-text">ชิ้น</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- //! tag -->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 form-group">
                            <label class="lb-fontw">แท็ก</label>
                            <select id="multiple-optgroups" multiple name="tag[]" id="tag[]">
                                <optgroup>
                                    <?php
                                    $query = "SELECT * FROM tag ORDER BY Tag_id asc" or die("ERROR:" . mysqli_error($result));
                                    $result = mysqli_query($connect, $query);
                                    ?>
                                    <?php foreach ($result as $results) { ?>

                                        <option value="<?php echo $results["Tag_id"]; ?>">
                                            <?php echo $results["Tag_name"]; ?>
                                        </option>
                                    <?php } ?>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-md-6 col-lg-6 form-group">
                            <label>แท็กเดิม</label>
                            <br>
                            <?php
                            $old_sql_tag = "SELECT tag.Tag_name as tag_name FROM tag,tag_log WHERE tag.Tag_id = tag_log.Tag_id AND tag_log.Tag_product_id = $product_id";
                            $query_old_tag = mysqli_query($connect, $old_sql_tag);
                            foreach ($query_old_tag as $old_tag) {
                                $name = $old_tag['tag_name'];
                                echo $name . " , ";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <label class="lb-fontw">หมวดหมู่สินค้า</label>
                            <select id="single1" name="cate">
                                <option value="<?php echo $product["Product_category"]; ?>"></option>
                                <?php
                                include_once('../functions/category-functions.php');
                                $cateFn = new cateFunction();
                                $cates = $cateFn->getFromAllcate();
                                while ($cate = $cates->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $cate['c_name']; ?>"><?php echo $cate['c_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 form-group">
                            <label class="lb-fontw">สถานะสินค้า</label>
                            <select id="single" name="status">
                                <option value="<?php echo $product["Product_status"]; ?>"></option>
                                <option value="ขายดี">ขายดี</option>
                                <option value="มาแรง">มาแรง</option>
                                <option value="ราคาถูก">ราคาถูก</option>
                            </select>
                        </div>
                    </div>
                    <!-- end tag -->

                    <div class="form-group mt-3">
                        <label for="">รายละเอียดสินค้า</label>
                        <textarea name="desc" id="" rows="3" class="form-control"><?php echo $product["Product_description"]; ?></textarea>
                    </div>
                    <div class="form-group form-inline mt-3">
                        <a href="../add-product.php" class="mr-auto">
                            <button type="button" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> ย้อนกลับ </button>
                        </a>
                        <button type="submit" name="submit" class="btn btn-warning"> <i class="fas fa-save"></i> แก้ไข </button>
                    </div>
            </div>


            </form>
        </div>

    </div>
    </div>

    <?php include_once('../assets/scripts.html'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet">
    </link>
    <script>
        // todo multi select 
        new SlimSelect({
            select: '#multiple-optgroups',
            placeholder: 'เลือกแท็ก',

        });
        new SlimSelect({
            select: '#single1',
            placeholder: 'เลือกหมวดหมู่สินค้า',
            // Optional - In the event you want to alter/validate it as a return value
            addable: function(value) {
                // return false or null if you do not want to allow value to be submitted
                if (value === 'bad') {
                    return false
                }

                // Return the value string
                return value // Optional - value alteration // ex: value.toLowerCase()

                // Optional - Return a valid data object. See methods/setData for list of valid options
                return {
                    text: value,
                    value: value.toLowerCase()
                }
            }
        });
        new SlimSelect({
            select: '#single',
            placeholder: 'เลือกสถานะสินค้า',
            // Optional - In the event you want to alter/validate it as a return value
            addable: function(value) {
                // return false or null if you do not want to allow value to be submitted
                if (value === 'bad') {
                    return false
                }

                // Return the value string
                return value // Optional - value alteration // ex: value.toLowerCase()

                // Optional - Return a valid data object. See methods/setData for list of valid options
                return {
                    text: value,
                    value: value.toLowerCase()
                }
            }
        });
        //todo
    </script>
</body>

</html>