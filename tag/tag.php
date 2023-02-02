<div class="box">

    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    $strKeyword = null;

    if (isset($_POST["txtKeyword"])) {
        $strKeyword = $_POST["txtKeyword"];
    }
    if (isset($_GET["txtKeyword"])) {
        $strKeyword = $_GET["txtKeyword"];
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 align="start" class="mt-4 mb-4">จัดการข้อมูล Tag</h2><br />
            </div>

            <div class="col">
                <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" a>
                    <div class="form-group w-100 pull-right">
                        <button type="button" class="btn btn-outline-dark float-end mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#ModalAddTag">
                            <i class="fas fa-plus"></i> เพิ่มแท็ก
                        </button>
                    </div>
                    <br />
                    <div id="result"></div>
                </form>
            </div>
        </div>
    </div>

    <div style="clear:both"></div>

    <br />

    <?php
    include('./functions/db.php');
    require_once('./functions/tag-function.php');
    $tagFn = new tagFunction();

    $sqlQueryString = "SELECT tag.Tag_id as Tag_id,tag.Tag_name as Tag_name,tag.Tag_create_at as Tag_create_at,tb_admin.username as username FROM `tag` 
                        INNER JOIN  tb_admin on tag.Tag_id = tb_admin.id";
    $result_set = mysqli_query($connect, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($connect));
    $Num_Rows = mysqli_num_rows($result_set);

    $perpage = 10;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $perpage;

    $data = "SELECT * FROM tag LIMIT {$start} , {$perpage} ";
    $query = mysqli_query($connect, $data);

    ?>

    <div class="box-body table-responsive">
        <table id="tb_tag" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag Name</th>
                    <th>Create By</th>
                    <th>Create At</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                // $data = $tagFn->getFromAllTag();
                while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td align="center"><?php echo $result["Tag_id"]; ?></td>
                        <td align="center"><?php echo mb_substr($result["Tag_name"], 0, 60, 'utf-8'); ?></td>
                        <td><?php echo strip_tags(mb_substr($result["Tag_username"], 0, 80, 'utf-8')); ?></td>
                        <td align="center"><?php echo mb_substr($result["Tag_create_at"], 0, 80, 'utf-8'); ?></td>
                        <td align="center"><a class="btn btn-primary" href="./tag/tag-edit.php?tagId=<?php echo $result["Tag_id"]; ?>">แก้ไข</a></td>
                        <td align="center"><a class="btn btn-danger" type="button" href="./functions/tag-delete-functions.php?tagId=<?php echo $result["Tag_id"]; ?>" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก !!!')">ลบ</a></td>
                    </tr>

                <?php
                }
                ?>

                </tfoot>
        </table>

        <!-- Pagination -->
        <?php
        $sql2 = "select * from tag ";
        $query2 = mysqli_query($connect, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <!-- //! end page -->

        <div class="d-flex justify-content-center mt-5">
            <!-- <div class="border">
            Pagination
        </div> -->

            <ul class="list-group">
                <li class="list-group-item">
                    <a href="./tag.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li class="list-group-item"><a href="./tag.php?page=<?php echo $i; ?>"> &nbsp; <?php echo $i; ?> &nbsp;</a></li>
                <?php } ?>
                <li class="list-group-item">
                    <a href="./tag.php?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>
    <!-- /.box-body -->

    <?php
    mysqli_close($connect);
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalAddTag" tabindex="-1" aria-labelledby="AddTag" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-sm-12">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- //todo -->
                <section class="content">
                    <div class="col-md-12">
                        <div class="row">
                            <form method="POST" action="./functions/tag-add-functions.php">
                                <div class="form-group ">
                                    <label for="labelTagName">Tag Name</label>
                                    <input type="text" class="form-control mt-2" id="tagName" placeholder="Please Input Tag" name="tagName">
                                </div>
                                <div class="form-group mt-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
                <!-- //todo -->
            </div>
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>