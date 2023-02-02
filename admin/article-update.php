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
include_once('../functions/article-function.php');
include_once('../functions/picture-function.php');

$pictureFn = new pictureFunction();
$articleFn = new articleFunction();

$fields = array(
    "file1" => "File 1:",
    "file2" => "File 2:",
);

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);
$pId = $query['pId'];

$article = $articleFn->articleGetById($pId)->fetch_assoc();
$art_id = $article["Article_id"];
$Pictures = $pictureFn->pictureGetByArticleId($pId);
$user_id =  $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $article = $_POST['article_name'];
    $desc = $_POST['ArticleDescription'];
    $seotitle = trim(($_POST['SeoTitle']));
    $seodesc = trim($_POST['SeoDescription']);
    $seourl = trim($_POST['SeoUrl']);
    $seokey = trim($_POST['SeoKeyword']);
    $update_by = $_POST['update_by'];


    $result = $articleFn->articleUpdate($id, $article, $desc, $seotitle, $seodesc, $seourl, $seokey);
    if (!empty($result)) {
        $result_delete = $articleFn->articleTagDelete($id);
        if (!empty($result_delete)) {
            foreach ($_POST['tag'] as $tag_id) {
                $save_tag = $articleFn->articleUpdateTag($tag_id, $id, $update_by);
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
    } else {
        echo "<script>
                window.alert('Update Data Failed!!!. Try again later.');
              </script>";
        echo "<script>
                window.location.href = 'article-update.php?pId=$pId';
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
    <link rel="stylesheet" type="text/css" href="../style/dashboard.css">
    <script src="../assets/ckeditor/ckeditor.js"></script>


    <style>
        .icon-sidebar {
            color: white;
        }

        .card {
            flex-direction: row;
        }

        .show-file {
            height: 250px;
        }

        img.show-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            padding: 10px;
        }

        .custom-file-label {
            padding-right: 5px;
        }

        .custom-file {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .img-product {
            width: auto;
            height: 150px;
            padding: 5px;
            object-fit: contain;
        }

        .ck.ck-reset.ck-editor.ck-rounded-corners {
            overflow: auto;
        }
    </style>

    <?php include_once('../assets/styles.html'); ?>
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
                            <li><a class="dropdown-item" href="../index.php">หน้าแรก</a></li>
                            <li><a class="dropdown-item" href="../products-management.php?logout='1'">ออกจากระบบ</a>
                            </li>
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
            <div class="container mt-3">
                <div class="form-inline">
                    <h5> <i class="fas fa-edit"></i> แก้ไขข้อมูลบทความ</h5>
                </div>
                <form method="POST">
                    <div class="form-group sr-only" hidden>
                        <label for="">รหัสบทความ</label>
                        <input type="text" name="id" class="form-control" placeholder="" required <?php echo "value='" . $article["Article_id"] . "'"; ?>>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">หัวข้อบทความ</label>
                            <input type="text" name="article_name" class="form-control" placeholder="" required <?php echo "value='" . $article["Article_title"] . "'"; ?>>
                            <input type="hidden" name="update_by" value="<?php echo $user_id; ?>">

                            <div class="form-group">
                                <label class="lb-fontw mt-2">แท็ก</label>
                                <select id="multiple-optgroups" multiple name="tag[]" id="tag[]">
                                    <optgroup>
                                        <?php
                                        $sql_tag = "SELECT tag.Tag_id as tag_id,tag.Tag_name as tag_name FROM tag";
                                        $query_tag = mysqli_query($connect, $sql_tag) or die("Error in query: $sql " . mysqli_error($conn));

                                        $sql_log_tag = "SELECT tag_log.Tag_log_id as log_id,tag_log.Tag_id as tag_id ,tag_log.Tag_article_id
                                                        From tag_log WHERE tag_log.Tag_article_id = $art_id";
                                        $query_log_tag = mysqli_query($connect, $sql_log_tag) or die("Error in query: $sql " . mysqli_error($conn));

                                        foreach ($query_tag as $tag) {
                                            $tag_id = $tag['tag_id'];
                                            $tag_name = $tag['tag_name'];
                                            echo "<option value=\"$tag_id;\">$tag_name</option>";
                                        } ?>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="lb-fontw mt-2">แท็กเดิม</label>
                                <br>
                                <?php
                                $old_sql_tag = "SELECT tag.Tag_name as tag_name FROM tag,tag_log WHERE tag.Tag_id = tag_log.Tag_id AND tag_log.Tag_article_id = $art_id";
                                $query_old_tag = mysqli_query($connect, $old_sql_tag);
                                foreach ($query_old_tag as $old_tag) {
                                    $name = $old_tag['tag_name'];
                                    echo $name . " , ";
                                }
                                ?>
                            </div>
                            <!--//! form add SEO -->
                            <div class="px my-5">
                                <div class="border">
                                    <div class="p-3">
                                        <h5>ตั้งค่า SEO</h5>
                                        <hr>
                                        <div class="from-group">
                                            <label for="">Title</label>
                                            <input class="form-control" type="text" name="SeoTitle" placeholder="Title" required <?php echo "value='" . $article["Seo_title"] . "'"; ?>>
                                        </div>
                                        <div class="from-group">
                                            <label for="">Description</label>
                                            <input class="form-control" type="text" name="SeoDescription" placeholder="Description" required <?php echo "value='" . $article["Seo_description"] . "'"; ?>>
                                        </div>
                                        <div class="from-group">
                                            <label for="">Url
                                                <span class="text-danger">*</span>
                                                <span>e.g. www.yourdomain/Url</span>
                                            </label>
                                            <input class="form-control" type="text" name="SeoUrl" placeholder="Url" required <?php echo "value='" . $article["Seo_url"] . "'"; ?>>
                                        </div>
                                        <div class="from-group">
                                            <label for="">Keywords</label>
                                            <input class="form-control" type="text" name="SeoKeyword" placeholder="Keywords1, Keywords2, Keywords3" required <?php echo "value='" . $article["Seo_keyword"] . "'"; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">รายละเอียด</label>
                                <textarea name="ArticleDescription" id="ArticleDescription" class="form-control" cols="30" rows="6" placeholder="กรอกบทความ">
                                <?php echo "" . $article["Article_description"] . ""; ?></textarea>
                                <!-- <input type="text" name="article_desc" class="form-control" placeholder="" required  -->

                                <div class="col mt-2">
                                    <div class="border">
                                        <div class="px-3 py-2  mt-2">
                                            <div class="form-group">
                                                <label for="">รูปหน้าปก
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <br>
                                            </div>
                                            <div class="form-group d-flex justify-content-center mt-3">
                                                <?php
                                                $numRows = $Pictures->num_rows;
                                                while ($picture = $Pictures->fetch_assoc()) {
                                                ?>
                                                    <div class="col-6 mb-3">
                                                        <div class="show-file mb-3">
                                                            <img class="show-image" <?php echo "src='../uploads/" . $picture["Picture_name"] . "'"; ?> alt="">
                                                        </div>
                                                    </div>
                                                <?php
                                                }

                                                ?>
                                                <div class="col">
                                                    <div id="image-error"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-inline mt-5">
                        <a href="../add-article.php" class="mr-auto">
                            <button type="button" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> ย้อนกลับ
                            </button> </a>

                        <button type="submit" name="submit" class="btn btn-warning"> <i class="fas fa-save"></i> แก้ไข
                        </button>
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
        CKEDITOR.replace('ArticleDescription', {
            height: "500px",
            language: 'th',
            filebrowserUploadMethod: 'form',
            filebrowserUploadUrl: "../functions/upload-img-editor.php"
        });
        // ! ckediter
        // ClassicEditor
        //     .create(document.querySelector('#editor'))
        //     .then(editor => {
        //         console.log(editor);

        //     })
        //     .catch(error => {
        //         console.error(error);
        //         header('location: ../add-article.php');
        //     });
        // ! ckediter

        // todo multi select 
        new SlimSelect({
            select: '#multiple-optgroups',
            placeholder: 'เลือกแท็ก',

        });

        function readURL(input) {
            const allowType = ['jpg', 'jpeg', 'png'];
            const imgErrEl = document.getElementById('image-error');
            imgErrEl.innerHTML = '';
            const Element = document.getElementById('show-' + input.id);
            const lebelEl = document.getElementById('label-' + input.id);
            Element.innerHTML = '';
            lebelEl.innerHTML = 'Choose file';

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const fileType = file.type;
                if (allowType.find(type => fileType.includes(type))) {
                    lebelEl.innerHTML = file.name;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgEl = document.createElement('img');

                        imgEl.src = e.target.result;
                        imgEl.className = 'show-image';
                        Element.appendChild(imgEl);
                    }
                    reader.readAsDataURL(file);

                } else {
                    const errorEl = document.createElement('div');
                    errorEl.className = 'alert-danger p-2 mb-3';
                    errorEl.innerHTML = 'File type is not correct.';
                    imgErrEl.appendChild(errorEl);
                }
            }
        }

        function deleteImage(btn) {
            const id = btn.id.split('-')[1];
            const inputFile = document.getElementById(id);
            const labelEl = document.getElementById('label-' + id);
            const showImgEl = document.getElementById('show-' + id);
            const imgEl = document.createElement('img');
            inputFile.value = '';
            labelEl.innerHTML = 'Choose file';
            showImgEl.innerHTML = '';
            imgEl.src = "../assets/no-image.png";
            imgEl.className = 'show-image';
            showImgEl.appendChild(imgEl);
        }
    </script>
</body>

</html>