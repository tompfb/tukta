<?php
sleep(1);
include('./conn/connect.php');
if (isset($_POST['lastid'])) {
    $lastid = $_POST['lastid'];
    $query = mysqli_query($conn, "SELECT * FROM tb_product WHERE Product_id > $lastid order by Product_id asc limit 8");

    if (mysqli_num_rows($query) > 0) {

?>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($query)) {
                $p_id =  $row['Product_id'];
                $imgcheck = "SELECT * FROM tb_picture WHERE Product_id = ' $p_id'";
                $q_imgcheck = mysqli_query($conn,  $imgcheck) or die("Error in query: $imgcheck " . mysqli_error($conn));
                $re_img = mysqli_fetch_array($q_imgcheck);
            ?>
                <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                    <div class="card_show_dol zoom" style="background-image:linear-gradient(rgb(0,0,0,0.2),rgb(0,0,0,0.7)), url(../../uploads/<?php echo $re_img['Picture_name']; ?>);">
                        <a href="../../view-product/<?php echo $row['product_url']; ?>">
                            <h3 class="heading_doll"><?php echo $row['Product_name'];  ?></h3>
                            <p class="pricetext">฿ <?php echo $row['Product_price'];  ?></p>
                            <span class="span_status"><?php echo $row['Product_status'];  ?></span>
                        </a>
                    </div>
                </div>
            <?php
                $lastid = $row['Product_id'];
            } ?>
        </div>

        <div id="remove">
            <div style="height:10px;"></div>
            <div id="remove_row" class="row">
                <div class="col-lg-12 text-center">
                    <button type="button" name="loadmore" id="loadmore" data-id="<?php echo $lastid; ?>" class="btn-btn-success">See More</button>
                </div>
            </div>
        </div>
<?php
    }
}
?>
</div>