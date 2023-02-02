<div class=" container">
    <div class="row">
        <div class="col">
            <h2 class="mb-4 mt-4">บทความ</h2>
        </div>
        <div class="col" style="text-align: end;">
            <div class="mb-4 mt-4 btn-add">
                <a class="btn btn-outline-dark" href="./admin/Add-article-page.php">
                    <i class="fas fa-plus"></i> เพิ่มบทความใหม่
                </a>
            </div>
        </div>

    </div>
</div>

<!-- //! Card -->

<div class="container">
    <div class="row">

        <?php
        while ($article = $articles->fetch_assoc()) {
            $Pictures = $pictureFn->pictureGetByArticleId($article['Article_id']);
        ?>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-2 father">


                <div class="d-flex card-items">
                    <div style="height: 100%; width: 40%">
                        <?php
                        while ($picture = $Pictures->fetch_assoc()) {
                        ?>
                            <img <?php echo "src='./uploads/" . $picture['Picture_name'] . "'"; ?> style="border-radius: 8px" width="100%" height="100%" alt="" srcset="" />
                        <?php
                        }
                        ?>
                    </div>

                    <div class="px-3 py-3" style="width: 60%">
                        <div class="module line-clamp">
                            <h5>
                                <?php
                                echo $article['Article_title'];
                                ?>
                            </h5>
                        </div>
                        <div class="group-btn">
                            <a class="btn btn-info" <?php echo "href='./admin/article-update.php?pId=" . $article["Article_id"] . "'" ?>>
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-warning" <?php echo "href='./admin/article-picture.php?pId=" . $article["Article_id"] . "'" ?>>
                                <i class="fas fa-images"></i>
                            </a>
                            <a class="btn btn-danger" <?php echo "href='./admin/article-delete.php?pId=" . $article["Article_id"] . "'" ?> onclick="return confirm('Are you sure for Delete')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-2">
                <div class="card card-article">
                    <?php
                    while ($picture = $Pictures->fetch_assoc()) {
                    ?>
                        <img class="img-product mt-2" <?php echo "src='./uploads/" . $picture['Picture_name'] . "'"; ?> alt="">
                    <?php
                    }
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            echo $article['Article_title'];
                            ?>
                        </h5>
                        <p class="card-text desc-text">
                        <div class="desc-text">
                            <?php
                            echo $article['Article_description'];
                            ?>
                        </div>
                        </p>
                        <p class="card-text">
                        </p>
                    </div>
                    <div class="btn-group float-end" style="margin-top: 215px; position: absolute;">
                        <a <?php echo "href='./admin/article-update.php?pId=" . $article["Article_id"] . "'" ?> class="btn btn-warning">
                            <i class="fas fa-edit"></i> แก้ไข </a>
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="sr-only">Dropdown</div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-warning" <?php echo "href='./admin/article-update.php?pId=" . $article["Article_id"] . "'" ?>>
                                <i class="fas fa-edit"></i> แก้ไขข้อมูล </a>
                            <a class="dropdown-item text-warning" <?php echo "href='./admin/article-picture.php?pId=" . $article["Article_id"] . "'" ?>>
                                <i class="fas fa-images"></i> แก้ไขรูป </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" <?php echo "href='./admin/article-delete.php?pId=" . $article["Article_id"] . "'" ?> onclick="return confirm('Are you sure for Delete')">
                                <i class="fas fa-trash"></i> ลบสินค้า </a>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php } ?>

    </div>
</div>

<!-- modal add article -->

<div class="modal fade" id="ModalAddArticle" tabindex="-1" aria-labelledby="ModalAddArticle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-sm-12 ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Article title">เพิ่มบทความ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- //! form add article -->
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" class="validate-form d-flex">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="px">
                                <div class="form-group">
                                    <label>หัวข้อบทความ<span class="text-danger">*</span></label>
                                    <input type="text" name="artitle" class="form-control" placeholder="หัวข้อบทความ" required>
                                </div>

                                <!-- //todo -->
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <textarea name="ArticleDescription" id="editor" class="form-control" cols="30" rows="6" placeholder="กรอกบทความ"></textarea>
                                </div>

                                <!-- //todo tag -->
                                <div class="form-group">
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

                                <div class="form-group d-flex">
                                    <button type="submit" name="submit" id="submit" value="submit" class="btn btn-dark"><i class="fas fa-save"></i> สร้างบทความ</button>
                                </div>

                            </div>
                            <!--//! form add SEO -->
                            <div class="px my-5 w-50">
                                <div class="border">
                                    <div class="p-3">
                                        <h5>ตั้งค่า SEO</h5>
                                        <hr>
                                        <div class="from-group">
                                            <label for="">Title</label>
                                            <input class="form-control" type="text" name="SeoTitle" placeholder="Title" required>
                                        </div>
                                        <div class="from-group">
                                            <label for="">Description</label>
                                            <input class="form-control" type="text" name="SeoDescription" placeholder="Description" required>
                                        </div>
                                        <div class="from-group">
                                            <label for="">Url
                                                <span class="text-danger">*</span>
                                                <span>e.g. www.yourdomain/Url</span>
                                            </label>
                                            <input class="form-control" type="text" name="SeoUrl" placeholder="Url" required>
                                        </div>
                                        <div class="from-group">
                                            <label for="">Keywords</label>
                                            <input class="form-control" type="text" name="SeoKeyword" placeholder="Keywords1, Keywords2, Keywords3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="px">
                                <div class="border">
                                    <div class="px-3 py-2">
                                        <div class="form-group mt-2">
                                            <label for="">รูปหน้าปก
                                                <span class="text-danger">*</span>
                                            </label>
                                            <br>
                                            <!-- <img class="imageDisplay" src="assets/no-image.png" alt="no image"> -->
                                        </div>
                                        <div class="form-group d-flex justify-content-center mt-3">
                                            <?php
                                            foreach ($fields as $field => $value) {
                                            ?>
                                                <div class="col-6 mb-2 p-1">
                                                    <div class="show-file mb-3" <?php echo "id='show-$field'"; ?>>
                                                        <img class="show-image" src="assets/no-image.png" alt="">
                                                    </div>
                                                    <div class="custom-file mb-2 d-grid gap-2 col mx-auto">
                                                        <input type="file" <?php echo "name='$field' id='$field'"; ?> class="custom-file-input text-ellipsis" accept=".jpg, .png" onchange="readURL(this)">
                                                        <label class="custom-file-label text-ellipsis d-none" <?php echo "for='$field' id='label-$field'"; ?>> Choose file </label>
                                                        <button type="button" class="btn btn-secondary btn-block" <?php echo "id='btn-$field'"; ?> onclick="deleteImage(this)">ลบรูป</button>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="col">
                                                <div id="image-error"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>